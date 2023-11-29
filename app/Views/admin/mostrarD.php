<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
            body {
    background-color: #f4f8f9;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    margin-top: 50px;
    overflow-x: auto; /* Agregado para permitir el desplazamiento horizontal en caso de que el contenido sea demasiado ancho */
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
            <h2>Listado de Doctores</h2>
            <table class="table">
            <thead class="thead-dark">
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Sexo</th>
                    <th>CURP</th>
                    <th>Teléfono</th>
                    <th>Domicilio </th>
                    <th>Carrera</th>
                    <th>Especialidad</th>
                    <th>Licencia</th>
                    <th>Departamento</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>

                    <?php foreach($doctors as $doctor):?>
                    <tr>
                        <td><?=$doctor->nombre?> 
                        <?=$doctor->apellidoP?>
                        <?=$doctor->apellidoM?></td>
                        <td><?=$doctor->fechaNacimiento?></td>
                        <td><?=$doctor->genero?></td>
                        <td><?=$doctor->curp?></td>
                        <td><?=$doctor->celular?></td>
                        <td><?=$doctor->calle?>
                        <?=$doctor->localidad?>
                        <?=$doctor->municipio?>
                        <?=$doctor->estado?>
                        </td>
                        <td><?=$doctor->carrera?></td>
                        <td><?=$doctor->especialidad?></td>
                        <td><?=$doctor->cedulaProfesional?></td>
                        <td><?=$doctor->departamento?></td>
                        <td><a class="btn-editar" href="<?=base_url('index.php/admin/editarD/'.$doctor->id);?>">Editar</a></td>
                        <td><a class="btn-eliminar" href="<?=base_url('index.php/admin/deleteD/'.$doctor->id);?>">Eliminar</a></td>

                    </tr>

                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
