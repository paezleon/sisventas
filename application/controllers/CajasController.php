<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CajasController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('CajasModel'));
	}

	public function index()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$titulo['titulo'] = 'Cajas';
			$data['cajas'] = $this->CajasModel->obtenerCajas();
			$this->load->view('v_header',$titulo);
			$this->load->view('v_cajas',$data);
			$this->load->view('v_footer');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}
	}

	public function procesarDatosCaja()
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$montoApertura 	= $this->input->post('txtMontoApertura', TRUE);
			$montoCierre 	= $this->input->post('txtMontoCierre', TRUE);
			$idCaja = $this->input->post('txtCaja', TRUE);
			if ($montoApertura!="" or $montoCierre!="") {
				$caja = [
				    'montoApertura' => $montoApertura,
				    'montoCierre' => $montoCierre,
				    'empleado' => $this->session->userdata('idEmpleado'),
				];
				$registro = $this->CajasModel->procesarDatosCaja($idCaja,$caja);
				if ($registro==true) {
					$this->session->set_flashdata('correcto','Se ha registrado correctamente los datos de la caja '.$idCaja);
				} elseif($registro==false) {
					$this->session->set_flashdata('alerta','No se realizaron registros ni modificaciones en los datos');
				} elseif($registro=='existe') {
					$this->session->set_flashdata('alerta','Ya existe una con esos datos');
				}
			} else {
				$this->session->set_flashdata('alerta', 'Debe ingresar el monto de apertura o de cierre');
			}
			redirect(base_url('cajas'),'refresh');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}	
	}

}

/* End of file CajasController.php */
/* Location: ./application/controllers/CajasController.php */