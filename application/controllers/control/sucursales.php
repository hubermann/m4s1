<?php 

class sucursales extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('permiso');
$this->load->model('sucursal');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}



}

public function index(){
	$this->permiso->verify_access( 'sucursales', 'view');
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->sucursal->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/sucursales/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'sucursales';
	$data['menu'] = 'control/sucursales/menu_sucursal';
	$data['content'] = 'control/sucursales/all';
	$data['query'] = $this->sucursal->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'sucursales', 'view');
	$data['title'] = 'sucursal';
	$data['content'] = 'control/sucursales/detail';
	$data['menu'] = 'control/sucursales/menu_sucursal';
	$data['query'] = $this->sucursal->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'sucursales', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo sucursal';
	$data['content'] = 'control/sucursales/new_sucursal';
	$data['menu'] = 'control/sucursales/menu_sucursal';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'sucursales', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('mapa', 'Mapa', 'required');

$this->form_validation->set_rules('nombre', 'Nombre', 'required');

$this->form_validation->set_rules('localidad', 'Localidad', 'required');

$this->form_validation->set_rules('direccion', 'Direccion', 'required');

$this->form_validation->set_rules('telefono', 'Telefono', 'required');

$this->form_validation->set_rules('telefono2', 'Telefono2', 'required');

$this->form_validation->set_rules('mail', 'Mail', 'required');

$this->form_validation->set_rules('horario', 'Horario', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo sucursales';
		$data['content'] = 'control/sucursales/new_sucursal';
		$data['menu'] = 'control/sucursales/menu_sucursal';
		$this->load->view('control/control_layout', $data);

	}else{
		/*
		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		*/$newsucursal = array( 'mapa' => $this->input->post('mapa'), 
 'nombre' => $this->input->post('nombre'), 
 'localidad' => $this->input->post('localidad'), 
 'direccion' => $this->input->post('direccion'), 
 'telefono' => $this->input->post('telefono'), 
 'telefono2' => $this->input->post('telefono2'), 
 'mail' => $this->input->post('mail'), 
 'horario' => $this->input->post('horario'), 
);
		#save
		$this->sucursal->add_record($newsucursal);
		$this->session->set_flashdata('success', 'sucursal creado. <a href="sucursales/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/sucursales', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'sucursales', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar sucursal';	
	$data['content'] = 'control/sucursales/edit_sucursal';
	$data['menu'] = 'control/sucursales/menu_sucursal';
	$data['query'] = $this->sucursal->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('mapa', 'Mapa', 'required');

$this->form_validation->set_rules('nombre', 'Nombre', 'required');

$this->form_validation->set_rules('localidad', 'Localidad', 'required');

$this->form_validation->set_rules('direccion', 'Direccion', 'required');

$this->form_validation->set_rules('telefono', 'Telefono', 'required');

$this->form_validation->set_rules('telefono2', 'Telefono2', 'required');

$this->form_validation->set_rules('mail', 'Mail', 'required');

$this->form_validation->set_rules('horario', 'Horario', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo sucursal';
		$data['content'] = 'control/sucursales/edit_sucursal';
		$data['menu'] = 'control/sucursales/menu_sucursal';
		$data['query'] = $this->sucursal->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		$editedsucursal = array(  
'mapa' => $this->input->post('mapa'),

'nombre' => $this->input->post('nombre'),

'localidad' => $this->input->post('localidad'),

'direccion' => $this->input->post('direccion'),

'telefono' => $this->input->post('telefono'),

'telefono2' => $this->input->post('telefono2'),

'mail' => $this->input->post('mail'),

'horario' => $this->input->post('horario'),
);
		#save
		$this->session->set_flashdata('success', 'sucursal Actualizado!');
		$this->sucursal->update_record($id, $editedsucursal);
		if($this->input->post('id')!=""){
			redirect('control/sucursales', 'refresh');
		}else{
			redirect('control/sucursales', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'sucursales', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft

	$id_sucursal = $this->input->post('iditem');
	if($id_sucursal > 0 && $id_sucursal != ""){

		$editedsucursal = array(
		'status' => 1,
		);
		$this->sucursal->update_record($id_sucursal, $editedsucursal);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}






} //end class

?>