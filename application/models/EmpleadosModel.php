<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpleadosModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}	

	public function obtenerEmpleados()
	{
		$consulta = $this->db->query("SELECT * FROM empleado");
		return $consulta->result();
	}

	public function procesarDatosEmpleado($idEmpleado,$empleado)
	{
		$band = true;
		if ($idEmpleado!="") {
			$consulta = $this->db->query("SELECT * FROM empleado WHERE idempleado = $idEmpleado");
			if ($consulta->num_rows()==1) {
				$band = false;
			}
		}
		if ($band==true) {
			$this->db->where('ci', $empleado['ci']);
			$this->db->where('user', $empleado['user']);
			$consulta = $this->db->get('empleado');
			if ($consulta->num_rows()==0) {
				$this->db->insert('empleado', $empleado);
				if ($this->db->affected_rows()>0) {
					return true;
				} else {
					return false;
				}
			} else {
				return "existe";
			}	
		} else {
			$this->db->where('idempleado', $idEmpleado);
			$this->db->update('empleado', $empleado);
			if ($this->db->affected_rows()>0) {
				return true;
			} else {
				return false;
			}
		}
	}

}

/* End of file EmpleadosModel.php */
/* Location: ./application/models/EmpleadosModel.php */