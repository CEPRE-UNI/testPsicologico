<?php namespace App\Models;

use CodeIgniter\Model;

class TiposModel extends Model
{
    protected $table      = 'tipo';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'nombre_corto'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
