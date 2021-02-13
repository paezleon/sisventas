<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientesController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	  $this->load->model('ClientesModel');
	}
	public function index()	
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$titulo['titulo'] = 'Clientes';
			$data['clientes'] = $this->ClientesModel->obtenerClientes();
			$this->load->view('v_header',$titulo);
			$this->load->view('v_clientes',$data);
			$this->load->view('v_footer');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}
	}

	public function procesarDatosCliente()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$cedula 	= $this->input->post('txtCedula', TRUE);
			$nombre 	= $this->input->post('txtNombre', TRUE);
			$direccion 	= $this->input->post('txtDireccion', TRUE);
			$estado  	= $this->input->post('sltEstado', TRUE);
			$idCliente = $this->input->post('txtCliente', TRUE);
			if ($cedula!="" and $nombre!="") {
				$cliente = [
				    'ci' => $cedula,
				    'nombres' => mb_strtoupper($nombre),
				    'direccion' => $direccion,
				    'estado' => $estado, 
				];
				$registro = $this->ClientesModel->procesarDatosCliente($idCliente,$cliente);
				if ($registro==true) {
					$this->session->set_flashdata('correcto','Se ha registrado correctamente al cliente '.mb_strtoupper($nombre));
				} elseif($registro==false) {
					$this->session->set_flashdata('alerta','No se realizaron registros ni modificaciones en los datos');
				} elseif($registro==false) {
					$this->session->set_flashdata('alerta','Ya existe un cliente con esos datos');
				}
			} else {
				$this->session->set_flashdata('alerta', 'Los campos Cédula, Nombres y Apellidos, son obligatorios');
			}
			redirect(base_url('clientes'),'refresh');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}	
	}

}

/* End of file ClientesController.php */
/* Location: ./application/controllers/ClientesController.php */