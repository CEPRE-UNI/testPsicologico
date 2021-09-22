<?php namespace App\Models;

use CodeIgniter\Model;

class ClavesModel extends Model
{
    protected $table      = 'claves';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['codigo', 'carrera','id_grado','id_area1','id_area2'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtener($id_area1, $id_area2){
        $this->select('claves.carrera,g.nombre AS nombre_grado,a1.nombre as nombre_area1,a2.nombre as nombre_area2');
        $this->join('grados AS g', 'claves.id_grado=g.id');
        $this->join('area AS a1', 'claves.id_area1=a1.id');
        $this->join('area AS a2', 'claves.id_area2=a2.id');
        // $this->join('tipo AS t', 'preguntas.id_tipo=t.id');
        $this->where('claves.id_area1', $id_area1);
        $this->where('claves.id_area2', $id_area2);
        // $this->orderBy('ventas.fecha_alta', 'DESC');
        $datos=$this->findAll();
        return $datos;
    }
}
