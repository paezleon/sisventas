<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$this->principal();
		} else {
			$data['titulo'] = "Inicie Sesión";
			$this->load->view('v_login',$data);
		}
	}

	public function comprobarCredenciales()
	{
		$usuario 	= mb_strtolower($this->input->post('txtUsuario', TRUE));
		$password 	= $this->input->post('txtPassword', TRUE);
		if ($usuario!="" and $password!="") {
			$comprobar = $this->LoginModel->comprobarCredenciales($usuario,$password);
			if ($comprobar!=false) {
				$array = array(
					'idEmpleado' 	=> $comprobar[0]->idempleado,
					'nomEmpleado' 	=> $comprobar[0]->nombres,
					'estEmpleado'   => $comprobar[0]->estado,
				);
				
				$this->session->set_userdata( $array );
				$this->principal();
			} else {
				$this->session->set_flashdata('alerta', 'Credenciales ingresadas no son correctas');
				$this->index();	
			}
		} else {
			$this->session->set_flashdata('alerta', 'Debe ingresar su usuario y contraseña');
			$this->index();
		} 	
	}

	public function principal()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$data['titulo'] = 'Bienvenido';
			$this->load->view('v_header',$data);
			$this->load->view('v_principal');
			$this->load->view('v_footer');
		} else {
			$this->index();
		}
	}

	public function cerrarSesion()
	{
		$this->session->sess_destroy();
		redirect(base_url('inicio'),'refresh');
	}

}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */