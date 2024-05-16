<?php

include_once 'src/db/conn.php';
include_once 'src/models/propiedades.php';
include_once 'src/models/ambientes.php';
include_once 'src/models/servicios.php';
include_once 'src/models/comodidades.php';
include_once 'src/models/localidades.php';
include_once 'src/models/tiposPropiedad.php';

$conexion = Conexion::conectar();
$modeloPropiedad = new Propiedades($conexion);
$ambientesModelo = new Ambientes($conexion);
$serviciosModelo = new Servicios($conexion);
$comodidadesModelo = new Comodidades($conexion);
$localidadesModelo = new Localidades($conexion);
$tipoPropiedadModel = new TiposPropiedad($conexion);
$idPropiedad = $_GET['id'];
$propiedades = $modeloPropiedad->getFrontDataById($idPropiedad);

$imagenes = $modeloPropiedad->getImagenesByPropiedadId($idPropiedad);
$ambientesPropiedad = $ambientesModelo->getAmbientesByPropiedadId($idPropiedad);
$serviciosPropiedad = $serviciosModelo->getServiciosByPropiedadId($idPropiedad);
$comodidadesPropiedad = $comodidadesModelo->getComodidadesByPropiedadId($idPropiedad);
$localidadesPropiedad = $localidadesModelo->getLocalidadByPropiedadId($idPropiedad);
$propiedadesTipo = $modeloPropiedad->getPropiedadesConPrecio();
$tiposPropiedad = $tipoPropiedadModel->obtenerTipos();
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
    <link rel="stylesheet" type="text/css" href="assets/css/glider.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include_once 'modules/navbar.html'; ?>

    <?php include_once 'modules/mobile-navbar.html'; ?>

    <div class="banner-titulo bg-gray row mt-4 py-4 d-flex justify-content-center">
        <?php
        foreach ($propiedades as $propiedad) {
            echo '<h2 class="text-center text-white text-uppercase">' . $propiedad['titulo'] . '</h2>';
        }
        ?>
    </div>

    <div class="row text-center mt-5">
        <div class="col-lg-12 link-videoMapa fs-5">
            <a class="px-3" href="#video-section"><i class="fas fa-video"></i> Video</a>
            <a class="px-3" href="#map-section"><i class="fas fa-map"></i> Ubicación</a>
        </div>
    </div>


    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-4 col-md-12 offset-lg-2 mt-5 px-5">

                <div class="glider-contain">
                    <div class="glider">
                        <?php foreach ($imagenes as $imagen) {
                            $link = 'assets/img/propiedades/' . $idPropiedad . '/' . $imagen['imagen'];
                            echo '<div><img src="' . $link . '" class="w-100" alt="..."></div>';
                        } ?>
                    </div>
                    <button aria-label="Previous" class="glider-prev">«</button>
                    <button aria-label="Next" class="glider-next">»</button>
                    <div role="tablist" class="dots"></div>
                </div>
            </div>


            <div class="col-lg-4 col-md-12 mb-5 px-5 mt-5 h-100 ms-lg-5">

                <div class="details-table bg-gray px-0 table-container">
                    <div class="bg-secondary-coral-color">
                        <h3 class="text-center fw-bold text-white py-2">Detalles</h3>
                    </div>
                    <table class="table w-100 tabla-detalles ">
                        <tr class="text-white ">
                            <td class="bg-gray text-white"><span class="dot">•</span> Superficie</td>
                            <?php foreach ($propiedades as $propiedad) {
                                echo ' <td class="text-end bg-gray text-white">' . $propiedad['superficie'] . ' m2 </td>';
                            } ?>
                        </tr>
                        <?php if ($tiposPropiedad[$propiedad['id_tipo_propiedad']] != 'Lote') : ?>
                            <tr class="text-white ">
                                <td class="bg-gray text-white"><span class="dot">•</span> Sup. Cubierta</td>
                                <?php foreach ($propiedades as $propiedad) {
                                    echo ' <td class="text-end bg-gray text-white">' . $propiedad['superficie_cubierta'] . ' m2 </td>';
                                } ?>
                            </tr>
                            <tr class="text-white ">
                                <td class="bg-gray text-white"><span class="dot">•</span> Pisos</td>
                                <?php foreach ($propiedades as $propiedad) {
                                    echo ' <td class="text-end bg-gray text-white">' . $propiedad['pisos'] . '</td>';
                                } ?>
                            </tr>
                            <tr class="text-white ">
                                <td class="bg-gray text-white"><span class="dot">•</span> Dormitorios</td>
                                <?php foreach ($propiedades as $propiedad) {
                                    echo ' <td class="text-end bg-gray text-white">' . $propiedad['dormitorios'] . '</td>';
                                } ?>
                            </tr>
                            <tr class="text-white ">
                                <td class="bg-gray text-white"><span class="dot">•</span> Baños</td>
                                <?php foreach ($propiedades as $propiedad) {
                                    echo ' <td class="text-end bg-gray text-white">' . $propiedad['baños'] . '</td>';
                                } ?>
                            </tr>
                        <?php endif; ?>
                        <tr class="text-white ">
                            <td class="bg-gray text-white"><span class="dot">•</span> Ubicación</td>
                            <?php foreach ($localidadesPropiedad as $localidad) {
                                echo ' <td class="text-end bg-gray text-white">' . $localidad['localidad_descripcion'] . '</td>';
                            } ?>
                        </tr>
                        <tr class="text-white ">
                            <td class="bg-gray text-white"><span class="dot">•</span> Zona</td>
                            <td class="text-end bg-gray text-white">Centro</td>
                        </tr>

                    </table>

                </div>

            </div>




            <div class="col-md-4 col-12 offset-md-2 mt-5">

                <h4 class="fs-3 color-gray ps-5 ps-md-0">Informacion general</h4>

                <?php
                foreach ($propiedades as $propiedad) {
                    echo '<p class="fw-bold py-2 fs-5 mb-5 color-gray ps-5 ps-md-0 ">' . $propiedad['descripcion'] . '</p>';
                }
                ?>

                <!-- <h2 class="section-title text-white text-center">Características</h2> -->

                <?php if (!empty($comodidadesPropiedad)) : ?>
                    <div>
                        <h4 class="titulo-caracteristicas text-white">Comodidades</h4>
                        <div class="row mt-4">
                            <?php foreach ($comodidadesPropiedad as $comodidad) {
                                echo '<div class="col-4 text-white"><i class="fa-regular fa-circle-check orange-color"></i> ' . $comodidad['descripcion'] . '</div>';
                            } ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($ambientesPropiedad)) : ?>
                    <div>
                        <h4 class="titulo-caracteristicas text-white mt-5">Ambientes</h4>
                        <div class="row mt-4">
                            <?php foreach ($ambientesPropiedad as $ambiente) {
                                echo '<div class="col-4 text-white"><i class="fa-regular fa-circle-check orange-color"></i> ' . $ambiente['descripcion'] . '</div>';
                            } ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($serviciosPropiedad)) : ?>
                    <div>
                        <h4 class="titulo-caracteristicas text-white mt-5">Servicios</h4>
                        <div class="row mt-4">
                            <?php foreach ($serviciosPropiedad as $servicio) {
                                echo '<div class="col-4 text-white "> <i class="fa-regular fa-circle-check orange-color"></i> ' . $servicio['descripcion'] . '</div>';
                            } ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div>
                    <div class="row mt-5">
                        <?php echo '<div class="col-4 text-danger text-uppercase fw-bold">Codigo: ' . $propiedad['codigo'] . '</div>'; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 mb-5 px-5 mt-5 h-100 ms-lg-5">
                <div class="details-form bg-gray px-0 table-container">
                    <div class="bg-secondary-coral-color">
                        <h3 class="text-center fw-bold text-white py-2">Formulario de Contacto</h3>
                    </div>
                    <form class="contact-form table w-100 tabla-detalles p-3">
                        <div class="form-group mb-3">
                            <label class="text-white fw-bold">Nombre y apellido:</label>
                            <input type="text" class="form-control bg-dark" placeholder="Ingresa tu nombre y apellido">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-white fw-bold">Ciudad:</label>
                            <input type="text" class="form-control bg-dark" placeholder="Ingresa tu ciudad">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-white fw-bold">Celular:</label>
                            <input type="tel" class="form-control bg-dark" placeholder="Ingresa tu celular">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-white fw-bold">Email:</label>
                            <input type="email" class="form-control bg-dark" placeholder="Ingresa tu email">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-white fw-bold">Consulta:</label>
                            <textarea class="form-control bg-dark" placeholder="Escribe tu consulta" rows="4"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-secondary-coral-color text-white fw-bold fs-5">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if ($propiedades[0]['video']) : ?>
                <div class="col-md-8 col-12 offset-md-2 mt-5">
                    <h3 class="text-white text-center mb-5" id="video-section">Video de la propiedad</h3>
                    <div class="ratio ratio-21x9 h-75">
                        <?= str_replace("'", '"', $propiedades[0]['video']); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            if ($propiedades[0]['maps_url']) : ?>
                <div class="col-md-8 col-12 offset-md-2 mt-5">
                    <h3 class="text-white text-center mb-5" id="map-section">Ubicación de la propiedad</h3>
                    <div class="ratio ratio-21x9 h-75">
                        <?php
                        foreach ($propiedades as $propiedad) {
                            echo $propiedad['maps_url'];
                        }
                        ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <hr class="linea-divisoria">


    <?php include_once 'modules/footer-copyright.html' ?>

    <script src="assets/js/glider.js"></script>
    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>