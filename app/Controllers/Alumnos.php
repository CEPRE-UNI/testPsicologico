<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumnosModel;

class Alumnos extends BaseController
{

	protected $alumnos, $reglasLogin;

	public function __construct()
	{
		$this->alumnos = new AlumnosModel;
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
	public function login()
	{
		echo view('login');
	}

	public function valida()
	{
		if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {
			$dni = $this->request->getPost('dni');
			$nombres = $this->request->getPost('nombres');
			$apellidos = $this->request->getPost('apellidos');
			$fecha_nac = $this->request->getPost('edad');
			$sexo = $this->request->getPost('sexo');
			$grado = $this->request->getPost('grado');
			// $usuario = $this->request->getPost('usuario');
			// $password = $this->request->getPost('password');
			// $usuarioData = $this->usuarios->where('usuario', $usuario)->first();
			$alumnosData = $this->alumnos->where('dni', $dni)->first();
			if ($alumnosData != null) {
				
					// $sesionDatos = [
					// 	'dni' => $alumnosData['id'],
					// 	'nombres' => $alumnosData['nombres'],
					// 	'apellidos' => $alumnosData['apellidos'],
					// 	'fecha_nac' => $alumnosData['fecha_nac'],
					// 	'sexo' => $alumnosData['sexo'],
					// 	'grado' => $alumnosData['grado']
					// ];
					// $session = \Config\Services::session();
					// $session->set($sesionDatos);
					// $session->markAsTempdata('id_usuario', 864000); // Expire in 24 h
					// $session->markAsTempdata('nombre', 864000); // Expire in 24 h
					// return redirect()->to(base_url() . '/home');
				
			} else {
				$this->alumnos->save([
					'dni' => $this->request->getPost('dni'),
					'nombres' => $this->request->getPost('nombres'),
					'apellidos' => $this->request->getPost('apellidos'),
					'fecha_nac' => $this->request->getPost('edad'),
					'sexo' => $this->request->getPost('sexo'),
					'grado' => $this->request->getPost('grado')
				]);
				$alumnosData = $this->alumnos->where('dni', $dni)->first();
				$sesionDatos = [
					'dni' => $alumnosData['dni'],
					'nombres' => $alumnosData['nombres'],
					'apellidos' => $alumnosData['apellidos'],
					'fecha_nac' => $alumnosData['fecha_nac'],
					'sexo' => $alumnosData['sexo'],
					'grado' => $alumnosData['grado']
				];
				$session = \Config\Services::session();
				$session->set($sesionDatos);
				// $session->markAsTempdata('dni', 864000); // Expire in 24 h // Expire in 24 h
				return redirect()->to(base_url() . '/qhatuni');
			}
		} else {
			$data = [
				'validation' => $this->validator
			];
			echo view('header');
			echo view('home', $data);
			echo view('footer');
		}
	}
	
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url());
	}
	//--------------------------------------------------------------------

}
