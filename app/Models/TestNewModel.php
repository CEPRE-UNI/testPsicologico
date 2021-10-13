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
    public function obtener($id_alumno, $activo=1){
        $this->select('test_new.*,a.nombre_corto AS nombre_corto, a.nombre AS nombre, a.detalle AS detalle');
        $this->join('area AS a', 'test_new.id_area=a.id');
        // $this->join('tipo AS t', 'preguntas.id_tipo=t.id');
        $this->where('test_new.id_alumno', $id_alumno);
        $this->where('test_new.activo', $activo);
        // $this->orderBy('ventas.fecha_alta', 'DESC');
        $datos=$this->findAll();
        return $datos;
    }
    public function obtenerTodos($activo=1){
        $this->select('test_new.*,al.nombres as nombreAlumno,a.nombre_corto AS nombre_corto, a.nombre AS nombre');
        $this->join('area AS a', 'test_new.id_area=a.id');
        $this->join('alumno AS al', 'test_new.id_alumno=al.id');
        // $this->join('tipo AS t', 'preguntas.id_tipo=t.id');
        // $this->where('test_new.id_alumno', $id_alumno);
        $this->where('test_new.activo', $activo);
        // $this->orderBy('ventas.fecha_alta', 'DESC');
        $datos=$this->findAll();
        return $datos;
    }
}
