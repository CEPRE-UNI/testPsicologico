<?php namespace App\Models;

use CodeIgniter\Model;

class TestPreguntasModel extends Model
{
    protected $table      = 'test_preguntas';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['pregunta', 'id_area','id_tipo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
