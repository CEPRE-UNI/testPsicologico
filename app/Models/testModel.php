<?php namespace App\Models;

use CodeIgniter\Model;

class DetalleTestModel extends Model
{
    protected $table      = 'test';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_alumno','folio', 'nombre','suma_r','suma_i','suma_a','suma_s','suma_e','suma_c'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
