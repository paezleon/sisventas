<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentasController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('VentasModel','ClientesModel','CajasModel','ProductosModel'));
	}

	public function index()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$titulo['titulo'] = 'Ventas';
			$data['ventas'] = $this->VentasModel->obtenerVentas();
			$data['clientes'] = $this->ClientesModel->obtenerClientes();
			$data['cajas'] = $this->CajasModel->obtenerCajasFiltro();
			$data['productos'] = $this->ProductosModel->obtenerProductosFiltro();
			$this->load->view('v_header',$titulo);
			$this->load->view('v_ventas',$data);
			$this->load->view('v_footer');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}	
	}

	public function procesarDatosVenta()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$cliente = $this->input->post('sltCliente', TRUE);
			$caja = $this->input->post('sltCaja', TRUE);
			$producto = $this->input->post('txtProductoVenta', TRUE);
			$precio = $this->input->post('txtPrecioVenta', TRUE);
			$cantidad = $this->input->post('txtCantidadVenta', TRUE);
			$registro = $this->VentasModel->procesarDatosVenta($cliente,$caja,$producto,$precio,$cantidad);
			if ($registro!=false) {
				$idVentas = $registro;
				$this->session->set_flashdata('correcto','Se ha registrado correctamente la venta, <a href="'.base_url().'imprimir_factura/'.$idVentas.'"></a>');
			} elseif($registro==false) {
				$this->session->set_flashdata('alerta','No se realizaron registros ni modificaciones en los datos');
			}
			$this->index();
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}	
	}

}

/* End of file VentasController.php */
/* Location: ./application/controllers/VentasController.php */