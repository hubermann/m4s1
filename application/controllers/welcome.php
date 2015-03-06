<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

	  parent::__construct();
	  $this->load->model( array('producto','novedad','servicio','laempresam','sucursal', 'imagenes_producto') );
	  $this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('inicio');
	}

	public function la_empresa()
	{	
		$data['info'] = $this->laempresam->get_record(1);
		$this->load->view('la_empresa', $data);
	}

	public function grupo_productos()
	{
		$this->load->view('grupo_productos');
	}
	public function producto_detalle()
	{	$id_producto = $this->uri->segment(2);
		if(empty($id_producto)){redirect('grupo_productos');}

		$data['producto'] = $this->producto->get_record($id_producto);
		$data['imagenes_producto'] = $this->imagenes_producto->imagenes_producto($id_producto);
		$this->load->view('grupo_producto_detalle', $data);
	}

	public function servicios()
	{	
		$data['servicios'] = $this->servicio->get_records(10);
		$this->load->view('servicios', $data);
	}


	public function detalle_servicio()
	{
		$this->load->view('servicio_detalle');
	}
	public function novedades()
	{	
		$data['novedades'] = $this->novedad->get_front(4);
		
		$this->load->view('novedades', $data);
	}

	public function novedades_detalle()
	{
		$this->load->view('novedades_detalle');
	}

	public function sucursales()
	{	
		$data['sucursales'] = $this->sucursal->get_records(0,3);
		$this->load->view('sucursales', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */