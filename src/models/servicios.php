<?php

class Servicios
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getServicios($all = false)
  {
    $query = "SELECT * FROM servicios";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getServicioById($id)
  {
    $query = "SELECT * FROM servicios WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarPorId($idServicio)
  {
    $query = "UPDATE servicios SET deleted_at = now() WHERE id = $idServicio";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idServicio)
  {
    $query = "UPDATE servicios SET deleted_at = null WHERE id = $idServicio";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idServicio, $descripcion)
  {
    $query = "UPDATE servicios SET descripcion = '{$descripcion}'";

    $query .= " WHERE id = $idServicio";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($descripcion)
  {
    $query = "INSERT INTO servicios (descripcion) VALUES ('{$descripcion}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
