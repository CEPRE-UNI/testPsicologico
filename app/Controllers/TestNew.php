<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumnosModel;
use App\Models\AreasModel;
use App\Models\TemporalPreguntasModel;
use App\Models\PreguntasModel;
use App\Models\DetalleTestModel;
use App\Models\TestNewModel;

class TestNew extends BaseController
{

	protected $alumnos, $temporal, $preguntas, $area, $detalle, $test;

	public function __construct()
	{
		$this->alumnos = new AlumnosModel;
		$this->temporal = new TemporalPreguntasModel();
		$this->preguntas = new PreguntasModel();
		$this->area = new AreasModel();
		$this->test = new TestNewModel();
		$this->detalle = new DetalleTestModel();
	}

	public function guarda()
	{
		$folio = $this->request->getPost('folio');

		$session = session();
		$resultTest = $this->temporal->buscarFolios($folio);
		$alumnos = $this->test->buscaralumno($session->id_alumno);
		if ($alumnos) {
			foreach ($alumnos as $row) {
				$this->test->update($row['id'], ['activo' => 0]);
			}
		}
		$areas = $this->area->findAll();
		foreach ($areas as $ar) {
			$suma_nota = 0;
			$idinsert = 0;
			foreach ($resultTest as $row) {
				$areT = $this->preguntas->obtener($row['id_pregunta']);
				if ($areT['nombre_corto'] ==  $ar['nombre_corto']) {
					if ($row['respuesta'] == 1) {
						$suma_nota = $suma_nota + 1;
						$result = $this->test->buscarFolioArea($folio,  $ar['id']);
						if (!$result) {
							$idinsert = $this->test->inserta($session->id_alumno, $folio, $suma_nota, $ar['id']);
						} else {
							$this->test->update($idinsert, ['suma_nota' => $suma_nota]);
						}
					}
				}
			}
		}

		foreach ($resultTest as $row) {
			$this->detalle->save([
				'id_test' => $folio,
				'id_pregunta' => $row['id_pregunta'],
				'respuesta' => $row['respuesta']
			]);
		}
		return redirect()->to(base_url() . "/alumno/");
	}
}
