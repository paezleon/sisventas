<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProductosModel');
	}
	public function index()	
	{
		if ($this->session->userdata('estEmpleado')=='A') {
			$titulo['titulo'] = 'Productos';
			$data['productos'] = $this->ProductosModel->obtenerProductos();
			$this->load->view('v_header',$titulo);
			$this->load->view('v_productos',$data);
			$this->load->view('v_footer');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}
	}

	public function procesarDatosProducto()
	{
		if ($this->session->userdata('estEmpleado')=='A') {

			$nombre 	= $this->input->post('txtNombre', TRUE);
			$precioCompra 	= $this->input->post('txtPrecioCompra', TRUE);
			$precioVenta 	= $this->input->post('txtPrecioVenta', TRUE);
			$stock 		= $this->input->post('txtStock', TRUE);
			$codigobarra = $this->input->post('txtCodigoBarra', TRUE);
			$estado  	= $this->input->post('sltEstado', TRUE);
			$idProducto = $this->input->post('txtProducto', TRUE);
			if ($nombre!="") {
				$nombreArchivo = $_FILES['fileImagen']['name'];
				$config['upload_path'] = './assets/img/productos/';
//              'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '5000000';
				// $config['quality'] = '90%';
				$config['file_name'] = $nombreArchivo;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('fileImagen')) {
					$this->session->set_flashdata('alerta', $this->upload->display_errors());
				}
				$producto = [
					'nombres' => mb_strtoupper($nombre),
					'preciocompra' =>$precioCompra,
					'precioVenta' => $precioVenta,
					'stock' => $stock,
					'estado' => $estado,
					'codigobarra' => $codigobarra,
					'imagen' => $nombreArchivo,
				];
				$registro = $this->ProductosModel->procesarDatosProducto($idProducto,$producto);
				if ($registro==true) {
					$this->session->set_flashdata('correcto','Se ha registrado correctamente el producto '.mb_strtoupper($nombre));
				} elseif($registro==false) {
					$this->session->set_flashdata('alerta','No se realizaron registros ni modificaciones en los datos');
				} elseif($registro==false) {
					$this->session->set_flashdata('alerta','Ya existen esos datos');
				}
			} else {
				$this->session->set_flashdata('alerta', 'El campo de Nombre es obligatorio');
			}
			redirect(base_url('productos'),'refresh');
		} else {
			redirect(base_url('cerrar_sesion'),'refresh');
		}	
	}

}
