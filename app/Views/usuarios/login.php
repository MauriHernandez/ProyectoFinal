<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Aplicación de Salud del Bienestar</title>
    <meta name="description" content="Iniciar Sesión en la Aplicación de Salud del Bienestar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- STYLES -->

    <style>
        body {
            background-color: #f4f8f9;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 50px auto; 
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-align: center; 
        }

        .btn-login {
            display: block;
            width: 100%; 
            padding: 10px;
            font-size: 1.2em;
            text-decoration: none;
            background-color: #ff5e62;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            box-sizing: border-box;      }

        .btn-login:hover {
            background-color: #ff3340;
        }
    </style>
</head>
<body>

<!-- FORMULARIO PARA LOGIN-->
<div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form action="<?= base_url('usuarios/login'); ?>" method="POST">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="text">Correo Electrónico</label>
            <input type="text" class="form-control" id="text" name="text" aria-describedby="text">
              </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary btn-login">Submit</button>
    </form>
</div>

</body>
</html>
