<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CajasModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}	

	public function obtenerCajas()
	{
		$consulta = $this->db->query("SELECT * FROM caja LEFT JOIN empleado ON idempleado = empleado");
		return $consulta->result();
	}

	public function procesarDatosCaja($idCaja,$caja)
	{
		$band = true;
		if ($idCaja!="") {
			$consulta = $this->db->query("SELECT * FROM caja WHERE idcaja = $idCaja");
			if ($consulta->num_rows()==1) {
				$band = false;
			}
		}
		if ($band==true) {
			$this->db->where('idcaja', $idCaja);
			$consulta = $this->db->get('caja');
			if ($consulta->num_rows()==0) {
				$this->db->set('fechaApertura', date('Y-m-d H:i:s'));
				$this->db->insert('caja', $caja);
				if ($this->db->affected_rows()>0) {
					return 'correcto';
				} else {
					return 'error';
				}
			} else {
				return "existe";
			}	
		} else {
			$registro = $consulta->result();
			$idempleado = $registro[0]->empleado;
			if ($idempleado==$this->session->userdata('idEmpleado')) {
				$this->db->where('idcaja', $idCaja);
				$this->db->set('fechaCierre', date('Y-m-d H:i:s'));
				$this->db->update('caja', $caja);
				if ($this->db->affected_rows()>0) {
					return 'correcto';
				} else {
					return 'existe';
				}	
			} else {
				return "nocorresponde";
			}
		}
	}

	public function obtenerCajasFiltro()
	{
		$empleado = $this->session->userdata('idEmpleado');
		$consulta = $this->db->query("SELECT * FROM caja LEFT JOIN empleado ON idempleado = empleado WHERE empleado = $empleado AND fechaCierre is null");
		return $consulta->result();
	}

}

/* End of file CajasModel.php */
/* Location: ./application/models/CajasModel.php */