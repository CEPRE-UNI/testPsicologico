<?php namespace App\Models;

use CodeIgniter\Model;

class TestNewModel  extends Model
{
    protected $table      = 'test_new';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_alumno','folio','suma_nota','id_area','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function inserta($id_alumno,$folio,$suma_nota, $id_area){
        $this->insert([
            'id_alumno'=>$id_alumno,
            'folio'=>$folio,
            'suma_nota'=>$suma_nota,
            'id_area'=>$id_area
        ]);
        return $this->insertID();
    }
    public function buscarFolioArea($folio, $id_area){
        $this->select('*');
        $this->where('folio',$folio);
        $this->where('id_area',$id_area);
        $datos=$this->get()->getRow();
        return $datos;
    }
    public function buscaralumno($id_alumno){
        $this->select('*');
        $this->where('id_alumno',$id_alumno);
        $datos=$this->findAll();
        return $datos;
    }
}
