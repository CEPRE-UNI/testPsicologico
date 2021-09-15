<?php namespace App\Models;

use CodeIgniter\Model;

class PreguntasModel extends Model
{
    protected $table      = 'preguntas';
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

    public function buscar($id_pregunta){
        $this->select('id_area');
        $this->where('id',$id_pregunta);
        $datos=$this->get()->getRow();
        return $datos;
    }
    public function obtener($id_pregunta){
        $this->select('a.nombre_corto AS nombre_corto, t.nombre_corto AS tipo');
        $this->join('area AS a', 'preguntas.id_area=a.id');
        $this->join('tipo AS t', 'preguntas.id_tipo=t.id');
        $this->where('preguntas.id', $id_pregunta);
        // $this->orderBy('ventas.fecha_alta', 'DESC');
        $datos=$this->first();
        return $datos;
    }
}
