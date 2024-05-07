<?php

include_once 'src/db/conn.php';
include_once 'src/models/propiedades.php';
include_once 'src/models/ambientes.php';
include_once 'src/models/servicios.php';
include_once 'src/models/comodidades.php';
include_once 'src/models/localidades.php';

$conexion = Conexion::conectar();
$modeloPropiedad = new Propiedades($conexion);
$ambientesModelo = new Ambientes($conexion);
$serviciosModelo = new Servicios($conexion);
$comodidadesModelo = new Comodidades($conexion);
$localidadesModelo = new Localidades($conexion);
$idPropiedad = $_GET['id'];
$propiedades = $modeloPropiedad->getFrontDataById($idPropiedad);
$ambientesPropiedad = $ambientesModelo->getAmbientesByPropiedadId($idPropiedad);
$serviciosPropiedad = $serviciosModelo->getServiciosByPropiedadId($idPropiedad);
$comodidadesPropiedad = $comodidadesModelo->getComodidadesByPropiedadId($idPropiedad);
$localidadesPropiedad = $localidadesModelo->getLocalidadByPropiedadId($idPropiedad);
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

    <?php

    foreach ($propiedades as $propiedad) {
        echo '<div class="bg-gray row mt-4 py-4">';
        echo '<h2 class="text-center text-white text-uppercase">' . $propiedad['titulo'] . '</h2>';
        echo '</div>';
    }

    ?>

    <div class="container">
        <div class="row">

            <div class="col-md-8 ps-5">
                <div id="carouselExampleAutoplaying" class="carousel slide mt-5 me-5" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/casa1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/casa1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/casa1.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>





            <div class="col-md-4 mb-5 px-5">


                <div class="details-table bg-gray px-0 mt-5 table-container">
                    <div class="bg-coral-color">
                        <h2 class="text-center fw-bold text-white py-2">Detalles</h2>
                    </div>
                    <table class="table w-100 mt-5 tabla-detalles ">
                        <tr class="text-white fs-5 ">
                            <td class="bg-gray text-white"><span class="dot">•</span> Superficie</td>
                            <?php foreach ($propiedades as $propiedad) {
                                echo ' <td class="text-end bg-gray text-white">' . $propiedad['superficie'] . ' m2 </td>';
                            } ?>
                        </tr>
                        <tr class="text-white fs-5">
                            <td class="bg-gray text-white"><span class="dot">•</span> Sup. Cubierta</td>
                            <?php foreach ($propiedades as $propiedad) {
                                echo ' <td class="text-end bg-gray text-white">' . $propiedad['superficie_cubierta'] . ' m2 </td>';
                            } ?>
                        </tr>
                        <tr class="text-white fs-5">
                            <td class="bg-gray text-white"><span class="dot">•</span> Pisos</td>
                            <?php foreach ($propiedades as $propiedad) {
                                echo ' <td class="text-end bg-gray text-white">' . $propiedad['pisos'] . '</td>';
                            } ?>
                        </tr>
                        <tr class="text-white fs-5">
                            <td class="bg-gray text-white"><span class="dot">•</span> Dormitorios</td>
                            <?php foreach ($propiedades as $propiedad) {
                                echo ' <td class="text-end bg-gray text-white">' . $propiedad['dormitorios'] . '</td>';
                            } ?>
                        </tr>
                        <tr class="text-white fs-5">
                            <td class="bg-gray text-white"><span class="dot">•</span> Baños</td>
                            <?php foreach ($propiedades as $propiedad) {
                                echo ' <td class="text-end bg-gray text-white">' . $propiedad['baños'] . '</td>';
                            } ?>
                        </tr>
                        <tr class="text-white fs-5">
                            <td class="bg-gray text-white"><span class="dot">•</span> Ubicación</td>
                            <?php foreach ($localidadesPropiedad as $localidad) {
                                echo ' <td class="text-end bg-gray text-white">' . $localidad['localidad_descripcion'] . '</td>';
                            } ?>
                        </tr>
                        <tr class="text-white fs-5">
                            <td class="bg-gray text-white"><span class="dot">•</span> Zona</td>
                            <td class="text-end bg-gray text-white">Centro</td>
                        </tr>
                        <tr class="text-white fs-5">
                            <td class="bg-gray text-white"><span class="dot">•</span> Precio</td>
                            <td class="text-end bg-gray text-white">USD 90.000</td>
                        </tr>
                    </table>
                </div>

            </div>



            <div class="col-md-8 ps-5 mt-5">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">

                </div>

                <!-- <h2 class="section-title text-white text-center">Características</h2> -->

                <?php if (!empty($comodidadesPropiedad)): ?>
                <div>
                    <h4 class="text-white">Comodidades</h4>
                    <ul class="item-list">
                        <?php foreach ($comodidadesPropiedad as $comodidad) {
                            echo '<li class="text-white">' . $comodidad['descripcion'] . '</li>';
                        } ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if (!empty($ambientesPropiedad)): ?>
                <div>
                    <h4 class="text-white">Ambientes</h4>
                    <ul class="item-list">
                        <?php foreach ($ambientesPropiedad as $ambiente) {
                            echo '<li class="text-white">' . $ambiente['descripcion'] . '</li>';
                        } ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if (!empty($serviciosPropiedad)): ?>
                <div>
                    <h4 class="text-white">Servicios</h4>
                    <ul class="item-list">
                        <?php foreach ($serviciosPropiedad as $servicio) {
                            echo '<li class="text-white">' . $servicio['descripcion'] . '</li>';
                        } ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>



        </div>
    </div>









    <?php include_once 'modules/footer-copyright.html' ?>


    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>