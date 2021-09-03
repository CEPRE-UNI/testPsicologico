<?php namespace App\Models;

use CodeIgniter\Model;

class AlumnosModel extends Model
{
    protected $table      = 'alumno';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['dni', 'nombres','apellidos','fecha_nac','sexo','grado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
