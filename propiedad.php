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
        <div class="bg-gray row mt-4 py-4">
            <h2 class="text-center text-white">CASA CENTRICA CON INMEJORABLE UBICACION</h2>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 mt-5 px-5">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
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
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="details-table col-md-6 bg-gray px-0 mt-5">
                    <div class="bg-coral-color">
                        <h2 class="text-center fw-bold text-white py-2">Detalles</h2>
                    </div>

                    <table class="table-tr w-100 mt-4">
                        <tr class="text-white fs-5">
                            <td><span class="dot">•</span> Superficie</td>
                            <td class="text-end">700 m2</td>
                        </tr>
                        <tr class="text-white fs-5">
                            <td><span class="dot">•</span> Sup. Cubierta</td>
                            <td class="text-end">150 m2</td>
                        </tr>
                        <tr class="text-white fs-5">
                            <td><span class="dot">•</span> Pisos</td>
                            <td class="text-end">1</td>
                        </tr>
                        <tr class="text-white fs-5">
                            <td><span class="dot">•</span> Dormitorios</td>
                            <td class="text-end">2</td>
                        </tr>
                        <tr class="text-white fs-5">
                            <td><span class="dot">•</span> Baños</td>
                            <td class="text-end">2</td>
                        </tr>
                        <tr class="text-white fs-5">
                            <td><span class="dot">•</span> Ubicación</td>
                            <td class="text-end">Merlo</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>

    </section>






    <section>

        <div class="container">
            <div class="row">

                <div class="col-md-6 mt-5 px-5">
                    <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Incidunt animi provident modi porro soluta odio totam qui suscipit laboriosam, optio,
                        dolore vero asperiores accusamus tenetur architecto facere error deleniti sed?</p>
                </div>

                <div class="contact-form-2 col-md-6 bg-main px-0 mt-5">
                    <div class="bg-coral-color">
                        <h2 class="text-center fw-bold text-white py-2">Contacto</h2>
                    </div>
                    <form class="p-3">
                        <div class="form-group mb-3">
                            <label for="nombreApellido" class="text-white">Nombre y apellido *:</label>
                            <input type="text" class="form-control bg-gray" id="nombreApellido" placeholder="Ingrese Nombre y Apellido" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ciudad" class="text-white">Ciudad *:</label>
                            <input type="text" class="form-control bg-gray" id="ciudad" placeholder="Ingrese Ciudad" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="celular" class="text-white">Celular *:</label>
                            <input type="text" class="form-control bg-gray" id="celular" placeholder="Ingrese Teléfono Celular" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="text-white">Email:</label>
                            <input type="email" class="form-control bg-gray" id="email" placeholder="Ingrese Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="consulta" class="text-white">Consulta *:</label>
                            <textarea class="form-control bg-gray" id="consulta" placeholder="Escriba su consulta..." required></textarea>
                        </div>
                        <button type="submit" class="btn text-white bg-coral-color fw-bold">Enviar</button>
                    </form>
                </div>


            </div>
        </div>

    </section>

    <div class="bg-gray row mt-4 py-4">

    </div>


    <?php include_once 'modules/footer-copyright.html' ?>


    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>