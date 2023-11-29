<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body {
        background-color: #f4f8f9;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        margin-top: 50px;
    }

    .form-container {
        background-color: #fff;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .form-container h2 {
        color: #333;
        text-align: center;
    }

    .form-label {
        font-weight: bold;
        color: #555;
    }

    .form-control {
        margin-bottom: 15px;
    }

    .btn-success {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        display: block;
        margin: auto;
    }

    .btn-success:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    </style>
</head>
<body>
    

<div class="container">
        <div class="row justify-content-center">
            <div class="col-8 form-container">
                <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
                <?php endif; ?>
            <form action="<?= base_url('index.php/admin/updateA'); ?>" method="POST">
                <?= csrf_field() ?>
                <h2>Editar Apoyo</h2>
                  <!-- INFORMACIÓN Y FORMULARIO DE ACUERDO A LA BASE DE DATOS, CON PREVISTA DE LA INFORMACIÓN ALMACENADA-->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$help->nombre?>">
                </div>
             
                <div class="mb-3">
                    <label for="fechaLimite" class="form-label">Fecha Límite</label>
                    <input type="date" class="form-control" name="fechaLimite" id="fechaLimite" value="<?=$help->fechaLimite?>">
                </div>
             
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="description" value="<?=$help->descripcion?>">
                </div>
                <input type="hidden" name="id" value="<?= $help->id ?>">
                <div class="mb-3">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
</body>
</html>