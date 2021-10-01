<?php namespace App\Models;

use CodeIgniter\Model;

class DocentesModel extends Model
{
    protected $table      = 'docente';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['dni', 'nombres','apellidos','codigo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
