<?php

include_once 'src/db/conn.php';
include_once 'src/models/propiedades.php';
include_once 'src/models/ambientes.php';
include_once 'src/models/servicios.php';
include_once 'src/models/comodidades.php';

$conexion = Conexion::conectar();
$modeloPropiedad = new Propiedades($conexion);
$ambientesModelo = new Ambientes($conexion);
$serviciosModelo = new Servicios($conexion);
$comodidadesModelo = new Comodidades($conexion);
$idPropiedad = $_GET['id'];
$propiedades = $modeloPropiedad->getFrontDataById($idPropiedad);
$ambientesPropiedad = $ambientesModelo->getAmbientesByPropiedadId($idPropiedad);
$serviciosPropiedad = $serviciosModelo->getServiciosByPropiedadId($idPropiedad);
$comodidadesPropiedad = $comodidadesModelo->getComodidadesByPropiedadId($idPropiedad);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria A & F</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css?ver=<?php echo $date; ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include_once 'modules/navbar.html'; ?>

    <?php include_once 'modules/mobile-navbar.html'; ?>
    <div class="container-fluid vh-100">
        <ul class="text-white">
            <?php foreach ($comodidadesPropiedad as $comodidad) {
                echo '<li class="text-white">' . $comodidad['descripcion'] . '</li>';
            } ?>
        </ul>
        <ul class="text-white">
            <?php foreach ($serviciosPropiedad as $servicio) {
                echo '<li class="text-white">' . $servicio['descripcion'] . '</li>';
            } ?>
        </ul>
        <ul class="text-white">
            <?php foreach ($ambientesPropiedad as $ambiente) {
                echo '<li class="text-white">' . $ambiente['descripcion'] . '</li>';
            } ?>
        </ul>
    </div>
    <section>
        <div class="bg-gray row mt-4 py-4">
            <h2 class="text-center text-white">CONTACTO</h2>
        </div>
    </section>



    <?php include_once 'modules/footer-copyright.html' ?>


    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>