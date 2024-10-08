<?php

include_once 'src/db/conn.php';
include_once 'src/models/propiedades.php';
include_once 'src/models/tiposPropiedad.php';
$conexion = Conexion::conectar();
$modeloPropiedad = new Propiedades($conexion);
$tipoPropiedadModel = new TiposPropiedad($conexion);

$tiposPropiedad = $tipoPropiedadModel->getTiposPropiedad();

if (isset($_GET['pagina'])) {
    $paginaActual = $_GET['pagina'];
} else {
    $paginaActual = 1;
}

$resultadosPorPagina = 8;
$inicio = ($paginaActual - 1) * $resultadosPorPagina;


if ($_GET['localidad'] || $_GET['zona'] || $_GET['tipo'] || $_GET['tipoPropiedad']) {
    $propiedades = $modeloPropiedad->getPropiedadesFiltered($_GET['zona'], $_GET['localidad'], $_GET['tipo'], $_GET['tipoPropiedad'], $inicio, $resultadosPorPagina);
} else {
    $propiedades = $modeloPropiedad->getPropiedadesConPrecio($inicio, $resultadosPorPagina);
}

if ($_GET['codigo']) {
    $propiedad = $modeloPropiedad->getPropiedadByCodigo($_GET['codigo']);
    header("Location: detalle-propiedad.php?id=" . $propiedad[0]['id']);
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
            <div class="featured-box-propiedades bg-secondary-coral-color col-md-4 col-6 offset-md-4 col-lg-2 offset-lg-5 offset-3 text-center ">
                <h2 class="featured text-white my-auto py-2 fw-bold bg-secondary-coral-color">Propiedades</h2>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row">
                <?php
                if (empty($propiedades)) :
                    echo '
                            <h4 class="text-white text-center">No hay resultados</h4>
                        ';
                endif;
                ?>

                <div class="col-lg-12 col-xl-9">
                    <div class="row ">
                        <?php foreach ($propiedades as $propiedad) :
                            $src = $propiedad['imagen_portada'];
                            $carpetaId = $propiedad['id'];
                            $imagePath = "assets/img/propiedades/" . $carpetaId . '/' . $src;

                            $moneda = $propiedad['moneda'] == 2 ? 'USD' : '$';

                            echo '
                    <div class="col-12 col-xxl-3 col-lg-6 col-md-6 d-flex justify-content-center mb-4">
                        <div class="card" style="width: 18rem;" onclick="redirectPropiedad(' . $propiedad['id'] . ')">
                            <img src="' . $imagePath . '" class="card-img-top" alt="...">
            
                            <div class="card-body text-white px-0 pb-0 d-flex flex-column justify-content-between">
                                <h5 class="card-title bg-secondary-coral-color text-center fw-bold py-1">' . strtoupper($propiedad['tipo_publicacion']) . '</h5>
            
                                <div class="titulo-container">
                                    <p class="card-text ms-3">' . $propiedad['titulo'] . '</p>
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
            
            
                                <div class="card-footer text-white px-2">
                                    <div class="row align-items-center">
                                        <div class="col-6 text-center">
                                            <p class=" fw-bold">' . $moneda . ' ' . number_format($propiedad['precio'], 0, '.', ',') . '</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <a href="detalle-propiedad.php?id=' . $propiedad['id'] . '" class="btn btn-primary">Ver más</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                        endforeach; ?>
                    </div>

                    <?php if (!empty($propiedades)) : ?>

                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php
                                    if ($totalPaginas > 1) {
                                        for ($i = 1; $i <= $totalPaginas; $i++) {
                                            echo '<li class="page-item"><a class="page-link bg-dark text-white" href="propiedades.php?pagina=' . $i . '&tipo=' . $_GET['tipo'] . '&localidad=' . $_GET['localidad'] . '&zona=' . $_GET['zona'] . '">' . $i . '</a></li>';
                                        }
                                    }
                                ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>

                <div class="col-xl-3 col-lg-12 borde-gris ">
                    <div class="buscador-propiedades bg-gray p-4">
                        <h3 class="text-white text-center">Búsqueda</h3>
                        <form action="propiedades.php">
                            <div class="mb-3">
                                <label for="tipo_propiedad" class="form-label text-white">Tipo de Propiedad</label>
                                <select class="form-select bg-dark" name="tipoPropiedad" id="tipo_propiedad">
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    <?php foreach ($tiposPropiedad as $tipo) : ?>
                                        <option value="<?= $tipo['id'] ?>" <?= $_GET['tipoPropiedad'] == $tipo['id'] ? 'selected' : '' ?>> <?= $tipo['descripcion'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tipo_publicacion" class="form-label text-white">Tipo de Publicación</label>
                                <select class="form-select bg-dark" name="tipo" id="tipo_publicacion">
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    <option value="2" <?= $_GET['tipo'] == 2 ? 'selected' : '' ?>>Venta</option>
                                    <option value="1" <?= $_GET['tipo'] == 1 ? 'selected' : '' ?>>Alquiler</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="codigo" class="form-label text-white">Código</label>
                                <input class="form-control bg-dark codigo-search" type="text" name="codigo" id="codigo" value="" placeholder="Ingrese un código de propiedad">
                            </div>
                            <button type="submit" class="boton-buscador btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            <a href="propiedades.php" class="boton-buscador btn btn-primary float-end"><i class="fa fa-times"></i> Limpiar filtros</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </section>

    <hr class="linea-divisoria">

    <?php include_once 'modules/footer-copyright.html' ?>

    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>