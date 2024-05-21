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
        <div class="banner-titulo bg-gray row mt-4 py-4 ">
            <div class="featured-box-propiedades bg-secondary-coral-color col-md-2 col-6 offset-md-5 offset-3 text-center ">
                <h2 class="featured text-white my-auto py-2 fw-bold">Contacto</h2>
            </div>
        </div>

        <div class="container my-5">

            <form class="contact-form">
                <div class="row mb-3">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label text-white fw-bold fs-6">Nombre:</label>
                            <input type="text" class="form-control rounded bg-gray" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="mb-3 ">
                            <label for="apellido" class="form-label text-white fw-bold fs-6 mt-3">Apellido:</label>
                            <input type="text" class="form-control rounded bg-gray" id="apellido" name="apellido" placeholder="Apellido">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-white fw-bold fs-6 mt-3">Dirección de Correo Electrónico:</label>
                            <input type="email" class="form-control rounded bg-gray" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="celular" class="form-label text-white fw-bold fs-6 mt-3">Celular:</label>
                            <input type="tel" class="form-control rounded bg-gray" id="celular" name="celular" placeholder="Celular">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="asunto" class="form-label text-white fw-bold fs-6">Asunto:</label>
                            <input type="text" class="form-control rounded bg-gray" id="asunto" name="asunto" placeholder="Asunto">
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label text-white fw-bold fs-6 mt-1">Mensaje:</label>
                            <textarea class="form-control rounded bg-gray" id="mensaje" name="mensaje" rows="10" placeholder="Escribe un mensaje..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary fw-bold fs-5">Enviar</button>
                </div>
            </form>
        </div>

        <div class="bg-gray py-5">
            <div class="container">
                <div class="row">

                    <div class="text-center col-md-12 col-xl-6 contact-img px-5">
                        <img src="assets/img/main1.jpg" alt="Descripción de la imagen" class="img-fluid">
                    </div>

                    <div class="text-center col-md-12 col-xl-6 mt-3 text-white fw-bold fs-5 px-5">
                        <h3 class="text-center fw-bold">Contacto</h3>
                        <p class="text-white fs-5 fw-bold">El formulario que presentamos ha sido diseñado para asegurar un vínculo efectivo con nuestros clientes. Nuestro equipo de soporte al cliente se encargará de procesar sus consultas o requerimientos de forma diligente. Por favor, llene los siguientes campos con su información. Apreciamos mucho su colaboración.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once 'modules/footer-copyright.html' ?>


    <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>