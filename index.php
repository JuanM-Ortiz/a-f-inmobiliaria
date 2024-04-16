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

    <nav class="nav-desktop d-none d-lg-flex">
        <div class="logo">
            <img src="assets/img/logoNav.png" alt="Logo" width="200" height="200">
        </div>
        <div class="double-navbar">
            <div class="top-nav d-flex justify-content-end align-items-center ">
                <p class="orange-color mx-5 fs-5"><i class="fas fa-envelope me-1"></i>ayfinmobiliaria@gmail.com</p>
                <p class="orange-color mx-5 fs-5"><i class="fab fa-whatsapp me-1"></i>+54 9 2664 344614</p>
            </div>
            <div class="bot-nav d-flex justify-content-around align-items-center">
                <a class="links fw-bold fs-5" href="#">Inicio</a>
                <a class="links fw-bold fs-5" href="#">Propiedades</a>
                <a class="links fw-bold fs-5" href="#">Nosotros</a>
                <a class="links fw-bold fs-5" href="#">Contacto y tasacion</a>
            </div>
        </div>
    </nav>

    <nav class="nav-movil navbar navbar-expand-lg d-lg-none d-flex">
        <div class="container-fluid p-0">
            <a class="navbar-brand" href="#">
                <img class="logo" src="assets/img/logoNav.png" alt="">
            </a>
            <button class="nav-button navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav-collap collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex flex-direction-column align-items-center">
                    <li class="nav-item w-100 text-center">
                        <a class="nav-link active movil-links fw-bold" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item w-100 text-center">
                        <a class="nav-link movil-links fw-bold" href="#">Propiedades</a>
                    </li>
                    <li class="nav-item w-100 text-center">
                        <a class="nav-link movil-links fw-bold" href="#">Nosotros</a>
                    </li>
                    <li class="nav-item w-100 text-center">
                        <a class="nav-link movil-links fw-bold" aria-disabled="true">Contacto y tasacion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="img-container">
            <img class="img-main" src="assets/img/main.jpg" alt="">
            <div class="overlay-text">La oportunidad de disfrutar de la tranquilidad y la belleza de</div>
            <div class="location-tag fw-bold bg-coral-color">Merlo</div>
            <div class="search-bar py-3">
                <form class="search-form" action="">
                    <input class="bg-dark mx-3 my-2 my-md-1" type="text" name="search" placeholder="Localidad">
                    <input class="bg-dark mx-3 my-2 my-md-1" type="text" name="search" placeholder="Zona">
                    <button class="fw-bold fs-5" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </section>

    <section class="featured bg-main">
        <div class="bg-gray row mt-4 py-4">
            <div class="featured-box bg-coral-color col-2 offset-5 text-center">
                <h2 class="text-white my-auto py-2 fw-bold">Destacadas</h2>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row ">
                <div class="col-12 col-md-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/casa1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white px-0 pb-0">
                            <h5 class="card-title bg-coral-color text-center fw-bold py-1">Venta</h5>
                            <p class="card-text ps-3">Casa céntrica inmejorable ubicación</p>
                            <div class="card-footer text-white">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mt-3">USD 70,000</p>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-primary mx-auto">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/casa1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white px-0 pb-0">
                            <h5 class="card-title bg-coral-color text-center fw-bold py-1">Venta</h5>
                            <p class="card-text ps-3">Casa céntrica inmejorable ubicación</p>
                            <div class="card-footer text-white">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mt-3">USD 70,000</p>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-primary mx-auto">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/casa1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white px-0 pb-0">
                            <h5 class="card-title bg-coral-color text-center fw-bold py-1">Venta</h5>
                            <p class="card-text ps-3">Casa céntrica inmejorable ubicación</p>
                            <div class="card-footer text-white">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mt-3">USD 70,000</p>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-primary mx-auto">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/casa1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white px-0 pb-0">
                            <h5 class="card-title bg-coral-color text-center fw-bold py-1">Venta</h5>
                            <p class="card-text ps-3">Casa céntrica inmejorable ubicación</p>
                            <div class="card-footer text-white">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <p class="mt-3">USD 70,000</p>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-primary mx-auto">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="py-2 bg-gray my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center py-5">
                <img class="img-body" src="assets/img/contrato.jpg" alt="" style="max-width: 100%; height: auto;">
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-center px-5">
                <div>
                    <p class="fs-3 text-white">
                        Nuestra Misión: brindar un servicio de asesoramiento e intermediación en la compra-venta y alquiler de inmuebles, escuchando e identificando las necesidades de cada cliente y aportando valor a las inversiones.
                    </p>
                    <div class="d-flex justify-content-center">
                        <a class="btn-body bg-orange-color py-2 px-4" href="#">Contáctenos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <div class="container footer">
        <footer class="row py-5" id="footer">
            <div class="col-md-4 text-md-start col-12 text-center text-white">
                <h3 class="fw-bold">Contacto</h3>
                <p><i class="fas fa-phone pt-3"></i> +54 9 2664 544173</p>
                <p><i class="fas fa-envelope"></i> ayfinmobiliaria@gmail.com</p>
                <p><i class="fab fa-whatsapp"></i> +54 9 2664 344614</p>
            </div>
            <div class="col-md-4 text-center pt-3 pt-md-0 d-flex justify-content-center align-items-center">
                <a href="https://www.instagram.com/productorauno/" target="_blank" class="mx-3 orange-color"><i class="fab fa-instagram fa-4x footer-icon "></i></a>
                <a href="https://www.facebook.com/aleciorivera.ph" target="_blank" class="mx-3 orange-color"><i class="fab fa-facebook fa-4x footer-icon"></i></a>
                <a href="https://wa.me/5492664344614" target="_blank" class="mx-3 orange-color"><i class="fab fa-whatsapp fa-4x footer-icon"></i></a>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">

                <ul class=" text-white fw-bold fs-4 ms-5">
                    <a class="footer-links" href=""><li>Inicio</li></a>
                    <a class="footer-links" href=""><li>Propiedades</li></a>
                    <a class="footer-links" href=""><li>Nosotros</li></a>
                    <a class="footer-links" href=""><li>Contacto</li></a>
                </ul>
            </div>
        </footer>
    </div>

    <div class="py-2 bg-gray w-100">
        <p class="text-white text-center border-bottom border-dark-subtle py-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor optio alias tenetur soluta deleniti ex cupiditate debitis dignissimos, ducimus aperiam adipisci velit ea praesentium sunt eveniet necessitatibus qui, sit reiciendis?
        </p>
        <p class="text-white text-center py-1">
            © 2024 A & F Desarrollos Inmobiliarios -  Merlo San Luis.
        </p>
    </div>


    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>