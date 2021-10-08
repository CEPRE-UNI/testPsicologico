<?php

namespace App\Controllers;

use App\Models\DocentesModel;
use App\Models\AlumnosModel;


class Docente extends BaseController
{
	protected $session, $docente,$testNew;

	public function __construct()
	{
		$this->session = session();
		$this->docente = new DocentesModel;
		$this->alumnos = new AlumnosModel;

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
		if (isset($this->session->id_docente)) {
			return redirect()->to(base_url()."/docente/dashboard");
		}else{
			
		$shared = [
			'footer' => true,
			'header'=>true
		];
		echo view('header', $shared);
		echo view('docente/login');
		echo view('footer', $shared);
		}
	}
	
	public function valida()
	{
		if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {
			$codigo = $this->request->getPost('codigo');

			$docenteData = $this->docente->where('codigo', $codigo)->first();
			if ($docenteData != null) {
				$sesionDatos = [
					'nombre_docente' => $docenteData['nombre'],
					'apellido_docente' => $docenteData['apellido'],
					'id_docente' => $docenteData['id'],
				];
				$session = \Config\Services::session();
				$session->set($sesionDatos);
				return redirect()->to(base_url() . '/docente/dashboard');
			} else {

				$data['error'] = 'El docente no existe';
				$shared = [
					'footer' => true,
					'header'=>true
				];
				echo view('header', $shared);
				echo view('docente/login', $data);
				echo view('footer', $shared);
			}
		} else {
			$data = [
				'validation' => $this->validator
			];
			$shared = [
				'footer' => true,
				'header'=>true
			];
			echo view('header', $shared);
			echo view('docente/login', $data);
			echo view('footer', $shared);
		}
	}
	public function dashboard(){
		if (!isset($this->session->id_docente)) {
			return redirect()->to(base_url()."/docente");
		}

		$alumnos=$this->alumnos->getAlumnos();
		$caounAlumnos=$this->alumnos->contAlumnos();
		$caounDocente=$this->docente->contDocentes();

		$shared = [
			'footer' => false,
			'header'=>false
		];
		$data=[
			'alumnos'=>$alumnos,
			'caounDocente'=>$caounDocente,
			'caounAlumnos'=>$caounAlumnos
		];
		echo view('header',$shared);
		echo view('/docente/dashboard',$data);
		echo view('footer',$shared);
	}
	public function alumnos(){
		if (!isset($this->session->id_docente)) {
			return redirect()->to(base_url()."/docente");
		}

		$alumnos=$this->alumnos->getAlumnos();

		$shared = [
			'footer' => false,
			'header'=>false
		];
		$data=[
			'alumnos'=>$alumnos,
			'titulo'=>"Listado alumnos"
		];
		echo view('header',$shared);
		echo view('/docente/alumnos',$data);
		echo view('footer',$shared);
	}
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url()."/docente");
	}
}
