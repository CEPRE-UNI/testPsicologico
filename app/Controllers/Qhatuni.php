<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PreguntasModel;
use App\Models\AreasModel;
use App\Models\TiposModel;
use App\Models\TestNewModel;

class Qhatuni extends BaseController
{

	protected $alumnos, $reglasLogin,$session,$testPreguntas,$areas,$test;

	public function __construct()
	{
		$this->testPreguntas = new PreguntasModel;
		$this->session=session();
		$this->areas=new AreasModel();
		$this->tipos=new TiposModel();
		$this->test=new TestNewModel;
		helper(['form']);

		$this->reglasLogin = [
			'dni' => [
				'rules' => 'required|numeric|exact_length[8]',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.',
					'numeric' => 'El campo {field} debe ser numérico.',
					'exact_length' => 'El campo {field} debe tener 8 numeros.'
				]
			],
			'nombres' => [
				'rules' => 'required|string',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.',
					'string' => 'El campo {field} debe contener solo texto.'
				]
			],
			'apellidos' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.'
				]
			],
			'edad' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.'
				]
			],
			'sexo' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.'
				]
			],
			'grado' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.'
				]
			]
		];
	}
	
	public function index(){

		if (!isset($this->session->dni)){
			return redirect()->to(base_url());
		}
		$testPreguntas=$this->testPreguntas->findAll();
		$areas=$this->areas->findAll();
		$tipos=$this->tipos->findAll();
		$test=$this->test->where('id_alumno', $this->session->id_alumno)->first();
		// $test=$this->test->findAll();
		$testTrue=false;
		// foreach($test as $row){
			if ($this->session->id_alumno==$test['id_alumno']){
				$testTrue=true;
			}
		// }
		$data=[
			'titulo'=>'cajas',
			'preguntas'=>$testPreguntas,
			'tipos'=>$tipos,
			'areas'=>$areas,
			'test'=>$testTrue

		];
		echo view('header');
		echo view('Qhatuni/test', $data);
		echo view('footer');
	}
	
	//--------------------------------------------------------------------

}
