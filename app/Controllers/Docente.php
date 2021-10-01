<?php

namespace App\Controllers;

use App\Models\DocentesModel;

class Docente extends BaseController
{
	protected $session, $docente;

	public function __construct()
	{
		$this->session = session();
		$this->docente = new DocentesModel;

		helper(['form']);

		$this->reglasLogin = [
			'codigo' => [
				'rules' => 'required|numeric|exact_length[4]',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.',
					'numeric' => 'El campo {field} debe ser numérico.',
					'exact_length' => 'El campo {field} debe tener 4 numeros.'
				]
			]
		];
	}
	public function index()
	{
		$footer = [
			'docente' => true
		];
		echo view('header');
		echo view('docente/login');
		echo view('footer', $footer);
	}
	public function valida()
	{
		if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {
			$codigo = $this->request->getPost('codigo');

			$docenteData = $this->docente->where('codigo', $codigo)->first();
			if ($docenteData != null) {
				$sesionDatos = [
					'nombre_docente' => $docenteData['nombre'],
					'nombre_apellido' => $docenteData['apellido'],
				];
				$session = \Config\Services::session();
				$session->set($sesionDatos);
				return redirect()->to(base_url() . '/docente/dashboard');
			} else {

				$data['error'] = 'El docente no existe';
				$footer = [
					'docente' => true
				];
				echo view('header');
				echo view('docente/login', $data);
				echo view('footer', $footer);
			}
		} else {
			$data = [
				'validation' => $this->validator
			];
			$footer = [
				'docente' => true
			];
			echo view('header');
			echo view('docente/login', $data);
			echo view('footer', $footer);
		}
	}
	public function dashboard(){

	}
}
