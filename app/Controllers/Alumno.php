<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumnosModel;
use App\Models\TestNewModel;
use App\Models\ClavesModel;


class Alumno extends BaseController
{

	protected $alumnos, $reglasLogin, $session, $test;

	public function __construct()
	{
		$this->alumnos = new AlumnosModel;
		$this->test = new TestNewModel();
		$this->session = session();
		$this->claves = new ClavesModel();

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
			],
			'telefono' => [
				'rules' => 'required|numeric|exact_length[9]',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.',
					'numeric' => 'El campo {field} debe ser numérico.',
					'exact_length' => 'El campo {field} debe tener 9 numeros.'
				]
			],
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.',
					'valid_email' => 'El campo {field} debe ser email.'
				]
			],
			'carrera1' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo {field} es obligatorio.'
				]
			],
			'carrera2' => [
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
			$email = $this->request->getPost('email');
			$telefono = $this->request->getPost('telefono');
			$carrera1 = $this->request->getPost('carrera1');
			$carrera2 = $this->request->getPost('carrera2');
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
					'grado' => $grado,
					'email' => $email,
					'telefono' => $telefono,
					'carrera1' => $carrera1,
					'carrera2' => $carrera2

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
					'grado' => $alumnosData['grado'],
					'email' => $alumnosData['email'],
					'telefono' => $alumnosData['telefono'],
					'carrera1' => $alumnosData['carrera1'],
					'carrera2' => $alumnosData['carrera2']
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
					'grado' => $grado,
					'email' => $email,
					'telefono' => $telefono,
					'carrera1' => $carrera1,
					'carrera2' => $carrera2
				]);
				$alumnosData = $this->alumnos->where('dni', $dni)->first();
				$sesionDatos = [
					'id_alumno' => $alumnosData['id'],
					'dni' => $alumnosData['dni'],
					'nombres' => $alumnosData['nombres'],
					'apellidos' => $alumnosData['apellidos'],
					'fecha_nac' => $alumnosData['fecha_nac'],
					'sexo' => $alumnosData['sexo'],
					'grado' => $alumnosData['grado'],
					'email' => $alumnosData['email'],
					'telefono' => $alumnosData['telefono'],
					'carrera1' => $alumnosData['carrera1'],
					'carrera2' => $alumnosData['carrera2']
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
			$dataNotas = $this->test->obtener($this->session->id_alumno);
			$dataPerfil = $this->alumnos->where('dni', $this->session->dni)->first();
			$dataNotasMayores = [];
			$dataNotasResto = [];
			$mayor = 0;
			foreach ($dataNotas as $notas) {
				// $dataNotasMayores[0] = $notas;
				if ($notas['suma_nota'] > $mayor) {
					$mayor = $notas['suma_nota'];
					$dataNotasMayores[0] = $notas;
				} else {
					array_push($dataNotasResto, $notas);
				}
			}
			// array_push($dataNotasMayores,$notas);
			$mayor1 = 0;
			foreach ($dataNotas as $nota) {
				// $dataNotasMayores[1] = $nota;
				if ($nota['suma_nota'] > $mayor1 && $nota['id_area']!=$dataNotasMayores[0]['id_area']) {
					$mayor1 = $nota['suma_nota'];
					$dataNotasMayores[1] = $nota;
				}
			}
			// array_push($dataNotasMayores,$notas);
			$dataClaves=$this->claves->obtener($dataNotasMayores[0]['id_area'],$dataNotasMayores[1]['id_area']);
			$data = [
				'titulo' => 'cajas',
				'dataPerfil' => $dataPerfil,
				'dataClaves' => $dataClaves,
				'dataNotas' => $dataNotasMayores

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
