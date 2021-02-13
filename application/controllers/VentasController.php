<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentasController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('VentasModel'));
	}

	public function index()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$titulo['titulo'] = 'Ventas';
			$data['cajas'] = $this->VentasModel->obtenerVentas();
			$this->load->view('v_header',$titulo);
			$this->load->view('v_ventas',$data);
			$this->load->view('v_footer');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}	
	}

}

/* End of file VentasController.php */
/* Location: ./application/controllers/VentasController.php */