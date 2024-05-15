<?php

include_once 'src/db/conn.php';
include_once 'src/models/propiedades.php';
$conexion = Conexion::conectar();
$modeloPropiedad = new Propiedades($conexion);

if (isset($_GET['pagina'])) {
    $paginaActual = $_GET['pagina'];
} else {
    $paginaActual = 1;
}

$resultadosPorPagina = 8;
$inicio = ($paginaActual - 1) * $resultadosPorPagina;


if ($_GET['localidad'] || $_GET['zona'] || $_GET['tipo']) {
    $propiedades = $modeloPropiedad->getPropiedadesFiltered($_GET['zona'], $_GET['localidad'], $_GET['tipo'], $inicio, $resultadosPorPagina);
} else {
    $propiedades = $modeloPropiedad->getPropiedadesConPrecio($inicio, $resultadosPorPagina);
}

$totalRegistros =  $modeloPropiedad->getCantidadPropiedades($_GET['tipo']);
$totalPaginas = ceil($totalRegistros / $resultadosPorPagina);

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

    <section class="featured bg-main">
        <div class="banner-titulo bg-gray row mt-4 py-4 ">
            <div class="featured-box-propiedades bg-secondary-coral-color col-md-2 col-6 offset-md-5 offset-3 text-center ">
                <h2 class="featured text-white my-auto py-2 fw-bold bg-secondary-coral-color">Propiedades</h2>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row">

                <?php
                foreach ($propiedades as $propiedad) :
                    $src = $propiedad['imagen_portada'];
                    $carpetaId = $propiedad['id'];
                    $imagePath = "assets/img/propiedades/" . $carpetaId . '/' . $src;

                    $moneda = $propiedad['moneda'] == 2 ? 'USD' : '$';

                    echo '
        <div class="col-12 col-lg-3 col-md-6 d-flex justify-content-center mb-4">
            <div class="card" style="width: 18rem;">
                <img src="' . $imagePath . '" class="card-img-top" alt="...">

                <div class="card-body text-white px-0 pb-0">
                    <h5 class="card-title bg-secondary-coral-color text-center fw-bold py-1">' . strtoupper($propiedad['tipo_publicacion']) . '</h5>

                    <div class="titulo-container">
                        <p class="card-text ms-3">' . $propiedad['titulo'] . '</p>
                    </div>

                    <div class="row mb-3 ms-3">
                        <div class="text-data col-4 d-flex flex-column align-items-center">
                            <i class="fa-solid fa-up-down-left-right"></i>
                            <span class="mt-1">' . $propiedad['superficie'] . 'm²</span>
                        </div>
                        <div class="text-data col-4 d-flex flex-column align-items-center border-start border-1 border-gray">
                            <i class="fa-solid fa-up-down-left-right"></i>
                            <span class="mt-1">' . $propiedad['superficie_cubierta'] . 'm²C</span>
                        </div>
                        <div class="text-data col-4 d-flex flex-column align-items-center border-start border-1 border-gray pe-4">
                            <i class="fa-solid fa-bed"></i>
                            <span class="mt-1">' . $propiedad['dormitorios'] . '</span>
                        </div>
                    </div>


                    <div class="card-footer text-white">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <p class="mt-3 fs-5">' . $moneda . ' ' . number_format($propiedad['precio']) . '</p>
                            </div>
                            <div class="col-6">
                                <a href="detalle-propiedad.php?id=' . $propiedad['id'] . '" class="btn btn-primary mx-auto">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
                endforeach;
                ?>

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $totalPaginas; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="propiedades.php?pagina=' . $i . '&tipo=' . $_GET['tipo'] . '&localidad=' . $_GET['localidad'] . '&zona=' . $_GET['zona'] . '">' . $i . '</a></li>';
                        } ?>
                    </ul>
                </nav>

            </div>
        </div>

    </section>

    <hr class="linea-divisoria">

    <?php include_once 'modules/footer-copyright.html' ?>

    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>