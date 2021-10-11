<?php

namespace App\Controllers;

use App\Models\DocentesModel;
use App\Models\AlumnosModel;
use App\Models\TestNewModel;
use App\Models\ClavesModel;

class Docente extends BaseController
{
	protected $session, $docente, $test, $alumnos;

	public function __construct()
	{
		$this->session = session();
		$this->docente = new DocentesModel;
		$this->alumnos = new AlumnosModel;
		$this->test = new TestNewModel;
		$this->claves = new ClavesModel();


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
			return redirect()->to(base_url() . "/docente/dashboard");
		} else {

			$shared = [
				'footer' => true,
				'header' => true
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
					'header' => true
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
				'header' => true
			];
			echo view('header', $shared);
			echo view('docente/login', $data);
			echo view('footer', $shared);
		}
	}
	public function dashboard()
	{
		if (!isset($this->session->id_docente)) {
			return redirect()->to(base_url() . "/docente");
		}

		$alumnos = $this->alumnos->getAlumnos();
		$caounAlumnos = $this->alumnos->contAlumnos();
		$caounDocente = $this->docente->contDocentes();

		$shared = [
			'footer' => false,
			'header' => false
		];
		$data = [
			'alumnos' => $alumnos,
			'caounDocente' => $caounDocente,
			'caounAlumnos' => $caounAlumnos
		];
		echo view('header', $shared);
		echo view('/docente/dashboard', $data);
		echo view('footer', $shared);
	}
	public function alumnos()
	{
		if (!isset($this->session->id_docente)) {
			return redirect()->to(base_url() . "/docente");
		}

		$alumnos = $this->alumnos->getAlumnos();

		$shared = [
			'footer' => false,
			'header' => false
		];
		$data = [
			'alumnos' => $alumnos,
			'titulo' => "Listado alumnos"
		];
		echo view('header', $shared);
		echo view('/docente/alumnos', $data);
		echo view('footer', $shared);
	}
	public function verAlumno($id)
	{
		if (!isset($this->session->id_docente)) {
			return redirect()->to(base_url() . "/docente");
		}
		$test = $this->test->where('id_alumno', $id)->first();
		if ($test) {
			$dataNotas = $this->test->obtener($id);
			$dataPerfil = $this->alumnos->where('id', $id)->first();
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
				if ($nota['suma_nota'] > $mayor1 && $nota['id_area'] != $dataNotasMayores[0]['id_area']) {
					$mayor1 = $nota['suma_nota'];
					$dataNotasMayores[1] = $nota;
				}
			}
			// array_push($dataNotasMayores,$notas);
			$dataClaves = $this->claves->obtener($dataNotasMayores[0]['id_area'], $dataNotasMayores[1]['id_area']);
			$data = [
				'titulo' => 'Perfil alumno',
				'dataPerfil' => $dataPerfil,
				'dataClaves' => $dataClaves,
				'dataNotas' => $dataNotas,
				'dataNotasMayores' => $dataNotasMayores

			];
			$shared = [
				'footer' => false,
				'header' => false
			];
			echo view('header', $shared);
			echo view('/docente/perfil', $data);
			echo view('footer', $shared);
		} else {
			return redirect()->to(base_url() . "/docente/alumnos");
		}

	}
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url() . "/docente");
	}
}
