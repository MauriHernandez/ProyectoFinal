<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>
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
            <form action="<?= base_url('index.php/admin/agregarE'); ?>" method="POST">
                <?= csrf_field() ?>
                <h2>Agregar Enfermera</h2>

                  <!-- INFORMACIÓN Y FORMULARIO DE ACUERDO A LA BASE DE DATOS-->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="lastnameP" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" name="lastnameP" id="lastnameP">
                </div>
                <div class="mb-3">
                    <label for="lastnameM" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" name="lastnameM" id="lastnameM">
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="birthday" id="birthday">
                </div>
                <div class="mb-3">
                    <label for="gender">Sexo</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Hombre" class="value">Hombre</option>
                        <option value="Mujer" class="value">Mujer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="curp" class="form-label">CURP</label>
                    <input type="text" class="form-control" name="curp" id="curp">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                
                <div class="mb-3">
                    <label for="street" class="form-label">Calle</label>
                    <input type="text" class="form-control" name="street" id="street">
                </div>
                <div class="mb-3">
                    <label for="numberE" class="form-label">Número Exterior</label>
                    <input type="number" class="form-control" name="numberE" id="numberE">
                </div>
                <div class="mb-3">
                    <label for="numberI" class="form-label">Número Interior</label>
                    <input type="number" class="form-control" name="numberI" id="numberI">
                </div>
                <div class="mb-3">
                    <label for="codPos" class="form-label">Código Postal</label>
                    <input type="number" class="form-control" name="codPos" id="codPos">
                </div>
                <div class="mb-3">
                    <label for="locality" class="form-label">Localidad</label>
                    <input type="text" class="form-control" name="locality" id="locality">
                </div>
                <div class="mb-3">
                    <label for="community" class="form-label">Municipio</label>
                    <input type="text" class="form-control" name="community" id="community">
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="state" id="state">
                </div>
                <div class="mb-3">
                    <label for="career" class="form-label">Carrera</label>
                    <input type="text" class="form-control" name="career" id="career">
                </div>
                <div class="mb-3">
                    <label for="specialty" class="form-label">Especialidad</label>
                    <input type="text" class="form-control" name="specialty" id="specialty">
                </div>
                <div class="mb-3">
                    <label for="license" class="form-label">Licencía</label>
                    <input type="text" class="form-control" name="license" id="license">
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Departamento</label>
                    <input type="text" class="form-control" name="department" id="department">
                </div>
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