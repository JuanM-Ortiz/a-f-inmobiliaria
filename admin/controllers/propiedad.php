<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/propiedades.php';

if ($_POST['crear'] && $_POST['crear'] == 1) {
  $conexion = Conexion::conectar();

  $propiedadesModel = new Propiedades($conexion);

  if ($_FILES['imgPortada']['name'] && !empty($_FILES['imgPortada']['name'])) {
    $hora = date("YmdHis");
    $filename = $hora . $_FILES['imgPortada']['name'];
    $location = "../../assets/img/" . $filename;
    if (!move_uploaded_file($_FILES['imgPortada']['tmp_name'], $location)) {
      return false;
    }
    $link = $filename;
  }
  $params = [
    'titulo' => $_POST['titulo'],
    'id_tipo_propiedad' => $_POST['tipoPropiedad'],
    'descripcion' => $_POST['descripcion'],
    'superficie_cubierta' => $_POST['superficieCubierta'],
    'superficie' => $_POST['superficie'],
    'pisos' => $_POST['pisos'] ?? null,
    'dormitorios' => $_POST['dormitorios'] ?? null,
    'baños' => $_POST['baños'] ?? null,
    'id_localidad' => $_POST['localidad'],
    'id_zona' => $_POST['zona'],
    'maps_url' => $_POST['mapsUrl'],
    'imagen_portada' => $link,
    'es_destacada' => $_POST['destacada'],
  ];
  echo $_POST['mapsUrl'];
  $idPropiedad = $propiedadesModel->crear($params);
  if ($idPropiedad) {
    $ambientes = json_decode($_POST['ambientes']);
    $servicios = json_decode($_POST['servicios']);
    $comodidades = json_decode($_POST['comodidades']);
    $tipoPublicacion = json_decode($_POST['tipoPublicacion']);

    if ($ambientes) {
      $propiedadesModel->crearAmbientesByPropiedadId($idPropiedad, $ambientes);
    }
    if ($servicios) {
      $propiedadesModel->crearServiciosByPropiedadId($idPropiedad, $servicios);
    }
    if ($comodidades) {
      $propiedadesModel->crearComodidadesByPropiedadId($idPropiedad, $comodidades);
    }
    foreach ($tipoPublicacion as $tipo) {
      if ($tipo == 'venta') {
        $propiedadesModel->crearVentaPropiedad($idPropiedad, $_POST['precioVenta']);
      }

      if ($tipo == 'alquiler') {
        echo $_POST['precioAlquiler'];
        $propiedadesModel->crearAlquilerPropiedad($idPropiedad, $_POST['precioAlquiler']);
      }
    }


    echo 1;
  }
  $conexion = null;
}
