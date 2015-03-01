<?php 

class laempresa extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('permiso');
$this->load->model('laempresam');$this->load->model('imagenes_laempresa');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}



}

public function index(){
	$this->permiso->verify_access( 'laempresa', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar laempresa';	
	$data['content'] = 'control/laempresa/edit_laempresa';
	$data['menu'] = 'control/laempresa/menu_laempresa';
	$data['query'] = $this->laempresam->get_record(1);
	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'laempresa', 'view');
	$data['title'] = 'laempresa';
	$data['content'] = 'control/laempresa/detail';
	$data['menu'] = 'control/laempresa/menu_laempresa';
	$data['query'] = $this->laempresam->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'laempresa', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo laempresa';
	$data['content'] = 'control/laempresa/new_laempresa';
	$data['menu'] = 'control/laempresa/menu_laempresa';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'laempresa', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('titulo', 'Titulo', 'required');

$this->form_validation->set_rules('texto_principal', 'Texto_principal', 'required');

$this->form_validation->set_rules('texto_secundario', 'Texto_secundario', 'required');

$this->form_validation->set_rules('titulo_texto1', 'Titulo_texto1', 'required');

$this->form_validation->set_rules('texto1', 'Texto1', 'required');

$this->form_validation->set_rules('titulo_texto2', 'Titulo_texto2', 'required');

$this->form_validation->set_rules('texto2', 'Texto2', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo laempresa';
		$data['content'] = 'control/laempresa/new_laempresa';
		$data['menu'] = 'control/laempresa/menu_laempresa';
		$this->load->view('control/control_layout', $data);

	}else{
		/*
		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		*/$newlaempresa = array( 'titulo' => $this->input->post('titulo'), 
 'texto_principal' => $this->input->post('texto_principal'), 
 'texto_secundario' => $this->input->post('texto_secundario'), 
 'titulo_texto1' => $this->input->post('titulo_texto1'), 
 'texto1' => $this->input->post('texto1'), 
 'titulo_texto2' => $this->input->post('titulo_texto2'), 
 'texto2' => $this->input->post('texto2'), 
);
		#save
		$this->laempresam->add_record($newlaempresa);
		$this->session->set_flashdata('success', 'laempresa creado. <a href="laempresa/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/laempresa', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'laempresa', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar laempresa';	
	$data['content'] = 'control/laempresa/edit_laempresa';
	$data['menu'] = 'control/laempresa/menu_laempresa';
	$data['query'] = $this->laempresam->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('titulo', 'Titulo', 'required');

$this->form_validation->set_rules('texto_principal', 'Texto_principal', 'required');

$this->form_validation->set_rules('texto_secundario', 'Texto_secundario', 'required');

$this->form_validation->set_rules('titulo_texto1', 'Titulo_texto1', 'required');

$this->form_validation->set_rules('texto1', 'Texto1', 'required');

$this->form_validation->set_rules('titulo_texto2', 'Titulo_texto2', 'required');

$this->form_validation->set_rules('texto2', 'Texto2', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo laempresa';
		$data['content'] = 'control/laempresa/edit_laempresa';
		$data['menu'] = 'control/laempresa/menu_laempresa';
		$data['query'] = $this->laempresam->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		$editedlaempresa = array(  
'titulo' => $this->input->post('titulo'),

'texto_principal' => $this->input->post('texto_principal'),

'texto_secundario' => $this->input->post('texto_secundario'),

'titulo_texto1' => $this->input->post('titulo_texto1'),

'texto1' => $this->input->post('texto1'),

'titulo_texto2' => $this->input->post('titulo_texto2'),

'texto2' => $this->input->post('texto2'),
);
		#save
		$this->session->set_flashdata('success', 'laempresa Actualizado!');
		$this->laempresam->update_record($id, $editedlaempresa);
		if($this->input->post('id')!=""){
			redirect('control/laempresa', 'refresh');
		}else{
			redirect('control/laempresa', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'laempresa', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft

	$id_laempresa = $this->input->post('iditem');
	if($id_laempresa > 0 && $id_laempresa != ""){

		$editedlaempresa = array(
		'status' => 1,
		);
		$this->laempresam->update_record($id_laempresa, $editedlaempresa);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}





	public function imagenes(){
	$this->load->helper('form');
	$data['content'] = 'control/laempresa/imagenes';
	$data['title'] = 'Imagenes ';
	$data['menu'] = 'control/laempresa/menu_laempresa';
	$data['query_imagenes'] = $this->imagenes_laempresa->imagenes_laempresa($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


	public function add_imagen(){

	//adjunto
	if($_FILES['adjunto']['size'] > 0){

	$file  = $this->upload_file();

	if ( $file['status'] != 0 ){
		//guardo
		$nueva_imagen = array(  
			'laempresa_id' => $this->input->post('id'),
			'filename' => $file['filename'],
		);
		#save
		$this->session->set_flashdata('success', 'Imagen cargada!');
		$this->imagenes_laempresa->add_record($nueva_imagen);	
		redirect('control/laempresa/imagenes/'.$this->input->post('id'));
	}


	}
	$this->session->set_flashdata('error', $file['msg']);
	redirect('control/laempresa/imagenes/'.$this->input->post('id'));
}

public function delete_imagen(){
	$id_imagen = $this->uri->segment(4); 
	 
	$imagen = $this->imagenes_laempresa->get_record($id_imagen);
	$path = 'images-laempresa/'.$imagen->filename;
	unlink($path);
	
	$this->imagenes_laempresa->delete_record($id_imagen);	
	#echo "Eliminada : ".$imagen->filename;
}



/*******  FILE ADJUNTO  ********/
public function upload_file(){
	
	//1 = OK - 0 = Failure
	$file = array('status' => '', 'filename' => '', 'msg' => '' );
	
	array('image/jpeg','image/pjpeg', 'image/jpg', 'image/png', 'image/gif','image/bmp');
	//check extencion
	/*
	$file_extensions_allowed = array('application/pdf', 'application/msword', 'application/rtf', 'application/vnd.ms-excel','application/vnd.ms-powerpoint','application/zip','application/x-rar-compressed', 'text/plain');
	$exts_humano = array('PDF', 'WORD', 'RTF', 'EXCEL', 'PowerPoint', 'ZIP', 'RAR');
	*/
	$file_extensions_allowed = array('image/jpeg','image/pjpeg', 'image/jpg', 'image/png', 'image/gif','image/bmp');
	$exts_humano = array('JPG', 'JPEG', 'PNG', 'GIF');
	
	
	$exts_humano = implode(', ',$exts_humano);
	$ext = $_FILES['adjunto']['type'];
	#$ext = strtolower($ext);
	if(!in_array($ext, $file_extensions_allowed)){
		$exts = implode(', ',$file_extensions_allowed);
		
	$file['msg'] .="<p>".$_FILES['adjunto']['name']." <br />Puede subir archivos que tengan alguna de estas extenciones: ".$exts_humano."</p>";
	$file['status'] = 0 ;
	}else{
		include(APPPATH.'libraries/class.upload.php');
		$yukle = new upload;
		$yukle->set_max_size(1900000);
		$yukle->set_directory('./images-laempresa');
		$yukle->set_tmp_name($_FILES['adjunto']['tmp_name']);
		$yukle->set_file_size($_FILES['adjunto']['size']);
		$yukle->set_file_type($_FILES['adjunto']['type']);
		$random = substr(md5(rand()),0,6);
		$name_whitout_whitespaces = str_replace(" ","-",$_FILES['adjunto']['name']);
		$imagname=''.$random.'_'.$name_whitout_whitespaces;
		#$thumbname='tn_'.$imagname;
		$yukle->set_file_name($imagname);
		
	
		$yukle->start_copy();
		
		
		if($yukle->is_ok()){
		#$yukle->resize(600,0);
		#$yukle->set_thumbnail_name('tn_'.$random.'_'.$name_whitout_whitespaces);
		#$yukle->create_thumbnail();
		#$yukle->set_thumbnail_size(180, 0);
		
			//UPLOAD ok
			$file['filename'] = $imagname;
			$file['status'] = 1;
		}
		else{
			$file['status'] = 0 ;
			$file['msg'] = 'Error al subir archivo';
		}
		
		//clean
		$yukle->set_tmp_name('');
		$yukle->set_file_size('');
		$yukle->set_file_type('');
		$imagname='';
	}//fin if(extencion)	
		
		
	return $file;
}

} //end class

?>