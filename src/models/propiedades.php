<?php

class Propiedades
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getPropiedades($all = false)
  {
    $query = "SELECT * FROM propiedades";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPropiedadById($id)
  {
    $query = "SELECT * FROM propiedades WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getFrontDataById($id)
  {
    $query = "SELECT p.*, z.descripcion as zona, l.descripcion as localidad
    FROM propiedades p
    JOIN localidades l ON p.id_localidad = l.id
    JOIN zonas z ON p.id_zona = z.id 
    WHERE p.id = {$id}";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarPorId($idPropiedad)
  {
    $query = "UPDATE propiedades SET deleted_at = now() WHERE id = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_ambientes WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_servicios WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_comodidades WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_tipo_publicaciones WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_imagenes WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();

    return true;
  }
  public function restaurarPorId($idPropiedad)
  {
    $query = "UPDATE propiedades SET deleted_at = null WHERE id = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idPropiedad, $descripcion)
  {
    $query = "UPDATE propiedades SET descripcion = '{$descripcion}'";

    $query .= " WHERE id = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function asignarPortada($idPropiedad, $img)
  {
    $query = "UPDATE propiedades SET imagen_portada = '{$img}' WHERE id = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($params)
  {
    try {
      $codigo = 'AYF' . random_int(1, 99999);
      $query = "INSERT INTO propiedades (titulo, id_tipo_propiedad, 
      descripcion, superficie_cubierta, superficie,
      pisos, dormitorios, 
      baños, id_localidad, id_zona, maps_url,
      codigo,es_destacada)
       VALUES ('{$params['titulo']}', '{$params['id_tipo_propiedad']}', '{$params['descripcion']}',
       {$params['superficie_cubierta']}, {$params['superficie']},
       {$params['pisos']}, {$params['dormitorios']}, 
       {$params['baños']}, {$params['id_localidad']},
       {$params['id_zona']},'{$params['maps_url']}', '{$codigo}', '{$params['es_destacada']}')";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
      return $this->conexion->lastInsertId();
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function crearAmbientesByPropiedadId($idPropiedad, $ambientes)
  {
    $query = "DELETE FROM propiedades_ambientes WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    foreach ($ambientes as $ambiente) {
      $query = "INSERT INTO propiedades_ambientes (id_propiedad, id_ambiente) VALUES ($idPropiedad, $ambiente)";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
    return true;
  }
  public function crearServiciosByPropiedadId($idPropiedad, $servicios)
  {
    $query = "DELETE FROM propiedades_servicios WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    foreach ($servicios as $servicio) {
      $query = "INSERT INTO propiedades_servicios (id_propiedad, id_servicio) VALUES ($idPropiedad, $servicio)";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
    return true;
  }
  public function crearComodidadesByPropiedadId($idPropiedad, $comodidades)
  {
    $query = "DELETE FROM propiedades_comodidades WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    foreach ($comodidades as $comodidad) {
      $query = "INSERT INTO propiedades_comodidades (id_propiedad, id_comodidad) VALUES ($idPropiedad, $comodidad)";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
    return true;
  }
  public function crearVentaPropiedad($idPropiedad, $precio)
  {
    $query = "INSERT INTO propiedades_tipo_publicaciones (id_propiedad, id_tipo_publicacion, precio, moneda)
    VALUES ($idPropiedad, 2, $precio, 2)";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();

    return true;
  }

  public function crearAlquilerPropiedad($idPropiedad, $precio)
  {
    $query = "INSERT INTO propiedades_tipo_publicaciones (id_propiedad, id_tipo_publicacion, precio, moneda)
    VALUES ($idPropiedad, 1, $precio, 1)";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();

    return true;
  }

  public function getPropiedadesConPrecio()
  {
    $query = "SELECT p.*, pt.precio, pt.moneda, tp.descripcion AS 'tipo_publicacion'
              FROM propiedades p
              JOIN propiedades_tipo_publicaciones pt ON p.id = pt.id_propiedad
              JOIN tipo_publicaciones tp ON pt.id_tipo_publicacion = tp.id
              WHERE p.deleted_at IS NULL";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function asignarImagen($idPropiedad, $imagen)
  {
    $query = "INSERT INTO propiedades_imagenes(id_propiedad, imagen)
    VALUES ($idPropiedad, '$imagen')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
  }

  public function getImagenesByPropiedadId($idPropiedad)
  {
    $query = "SELECT imagen
    FROM propiedades_imagenes
    WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }
}
