<?php namespace App\Models;

use CodeIgniter\Model;

class DetalleTestModel extends Model
{
    protected $table      = 'detalle_test';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['folio','id_pregunta', 'respuesta'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
