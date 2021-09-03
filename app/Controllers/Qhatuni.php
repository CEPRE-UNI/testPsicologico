<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumnosModel;

class Qhatuni extends BaseController
{

	protected $alumnos, $reglasLogin,$session;

	public function __construct()
	{
		$this->alumnos = new AlumnosModel;
		$this->session=session();
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
		$data=[
			'titulo'=>'cajas'
		];
		echo view('header');
		echo view('Qhatuni/test', $data);
		echo view('footer');
	}
	
	//--------------------------------------------------------------------

}
