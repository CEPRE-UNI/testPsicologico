<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumnosModel;
use App\Models\TestNewModel;

class Alumno extends BaseController
{

	protected $alumnos, $reglasLogin, $session, $test;

	public function __construct()
	{
		$this->alumnos = new AlumnosModel;
		$this->test = new TestNewModel();
		$this->session = session();
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
			$alumnosData1 = $this->alumnos->where('dni', $dni)->first();
			if ($alumnosData1 != null) {
				$data = [
					'nombres' => $nombres,
					'apellidos' => $apellidos,
					'fecha_nac' => $fecha_nac,
					'sexo' => $sexo,
					'grado' => $grado
				];
				$this->alumnos->update(
					$alumnosData1['id'],
					$data
				);
				$alumnosData = $this->alumnos->where('dni', $dni)->first();
				$sesionDatos = [
					'id_alumno' => $alumnosData['id'],
					'dni' => $alumnosData['dni'],
					'nombres' => $alumnosData['nombres'],
					'apellidos' => $alumnosData['apellidos'],
					'fecha_nac' => $alumnosData['fecha_nac'],
					'sexo' => $alumnosData['sexo'],
					'grado' => $alumnosData['grado']
				];
				$session = \Config\Services::session();
				$session->set($sesionDatos);
				return redirect()->to(base_url() . '/alumno');
			} else {
				$this->alumnos->save([
					'dni' => $this->request->getPost('dni'),
					'nombres' => $nombres,
					'apellidos' => $apellidos,
					'fecha_nac' => $fecha_nac,
					'sexo' => $sexo,
					'grado' => $grado
				]);
				$alumnosData = $this->alumnos->where('dni', $dni)->first();
				$sesionDatos = [
					'id_alumno' => $alumnosData['id'],
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
	public function index()
	{
		if (!isset($this->session->dni)) {
			return redirect()->to(base_url());
		}
		$test = $this->test->where('id_alumno', $this->session->id_alumno)->first();
		if ($this->session->id_alumno == $test['id_alumno']) {
			$dataPerfil = $this->alumnos->where('dni', $this->session->dni)->first();
			$data = [
				'titulo' => 'cajas',
				'dataPerfil' => $dataPerfil
			];
			echo view('header');
			echo view('Qhatuni/perfil', $data);
			echo view('footer');
		} else {
			return redirect()->to(base_url() . "/qhatuni");
		}
	}
	// $data=[
	// 	'dataPerfil'=>$dataPerfil,

	// ];

}
