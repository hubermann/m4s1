<?php 

class galerias extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('permiso');
$this->load->model('galeria');$this->load->model('imagenes_galeria');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}



}

public function index(){
	$this->permiso->verify_access( 'galerias', 'view');
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->galeria->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/galerias/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'galerias';
	$data['menu'] = 'control/galerias/menu_galeria';
	$data['content'] = 'control/galerias/all';
	$data['query'] = $this->galeria->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'galerias', 'view');
	$data['title'] = 'galeria';
	$data['content'] = 'control/galerias/detail';
	$data['menu'] = 'control/galerias/menu_galeria';
	$data['query'] = $this->galeria->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'galerias', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo galeria';
	$data['content'] = 'control/galerias/new_galeria';
	$data['menu'] = 'control/galerias/menu_galeria';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'galerias', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('nombre', 'Nombre', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo galerias';
		$data['content'] = 'control/galerias/new_galeria';
		$data['menu'] = 'control/galerias/menu_galeria';
		$this->load->view('control/control_layout', $data);

	}else{
		/*
		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		*/$newgaleria = array( 'nombre' => $this->input->post('nombre'), 
);
		#save
		$this->galeria->add_record($newgaleria);
		$this->session->set_flashdata('success', 'galeria creado. <a href="galerias/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/galerias', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'galerias', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar galeria';	
	$data['content'] = 'control/galerias/edit_galeria';
	$data['menu'] = 'control/galerias/menu_galeria';
	$data['query'] = $this->galeria->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('nombre', 'Nombre', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo galeria';
		$data['content'] = 'control/galerias/edit_galeria';
		$data['menu'] = 'control/galerias/menu_galeria';
		$data['query'] = $this->galeria->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		$editedgaleria = array(  
'nombre' => $this->input->post('nombre'),
);
		#save
		$this->session->set_flashdata('success', 'galeria Actualizado!');
		$this->galeria->update_record($id, $editedgaleria);
		if($this->input->post('id')!=""){
			redirect('control/galerias', 'refresh');
		}else{
			redirect('control/galerias', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'galerias', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft

	$id_galeria = $this->input->post('iditem');
	if($id_galeria > 0 && $id_galeria != ""){

		$editedgaleria = array(
		'status' => 1,
		);
		$this->galeria->update_record($id_galeria, $editedgaleria);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}





	public function imagenes(){
	$this->load->helper('form');
	$data['content'] = 'control/galerias/imagenes';
	$data['title'] = 'Imagenes ';
	$data['menu'] = 'control/galerias/menu_galeria';
	$data['query_imagenes'] = $this->imagenes_galeria->imagenes_galeria($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


	public function add_imagen(){

	//adjunto
	if($_FILES['adjunto']['size'] > 0){

	$file  = $this->upload_file();

	if ( $file['status'] != 0 ){
		//guardo
		$nueva_imagen = array(  
			'galeria_id' => $this->input->post('id'),
			'filename' => $file['filename'],
		);
		#save
		$this->session->set_flashdata('success', 'Imagen cargada!');
		$this->imagenes_galeria->add_record($nueva_imagen);	
		redirect('control/galerias/imagenes/'.$this->input->post('id'));
	}


	}
	$this->session->set_flashdata('error', $file['msg']);
	redirect('control/galerias/imagenes/'.$this->input->post('id'));
}

public function delete_imagen(){
	$id_imagen = $this->uri->segment(4); 
	 
	$imagen = $this->imagenes_galeria->get_record($id_imagen);
	$path = 'images-galerias/'.$imagen->filename;
	unlink($path);
	
	$this->imagenes_galeria->delete_record($id_imagen);	
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
		$yukle->set_directory('./images-galerias');
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