<?php

include_once 'src/db/conn.php';
include_once 'src/models/propiedades.php';

$conexion = Conexion::conectar();
$modeloPropiedad = new Propiedades($conexion);
//$propiedades = $modeloPropiedad->getPropiedades();
if (isset($_GET['pagina'])) {
    $paginaActual = $_GET['pagina'];
} else {
    $paginaActual = 1;
}
$resultadosPorPagina = 8;
$inicio = ($paginaActual - 1) * $resultadosPorPagina;
$propiedades = $modeloPropiedad->getPropiedadesConPrecio($inicio, $resultadosPorPagina);
$totalRegistros =  $modeloPropiedad->getCantidadPropiedades($_GET['tipo'], true);
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

    <section>
        <div class="img-container">
            <img class="img-main" src="assets/img/main.jpg" alt="">
            <div class="overlay-text">La oportunidad de disfrutar de la tranquilidad y la belleza de</div>
            <div class="location-tag fw-bold bg-coral-color">Merlo</div>
            <div class="search-bar py-md-3 py-0 mt-md-0 mt-2 pb-2">
                <form class="search-form" action="propiedades.php">
                    <input class="bg-dark mx-3 my-2 my-md-1" type="text" name="localidad" placeholder="Localidad">
                    <input class="bg-dark mx-3 my-2 my-md-1" type="text" name="zona" placeholder="Zona">
                    <button class="fw-bold fs-5" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </section>

    <section class="featured bg-main">
        <div class="banner-titulo-destacadas bg-gray row py-4 mt-4">
            <div class=" featured-box bg-coral-color col-md-2 col-6 offset-md-5 offset-3 text-center">
                <h2 class="featured text-white my-auto py-2 fw-bold">Destacadas</h2>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row ">

                <?php

                foreach ($propiedades as $propiedad) :
                    if ($propiedad['es_destacada'] == 1) :
                        $src = $propiedad['imagen_portada'];
                        $carpetaId = $propiedad['id'];
                        $imagePath = "assets/img/propiedades/" . $carpetaId . '/' . $src;

                        $moneda = $propiedad['moneda'] == 2 ? 'USD' : '$';

                        echo '
                
                        <div class="col-12 col-xxl-3 col-lg-6 col-md-6 d-flex justify-content-center mb-4">
                            <div class="card card-destacada" style="width: 18rem;" onclick="redirectPropiedad(' . $propiedad['id'] . ')">
                            <img src="' . $imagePath . '" class="card-img-top" alt="...">

                                <div class="card-body d-flex flex-column justify-content-between text-white px-0 pb-0">
                                    <h5 class="card-title bg-coral-color text-center fw-bold py-1">' . strtoupper($propiedad['tipo_publicacion']) . '</h5>
                                    <div class="titulo-container">
                                        <p class="card-text ps-3">' . $propiedad['titulo'] . '</p>
                                    </div>

                                        <div class="row mb-3">
                                        <div class="text-data col-4 px-0 d-flex flex-column align-items-center">
                                            <i class="fa-solid fa-up-down-left-right"></i>
                                            <span class="mt-1">' . $propiedad['superficie'] . 'm²</span>
                                        </div>
                                        <div class="text-data col-4 px-0 d-flex flex-column align-items-center border-start border-1 border-gray">
                                            <i class="fa-solid fa-up-down-left-right"></i>
                                            <span class="mt-1">' . $propiedad['superficie_cubierta'] . 'm²C</span>
                                        </div>
                                        <div class="text-data col-4 px-0 d-flex flex-column align-items-center border-start border-1 border-gray">
                                            <i class="fa-solid fa-bed"></i>
                                            <span class="mt-1">' . $propiedad['dormitorios'] . '</span>
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer borde-footer-destacada text-white px-2">
                                        <div class="row align-items-center">
                                            <div class="col-6 text-center">
                                                <p class="mt-3 fs-5">' . $moneda . ' ' . number_format($propiedad['precio']) . '</p>
                                            </div>
                                            <div class="col-6 text-center">
                                                <a href="detalle-propiedad.php?id=' . $propiedad['id'] . '" class="btn btn-primary mx-auto ">Ver más</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    endif;
                endforeach;

                ?>
                <?php if (!empty($propiedades)) : ?>

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php
                            if ($totalPaginas > 1) {
                                for ($i = 1; $i <= $totalPaginas; $i++) {
                                    echo '<li class="page-item"><a class="page-link bg-dark text-white" href="index.php?pagina=' . $i . '">' . $i . '</a></li>';
                                }
                            } ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>
        </div>

    </section>

    <section class="parallax-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="parallax-content">
                        <p class="fs-3 text-white">
                            Nuestra Misión: brindar un servicio de asesoramiento e intermediación en la compra-venta y alquiler de inmuebles, escuchando e identificando las necesidades de cada cliente y aportando valor a las inversiones.
                        </p>
                        <div class="d-flex justify-content-center">
                            <a class="btn-body" href="contacto.php">Contáctenos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once 'modules/footer-copyright.html' ?>


    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>