<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	
	public function obtenerProductos()
	{               
		$consulta = $this->db->query("SELECT * FROM producto");
		return $consulta->result();
	}

	public function procesarDatosProducto($idProducto,$producto)
	{
		$band = true;
		if ($idProducto!="") {
			$consulta = $this->db->query("SELECT * FROM producto WHERE idproducto = $idProducto");
			if ($consulta->num_rows()==1) {
				$band = false;
			}
		}
		if ($band==true) {
			$this->db->where('nombres', $producto['nombres']);
			$consulta = $this->db->get('producto');
			if ($consulta->num_rows()==0) {
				$this->db->insert('producto', $producto);
				if ($this->db->affected_rows()>0) {
					return true;
				} else {
					return false;
				}
			} else {
				return "existe";
			}	
		} else {
			$this->db->where('idproducto', $idProducto);
			$this->db->update('producto', $producto);
			if ($this->db->affected_rows()>0) {
				return true;
			} else {
				return false;
			}
		}
	}
}

