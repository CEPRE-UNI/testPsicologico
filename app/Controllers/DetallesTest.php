<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumnosModel;
use App\Models\TemporalPreguntasModel;
use App\Models\PreguntasModel;

class DetallesTest extends BaseController
{

	protected $alumnos, $temporal, $preguntas;

	public function __construct()
	{
		$this->alumnos = new AlumnosModel;
		$this->temporal = new TemporalPreguntasModel();
		$this->preguntas = new PreguntasModel();
		
	}
	public function cargarPregunta($folio, $id_pregunta, $respuesta)
	{
		$datos = $this->preguntas->where('id', $id_pregunta)->first();
		$datosT=$this->temporal->buscarFolioPregunta($folio, $id_pregunta);

		if ($datos) {
			
			if ($datosT) {
				$this->temporal->actualizar($folio,$id_pregunta,$respuesta);
			} else {
				$this->temporal->inserta($folio, $id_pregunta, $respuesta);
			}
		}
	}

	//--------------------------------------------------------------------

}
