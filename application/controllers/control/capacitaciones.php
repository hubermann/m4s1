<?php 

class capacitaciones extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('permiso');
$this->load->model('capacitacion');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}

if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}



}

public function index(){
	$this->permiso->verify_access( 'capacitaciones', 'view');
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->capacitacion->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/capacitaciones/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'capacitaciones';
	$data['menu'] = 'control/capacitaciones/menu_capacitacion';
	$data['content'] = 'control/capacitaciones/all';
	$data['query'] = $this->capacitacion->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'capacitaciones', 'view');
	$data['title'] = 'capacitacion';
	$data['content'] = 'control/capacitaciones/detail';
	$data['menu'] = 'control/capacitaciones/menu_capacitacion';
	$data['query'] = $this->capacitacion->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'capacitaciones', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo capacitacion';
	$data['content'] = 'control/capacitaciones/new_capacitacion';
	$data['menu'] = 'control/capacitaciones/menu_capacitacion';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'capacitaciones', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('fecha', 'Fecha', 'required');

$this->form_validation->set_rules('titulo', 'Titulo', 'required');

$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo capacitaciones';
		$data['content'] = 'control/capacitaciones/new_capacitacion';
		$data['menu'] = 'control/capacitaciones/menu_capacitacion';
		$this->load->view('control/control_layout', $data);

	}else{
		/*
		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		*/

		list($dia, $mes, $anio) = explode("-", $this->input->post('fecha'));
		$fecha = $anio."-".$mes."-".$dia;

		$newcapacitacion = array( 
		 'fecha' => $fecha, 
		 'titulo' => $this->input->post('titulo'), 
		 'descripcion' => $this->input->post('descripcion'), 
		);
		#save
		$this->capacitacion->add_record($newcapacitacion);
		$this->session->set_flashdata('success', 'capacitacion creado. <a href="capacitaciones/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/capacitaciones', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'capacitaciones', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar capacitacion';	
	$data['content'] = 'control/capacitaciones/edit_capacitacion';
	$data['menu'] = 'control/capacitaciones/menu_capacitacion';
	$data['query'] = $this->capacitacion->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('fecha', 'Fecha', 'required');

$this->form_validation->set_rules('titulo', 'Titulo', 'required');

$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo capacitacion';
		$data['content'] = 'control/capacitaciones/edit_capacitacion';
		$data['menu'] = 'control/capacitaciones/menu_capacitacion';
		$data['query'] = $this->capacitacion->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');
		list($dia, $mes, $anio) = explode("-", $this->input->post('fecha'));
		$fecha = $anio."-".$mes."-".$dia;
		$editedcapacitacion = array(  
'fecha' => $fecha,

'titulo' => $this->input->post('titulo'),

'descripcion' => $this->input->post('descripcion'),
);
		#save
		$this->session->set_flashdata('success', 'capacitacion Actualizado!');
		$this->capacitacion->update_record($id, $editedcapacitacion);
		if($this->input->post('id')!=""){
			redirect('control/capacitaciones', 'refresh');
		}else{
			redirect('control/capacitaciones', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'capacitaciones', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft

	$id_capacitacion = $this->input->post('iditem');
	if($id_capacitacion > 0 && $id_capacitacion != ""){

		$editedcapacitacion = array(
		'status' => 1,
		);
		$this->capacitacion->update_record($id_capacitacion, $editedcapacitacion);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}






} //end class

?>