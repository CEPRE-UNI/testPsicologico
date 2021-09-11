<?php namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table      = 'test';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_alumno','folio','suma_r','suma_i','suma_a','suma_s','suma_e','suma_c','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function insertaVenta($id_alumno,$folio){
        $this->insert([
            'id_alumno'=>$id_alumno,
            'folio'=>$folio
            // 'suma_r'=>$suma_r,
            // 'suma_i'=>$suma_i,
            // 'suma_a'=>$suma_a,
            // 'suma_s'=>$suma_s,
            // 'suma_e'=>$suma_e,
            // 'suma_c'=>$suma_c
        ]);
        return $this->insertID();
    }
}
