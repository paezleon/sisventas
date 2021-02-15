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

	public function procesarDatosVenta($cliente,$caja,$producto,$precio,$cantidad)
	{
		$this->db->trans_begin();

		$consulta = $this->db->query("SELECT max(idFactura) idFactura,numeroFactura FROM factura where estado = 'A' group by numeroFactura");
		$idFactura = $consulta->row()->idFactura;
		$nroFactura = $consulta->row()->numeroFactura;
		$this->db->set('fechaVentas', date('Y-m-d H:i:s'));
		$this->db->set('estado', 'V');
		$this->db->set('idcliente', $cliente);
		$this->db->set('idempleado', $this->session->userdata('idEmpleado'));
		$this->db->set('factura', $idFactura);
		$this->db->set('caja', $caja);
		$this->db->set('nrofactura', $nroFactura);
		$this->db->insert('ventas');
		$idVentas = $this->db->insert_id();
		$cant = count($producto);
		for ($i = 0; $i < $cant; $i++) {
			$this->db->set('idproducto', $producto[$i]);
			$this->db->set('cantidad', $cantidad[$i]);
			$this->db->set('idventas', $idVentas);
			$this->db->insert('detalle_ventas');
		}

		$this->db->where('idFactura', $idFactura);
		$this->db->set('numeroFactura', $nroFactura+1);
		$this->db->update('factura');

		for ($i = 0; $i < $cant; $i++) {
			$this->db->query('UPDATE producto SET stock = stock -'.$cantidad[$i].' WHERE idproducto = '.$producto[$i]);
			// $this->db->where('idproducto', $producto[$i]);
			// $this->db->set('stock', 'stock'-$cantidad[$i]);
			// $this->db->update('producto');
		}
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return $idVentas;
		}
	}

}

/* End of file VentasModel.php */
/* Location: ./application/models/VentasModel.php */