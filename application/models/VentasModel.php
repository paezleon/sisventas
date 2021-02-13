<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentasModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}	

	public function obtenerVentas()
	{
		$consulta = $this->db->query("SELECT * FROM ventas");
		return $consulta->result();
	}

}

/* End of file VentasModel.php */
/* Location: ./application/models/VentasModel.php */