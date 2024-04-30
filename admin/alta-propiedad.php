<?php
session_start();

if (!$_SESSION['user']) {
  header("Location: index.php");
}

include_once '../src/db/conn.php';
include_once '../src/models/tiposPropiedad.php';
include_once '../src/models/localidades.php';
include_once '../src/models/zonas.php';
include_once '../src/models/ambientes.php';
include_once '../src/models/servicios.php';
include_once '../src/models/comodidades.php';

$conexion = Conexion::conectar();

$tiposPropiedadModel = new TiposPropiedad($conexion);
$localidadesModel = new Localidades($conexion);
$zonasModel = new Zonas($conexion);
$ambientesModel = new Ambientes($conexion);
$serviciosModel = new Servicios($conexion);
$comodidadesModel = new Comodidades($conexion);

$tiposPropiedad = $tiposPropiedadModel->getTiposPropiedad(false);
$localidades = $localidadesModel->getLocalidades(false);
$zonas = $zonasModel->getZonas(false);
$ambientes = $ambientesModel->getAmbientes(false);
$servicios = $serviciosModel->getServicios(false);
$comodidades = $comodidadesModel->getComodidades(false);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A&F Inmobiliaria - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<?php include_once 'modules/navbar.html'; ?>
<style>
  input,
  textarea {
    color: black !important;
  }

  .form-control {
    border: var(--bs-border-width) solid var(--bs-border-color) !important;
  }
</style>

<body class="bg-grays-color">

  <div class="container vh-100 mt-5">
    <div class="d-flex mt-5 justify-content-between mb-3">
      <h5>Crear nueva propiedad</h5>
    </div>
    <form>
      <div class="row">
        <div class="mb-3 col-4">
          <label for="titulo" class="form-label">Título</label>
          <input type="text" class="form-control" id="titulo">
        </div>
        <div class="mb-3 col-4 d-none" id="previsualizacionPortadaDiv">
          <label for="imgPortada" class="form-label">Previsualizacion...</label>
          <img src="" id="previsualizacion" alt="" class="img-fluid">
        </div>
        <div class="mb-3 col-4">
          <label for="imgPortada" class="form-label">Imagen de portada</label>
          <input class="form-control" accept="image/*" type="file" id="imgPortada">
        </div>
        <div class="mb-3 col-12">
          <label for="descripcion" class="form-label">Información general</label>
          <textarea class="form-control" id="descripcion" rows="3" maxlength="3000"></textarea>
        </div>
        <div class="mb-3 col-4">
          <label for="descripcion" class="form-label">Tipo de propiedad</label>
          <select class="form-select" id="tipoPropiedad" aria-label="Default select example">
            <option selected disabled>Seleccione un tipo de propiedad...</option>
            <?php foreach ($tiposPropiedad as $tipoPropiedad) : ?>
              <option value="<?php echo $tipoPropiedad['id']; ?>"><?php echo $tipoPropiedad['descripcion']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3 col-4">
          <label for="superficie" class="form-label">Superficie (m2)</label>
          <input type="number" placeholder="0" class="form-control" id="superficie" min="0" step="1">
        </div>
        <div class="mb-3 col-4">
          <label for="superficieCubierta" class="form-label">Superficie cubierta (m2)</label>
          <input type="number" placeholder="0" class="form-control" id="superficieCubierta" min="0" step="1">
        </div>
        <div class="mb-3 col-4">
          <label for="pisos" class="form-label">Pisos</label>
          <input type="number" placeholder="0" class="form-control" id="pisos" min="0" step="1">
        </div>
        <div class="mb-3 col-4">
          <label for="dormitorios" class="form-label">Dormitorios</label>
          <input type="number" placeholder="0" class="form-control" id="dormitorios" min="0" step="1">
        </div>
        <div class="mb-3 col-4">
          <label for="baños" class="form-label">Baños</label>
          <input type="number" placeholder="0" class="form-control" id="baños" min="0" step="1">
        </div>
        <div class="mb-3 col-4">
          <label for="localidad" class="form-label">Localidad</label>
          <select class="form-select" id="localidad" aria-label="localidad">
            <option selected disabled>Seleccione la localidad...</option>
            <?php foreach ($localidades as $localidad) : ?>
              <option value="<?php echo $localidad['id']; ?>"><?php echo $localidad['descripcion']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3 col-4">
          <label for="localidad" class="form-label">Zona</label>
          <select class="form-select" id="localidad" aria-label="localidad">
            <option selected disabled>Seleccione la zona...</option>
            <?php foreach ($zonas as $zona) : ?>
              <option value="<?php echo $zona['id']; ?>"><?php echo $zona['descripcion']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3 col-4">
          <label for="tipoPublicacion" class="form-label d-block">Tipo de publicación</label>
          <div class="form-check form-check-inline mt-1">
            <input class="form-check-input" type="checkbox" value="venta" id="ventaCheck">
            <label class="form-check-label" for="flexCheckDefault">
              Venta
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="alquiler" id="alquilerCheck">
            <label class="form-check-label" for="flexCheckDefault">
              Alquiler
            </label>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-4">
          <h5>Ambientes</h5>
          <?php foreach ($ambientes as $ambiente) : ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $ambiente['id'] ?>" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                <?php echo $ambiente['descripcion']; ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="col-4">
          <h5>Servicios</h5>
          <?php foreach ($servicios as $servicio) : ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $servicio['id'] ?>" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                <?php echo $servicio['descripcion']; ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="col-4">
          <h5>Comodidades</h5>
          <?php foreach ($comodidades as $comodidad) : ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $comodidad['id'] ?>" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                <?php echo $comodidad['descripcion']; ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-4 text-end offset-8">
          <button type="button" id="guardarPropiedad" class="btn btn-lg btn-success">Guardar</button>
        </div>
      </div>
    </form>

  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../assets/js/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    imgPortada.onchange = evt => {
      const [file] = imgPortada.files
      if (file) {
        previsualizacionPortadaDiv.classList.remove('d-none')
        previsualizacion.src = URL.createObjectURL(file)
      }
    }
  })
</script>