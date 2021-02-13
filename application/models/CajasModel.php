<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CajasModel extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			
		}	

	public function obtenerCajas()
	{
		$consulta = $this->db->query("SELECT * FROM caja LEFT JOIN empleado on idempleado = empleado");
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
					return true;
				} else {
					return false;
				}
			} else {
				return "existe";
			}	
		} else {
			$this->db->where('idcaja', $idCaja);
			$this->db->set('fechaCierre', date('Y-m-d H:i:s'));
			$this->db->update('caja', $caja);
			if ($this->db->affected_rows()>0) {
				return true;
			} else {
				return false;
			}
		}
	}

}

/* End of file CajasModel.php */
/* Location: ./application/models/CajasModel.php */