<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumnosModel;
use App\Models\AreasModel;
use App\Models\TemporalPreguntasModel;
use App\Models\PreguntasModel;
use App\Models\TestModel;
use App\Models\DetalleTestModel;

class Test extends BaseController
{

	protected $alumnos, $temporal, $preguntas,$area,$detalle;

	public function __construct()
	{
		$this->alumnos = new AlumnosModel;
		$this->temporal = new TemporalPreguntasModel();
		$this->preguntas = new PreguntasModel();
		$this->area = new AreasModel();
		$this->test = new TestModel();
		$this->detalle=new DetalleTestModel();
		
	}
	
	public function guarda()
	{
		$folio = $this->request->getPost('folio');

		$session = session();
		// $resultadoId = $this->test->insertaVenta($folio, $session->id_usuario);
		$resultTest = $this->temporal->buscarFolios($folio);
		$suma_r=0;
		$suma_i=0;
		$suma_a=0;
		$suma_s=0;
		$suma_e=0;
		$suma_c=0;
		foreach ($resultTest as $row) {
			$areT=$this->preguntas->obtener($row['id_pregunta']);
			if($areT['nombre_corto']=="R"){
				if($row['respuesta']==1)
				$suma_r=$suma_r+1;
			}
			if($areT['nombre_corto']=="I"){
				if($row['respuesta']==1)
				$suma_i=$suma_i+1;
			}
			if($areT['nombre_corto']=="A"){
				if($row['respuesta']==1)
				$suma_a=$suma_a+1;
			}
			if($areT['nombre_corto']=="S"){
				if($row['respuesta']==1)
				$suma_s=$suma_s+1;
			}
			if($areT['nombre_corto']=="E"){
				if($row['respuesta']==1)
				$suma_e=$suma_e+1;
			}
			if($areT['nombre_corto']=="C"){
				if($row['respuesta']==1)
				$suma_c=$suma_c+1;
			}
		}
		$resultadoId = $this->test->inserta($session->id_alumno, $folio,$suma_r,$suma_i,$suma_a,$suma_s,$suma_e,$suma_c );
		foreach ($resultTest as $row) {
			$this->detalle->save([
				'id_test' => $resultadoId,
				'id_pregunta' => $row['id_pregunta'],
				'respuesta' => $row['respuesta']
			]);
		}
		return redirect()->to(base_url() . "/alumno/" );

	}
}
