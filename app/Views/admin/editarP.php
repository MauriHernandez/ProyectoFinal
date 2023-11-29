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
            <form action="<?= base_url('index.php/admin/updateP'); ?>" method="POST">
                <?= csrf_field() ?>
                <h2>Editar Paciente</h2>
                 <!-- INFORMACIÓN Y FORMULARIO DE ACUERDO A LA BASE DE DATOS, CON PREVISTA DE LA INFORMACIÓN ALMACENADA-->
             
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?=$pacient->nombre?>">
                </div>
                <div class="mb-3">
                    <label for="lastnameP" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" name="lastnameP" id="lastnameP" value="<?=$pacient->apellidoP?>">
                </div>
                <div class="mb-3">
                    <label for="lastnameM" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" name="lastnameM" id="lastnameM" value="<?=$pacient->apellidoM?>">
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="birthday" id="birthday" value="<?=$pacient->fechaNacimiento?>">
                </div>
                <div class="mb-3">
                    <label for="gender">Sexo</label>
                    <select name="gender" id="sexo" class="form-control" value="<?=$pacient->genero?>">
                        <option value="Hombre" class="value">Hombre</option>
                        <option value="Mujer" class="value">Mujer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="curp" class="form-label">CURP</label>
                    <input type="text" class="form-control" name="curp" id="curp" value="<?=$pacient->curp?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?=$pacient->celular?>">
                </div>
                <div class="mb-3">
                    <label for="occupation" class="form-label">Ocupación</label>
                    <input type="text" class="form-control" name="occupation" id="occupation" value="<?=$pacient->ocupacion?>">
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Calle</label>
                    <input type="text" class="form-control" name="street" id="street" value="<?=$pacient->calle?>">
                </div>
                <div class="mb-3">
                    <label for="numberE" class="form-label">Número Exterior</label>
                    <input type="number" class="form-control" name="numberE" id="numberE" value="<?=$pacient->numeroExterior?>">
                </div>
                <div class="mb-3">
                    <label for="numberI" class="form-label">Número Interior</label>
                    <input type="number" class="form-control" name="numberI" id="numberI" value="<?=$pacient->numeroInterior?>">
                </div>
                <div class="mb-3">
                    <label for="codPos" class="form-label">Código Postal</label>
                    <input type="number" class="form-control" name="codPos" id="codPos" value="<?=$pacient->codigoPostal?>">
                </div>
                <div class="mb-3">
                    <label for="locality" class="form-label">Localidad</label>
                    <input type="text" class="form-control" name="locality" id="locality" value="<?=$pacient->localidad?>">
                </div>
                <div class="mb-3">
                    <label for="community" class="form-label">Municipio</label>
                    <input type="text" class="form-control" name="community" id="community" value="<?=$pacient->municipio?>">
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="state" id="state" value="<?=$pacient->estado?>">
                </div>
                <div class="mb-3">
                    <label for=" numberA" class="form-label">Número de Asociación</label>
                    <input type="text" class="form-control" name="numberA" id="numberA" value="<?=$pacient->numeroAsociacion?>">
                </div>
                <div class="mb-3">
                    <label for=" levelA" class="form-label">Nivel de Asociación</label>
                    <input type="text" class="form-control" name="levelA" id="levelA" value="<?=$pacient->nivelAsociacion?>">
                </div>
                <div class="mb-3">
                    <label for=" numberT" class="form-label">Número de Tarjeta</label>
                    <input type="text" class="form-control" name="numberT" id="numberT" value="<?=$pacient->numeroTarjeta?>">
                </div>
                <input type="hidden" name="id" value="<?= $pacient->id ?>">
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