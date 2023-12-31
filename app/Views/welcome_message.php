<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenidos - Aplicación de Salud del Bienestar</title>
    <meta name="description" content="Aplicación de Salud del Bienestar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- STYLES -->

    <style>
        body {
            background-color: #f4f8f9;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .hero-section {
            text-align: center;
            padding: 150px 20px;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url('your-background-image.jpg') center/cover no-repeat;
            position: relative;
            color: #333;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #ff9900, #ff5e62);
            opacity: 0.7;
            z-index: -1;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #333;
        }

        h2 {
            font-size: 1.5em;
            font-weight: 400;
            color: #555;
        }

        .btn-login {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.2em;
            text-decoration: none;
            background-color: #ff5e62;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #ff3340;
        }
    </style>
</head>
<body>

<!-- HERO SECTION -->
<section class="hero-section">
    <div class="overlay"></div>
    <h1>BIENVENIDOS</h1>
    <h2>APLICACIÓN DE SALUD DEL BIENESTAR</h2>
    <a href="/usuarios/login" class="btn-login">Iniciar Sesión</a>

</section>

</body>
</html>
