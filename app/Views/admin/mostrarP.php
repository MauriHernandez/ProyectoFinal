<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Listado de Pacientes</title>
    <link rel="stylesheet" href="estilo.css"> <!-- Include the shared stylesheet -->

    <style>
   body {
            background-color: #f4f8f9;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 50px;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: #fff;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }

        .btn-editar,
        .btn-eliminar {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
                border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-editar {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-eliminar {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-editar:hover,
        .btn-eliminar:hover {
            color: #fff;
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-editar:focus,
        .btn-eliminar:focus {
            color: #fff;
            background-color: #218838;
            border-color: #1e7e34;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Listado de Pacientes</h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Sexo</th>
                        <th>CURP</th>
                        <th>Teléfono</th>
                        <th>Ocupación</th>
                        <th>Domicilio</th>
                        <th>Número de Afiliación</th>
                        <th>Nivel de Afiliación</th>
                        <th>Número de Tarjeta</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pacients as $pacient): ?>
                        <tr>
                            <td><?= $pacient->nombre . ' ' . $pacient->apellidoP . ' ' . $pacient->apellidoM ?></td>
                            <td><?= $pacient->fechaNacimiento ?></td>
                            <td><?= $pacient->genero ?></td>
                            <td><?= $pacient->curp ?></td>
                            <td><?= $pacient->celular ?></td>
                            <td><?= $pacient->ocupacion ?></td>
                            <td><?= $pacient->calle . ' ' . $pacient->localidad . ' ' . $pacient->municipio . ' ' . $pacient->estado ?></td>
                            <td><?= $pacient->numeroAsociacion ?></td>
                            <td><?= $pacient->nivelAsociacion ?></td>
                            <td><?= $pacient->numeroTarjeta ?></td>
                            <td><a class="btn-editar" href="<?=base_url('index.php/admin/editarP/'.$pacient->id);?>">Editar</a></td>
                            <td><a class="btn-eliminar" href="<?=base_url('index.php/admin/deleteP/'.$pacient->id);?>">Eliminar</a></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
