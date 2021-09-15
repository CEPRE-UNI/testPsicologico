<?php namespace App\Models;

use CodeIgniter\Model;

class AreasModel extends Model
{
    protected $table      = 'area';
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

    public function buscar($id_area){
        $this->select('*');
        $this->where('id',$id_area);
        $datos=$this->get()->getRow();
        return $datos;
    }
}
