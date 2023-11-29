<?php

namespace App\Models;

use CodeIgniter\Model;

class PacienteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'paciente';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'nombre' ,
        'apellidoP' ,
        'apellidoM' ,
        'fechaNacimiento',
        'genero',
        'curp ',
        'celular',
        'foto ',
        'ocupacion' ,
        'calle' ,
        'numeroExterior' ,
        'numeroInterior' ,
        'codigoPostal',
        'localidad' ,
        'municipio' ,
        'estado' ,
        'numeroAsociacion' ,
        'nivelAsociacion' ,
        'numeroTarjeta' ,
        'status',
        'created_at' ,      
    ]

 ;   // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
