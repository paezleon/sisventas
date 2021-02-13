<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientesModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	
	public function obtenerClientes()
	{               
		$consulta = $this->db->query("SELECT * FROM cliente");
		return $consulta->result();
	}

	public function procesarDatosCliente($idCliente,$cliente)
	{
		$band = true;
		if ($idCliente!="") {
			$consulta = $this->db->query("SELECT * FROM cliente WHERE idcliente = $idCliente");
			if ($consulta->num_rows()==1) {
				$band = false;
			}
		}
		if ($band==true) {
			$this->db->where('ci', $cliente['ci']);
			$consulta = $this->db->get('cliente');
			if ($consulta->num_rows()==0) {
				$this->db->insert('cliente', $cliente);
				if ($this->db->affected_rows()>0) {
					return true;
				} else {
					return false;
				}
			} else {
				return "existe";
			}	
		} else {
			$this->db->where('idcliente', $idCliente);
			$this->db->update('cliente', $cliente);
			if ($this->db->affected_rows()>0) {
				return true;
			} else {
				return false;
			}
		}
	}
}

/* End of file ClientesModel.php */
/* Location: ./application/models/ClientesModel.php */