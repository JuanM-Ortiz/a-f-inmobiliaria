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
                <p class="color-primary mx-5 fs-5"><i class="fas fa-envelope me-1"></i>ayfinmobiliaria@gmail.com</p>
                <p class="color-primary mx-5 fs-5"><i class="fab fa-whatsapp me-1"></i>+54 9 2664 344614</p>
            </div>
            <div class="bot-nav d-flex justify-content-around align-items-center">
                <a class="links fw-bold text-uppercase" href="#">Inicio</a>
                <a class="links fw-bold text-uppercase" href="#">Propiedades</a>
                <a class="links fw-bold text-uppercase" href="#">Nosotros</a>
                <a class="links fw-bold text-uppercase" href="#">Contacto y tasacion</a>
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
        </div>
    </section>


    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>