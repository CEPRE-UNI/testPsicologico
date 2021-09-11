<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumnosModel;
use App\Models\TemporalPreguntasModel;
use App\Models\PreguntasModel;
use App\Models\TestModel;

class Test extends BaseController
{

	protected $alumnos, $temporal, $preguntas;

	public function __construct()
	{
		$this->alumnos = new AlumnosModel;
		$this->temporal = new TemporalPreguntasModel();
		$this->preguntas = new PreguntasModel();
		$this->test = new TestModel();
		
	}
	
	public function guarda()
	{
		$folio = $this->request->getPost('folio');
		
		$session = session();
		$resultadoId = $this->test->insertaVenta($folio, $session->id_usuario);
		if ($resultadoId) {
			$resultadoCompra = $this->tempral_compra->porCompra($id_venta);
			foreach ($resultadoCompra as $row) {
				$this->detalle_venta->save([
					'id_venta' => $resultadoId,
					'id_producto' => $row['id_producto'],
					'nombre' => $row['nombre'],
					'cantidad' => $row['cantidad'],
					'precio' => $row['precio'],
					'adicional' => $row['adicional']
				]);
				$this->productos = new ProductosModel();
				$this->productos->actualizaStock($row['id_producto'], $row['cantidad'], '-');
			}
			$this->tempral_compra->eliminarCompra($id_venta);
		}
		return redirect()->to(base_url() . "/ventas/muestraTicketPdf/" . $resultadoId);
	}
}
