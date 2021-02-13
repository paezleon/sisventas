<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}	

	public function comprobarCredenciales($usuario,$password)
	{
		$consulta = $this->db->query("SELECT * FROM empleado WHERE ci = '$password' AND user = '$usuario'");
		if ($consulta->num_rows()==1) {
			return $consulta->result();
		} else {
			return false;
		}
	}

}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */