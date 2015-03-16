<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

	  parent::__construct();
	  $this->load->model( array('producto','imagenes_slider_servicio','imagenes_galeria','novedad','servicio','capacitacion','laempresam','sucursal', 'imagenes_producto','imagenes_servicio','imagenes_novedad', 'imagenes_laempresa') );
	  $this->load->helper('url');
	}

	public function index()
	{	
		$data['servicios'] = $this->servicio->get_records_front();
		$data['novedades'] = $this->novedad->get_records_front();
		$data['productos'] = $this->producto->get_records_front();
		$data['grupo_productos'] = $this->producto->get_grupo_productos();
		$this->load->view('inicio', $data);
	}

	public function la_empresa()
	{	
		$data['info'] = $this->laempresam->get_record(1);
		$data['imagenes_slider'] = $this->imagenes_laempresa->imagenes_laempresa(1);
		$this->load->view('la_empresa', $data);
	}

	public function grupo_productos()
	{	
		$data['productos'] = $this->producto->get_records(6,0);
		
		$this->load->view('grupo_productos', $data);
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
		$data['sliders_servicios'] = $this->imagenes_slider_servicio->get_records(10,0);
		$data['servicios'] = $this->servicio->get_records(10,0);
		$this->load->view('servicios', $data);
	}


	public function detalle_servicio()
	{	
		$data['servicio'] = $this->servicio->get_record($this->uri->segment(3)); 
		$data['imagenes'] = $this->imagenes_servicio->imagenes_servicio($this->uri->segment(3));
		$this->load->view('servicio_detalle', $data);
	}
	public function novedades()
	{	
		$data['novedades'] = $this->novedad->get_front(4);
		
		$this->load->view('novedades', $data);
	}

	public function novedades_detalle()
	{	
		$data['novedad'] = $this->novedad->get_record($this->uri->segment(3));
		$this->load->view('novedades_detalle', $data);
	}

	public function sucursales()
	{	
		$data['sucursales'] = $this->sucursal->get_records(0,3);
		$this->load->view('sucursales', $data);
	}

	public function galeria()
	{	
		$data['imagenes'] = $this->imagenes_galeria->get_front($galeria=1);
		$this->load->view('galeria', $data);
	}

	public function capacitaciones()
	{	
		$this->load->view('capacitaciones');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */