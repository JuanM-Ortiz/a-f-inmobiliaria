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
            <a href="index.php">
                <img src="assets/img/logoNav.png" alt="Logo" width="200" height="200">
            </a>
        </div>
        <div class="double-navbar">
            <div class="top-nav d-flex justify-content-end align-items-center ">
                <p class="orange-color mx-5 fs-5"><i class="fas fa-envelope me-1"></i>ayfinmobiliaria@gmail.com</p>
                <p class="orange-color mx-5 fs-5"><i class="fab fa-whatsapp me-1"></i>+54 9 2664 344614</p>
            </div>
            <div class="bot-nav d-flex justify-content-around align-items-center">
                <a class="links fw-bold fs-5" href="index.php">Inicio</a>
                <a class="links fw-bold fs-5" href="propiedades.php">Propiedades</a>
                <a class="links fw-bold fs-5" href="nosotros.php">Nosotros</a>
                <a class="links fw-bold fs-5" href="contacto.php">Contacto y tasacion</a>
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
                        <a class="nav-link active movil-links fw-bold" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item w-100 text-center">
                        <a class="nav-link movil-links fw-bold" href="propiedades.php">Propiedades</a>
                    </li>
                    <li class="nav-item w-100 text-center">
                        <a class="nav-link movil-links fw-bold" href="nosotros.php">Nosotros</a>
                    </li>
                    <li class="nav-item w-100 text-center">
                        <a class="nav-link movil-links fw-bold" aria-disabled="true" href="contacto.php">Contacto y tasacion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <h2 class="text-center text-white">NOSOTROS</h2>
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
                    <a class="footer-links" href="index.php">
                        <li>Inicio</li>
                    </a>
                    <a class="footer-links" href="propiedades.php">
                        <li>Propiedades</li>
                    </a>
                    <a class="footer-links" href="nosotros.php">
                        <li>Nosotros</li>
                    </a>
                    <a class="footer-links" href="contacto.php">
                        <li>Contacto</li>
                    </a>
                </ul>
            </div>
        </footer>
    </div>

    <div class="py-2 bg-gray w-100">
        <p class="text-white text-center border-bottom border-dark-subtle py-2">
            Todas las medidas enunciadas son meramente orientativas, las medidas exactas serán las que se expresen en el respectivo título de propiedad de cada inmueble. Todas las fotos, imagenes y videos son meramente ilustrativos y no contractuales. Los precios enunciados son meramente orientativos y no contractuales..
        </p>
        <p class="text-white text-center py-1">
            © 2024 A & F Desarrollos Inmobiliarios - Merlo San Luis.
        </p>
    </div>


    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>