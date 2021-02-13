class <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NuevaVentaController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 $this->load->model('NuevaVentaModel');
	}

	public function index()	
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$titulo['titulo'] = 'Nuevaventa';
			$data['clientes'] = $this->NuevaVentaModel->obtenerNuevaventa();
			$this->load->view('v_header',$titulo);
			$this->load->view('v_nueva_venta',$data);
			$this->load->view('v_footer');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}
	}public function index()	
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$titulo['titulo'] = 'Nuevaventa';
			$data['clientes'] = $this->NuevaVentaModel->obtenerNuevaVenta();
			$this->load->view('v_header',$titulo);
			$this->load->view('v_nueva_venta',$data);
			$this->load->view('v_footer');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}
	}

}

/* End of file NuevaVentaController.php */
/* Location: ./application/controllers/NuevaVentaController.php */