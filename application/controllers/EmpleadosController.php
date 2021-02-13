<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpleadosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EmpleadosModel');
	}

	public function index()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$titulo['titulo'] = 'Empleados';
			$data['empleados'] = $this->EmpleadosModel->obtenerEmpleados();
			$this->load->view('v_header',$titulo);
			$this->load->view('v_empleados',$data);
			$this->load->view('v_footer');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}
	}

	public function procesarDatosEmpleado()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$cedula 	= $this->input->post('txtCedula', TRUE);
			$nombre 	= $this->input->post('txtNombre', TRUE);
			$usuario 	= $this->input->post('txtUsuario', TRUE);
			$telefono	= $this->input->post('txtTelefono', TRUE);
			$correo 	= $this->input->post('txtCorreo', TRUE);
			$estado  	= $this->input->post('sltEstado', TRUE);
			$idEmpleado = $this->input->post('txtEmpleado', TRUE);
			if ($cedula!="" and $nombre!="" and $usuario!="") {
				$empleado = [
				    'ci' => $cedula,
				    'nombres' => mb_strtoupper($nombre),
				    'telefono' => $telefono,
				    'correo' => $correo,
				    'user' => mb_strtolower($usuario),
				    'estado' => $estado, 
				];
				$registro = $this->EmpleadosModel->procesarDatosEmpleado($idEmpleado,$empleado);
				if ($registro==true) {
					$this->session->set_flashdata('correcto','Se ha registrado correctamente al empleado '.mb_strtoupper($nombre));
				} elseif($registro==false) {
					$this->session->set_flashdata('alerta','No se realizaron registros ni modificaciones en los datos');
				} elseif($registro==false) {
					$this->session->set_flashdata('alerta','Ya existe un empleado con esos datos');
				}
			} else {
				$this->session->set_flashdata('alerta', 'Los campos Cédula, Nombres y Apellidos, Usuario son obligatorios');
			}
			redirect(base_url('empleados'),'refresh');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}	
	}

}

/* End of file EmpleadosController.php */
/* Location: ./application/controllers/EmpleadosController.php */