<?php namespace App\Models;

use CodeIgniter\Model;

class TemporalPreguntasModel extends Model
{
    protected $table      = 'temporal_pregunta';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['folio','id_pregunta', 'respuesta'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function inserta($folio,$id_pregunta,$respuesta){
        $this->insert([
            'folio'=>$folio,
            'id_pregunta'=>$id_pregunta,
            'respuesta'=>$respuesta
            ]);

    }
    public function actualizar($folio,$id_pregunta,$respuesta){
        $this->set('respuesta',$respuesta);
        $this->where('id_pregunta',$id_pregunta);
        $this->where('folio',$folio);
        $this->update();

    }
    public function buscarFolioPregunta($folio, $id_pregunta){
        $this->select('*');
        $this->where('folio',$folio);
        $this->where('id_pregunta',$id_pregunta);
        $datos=$this->get()->getRow();
        return $datos;
    }
}
