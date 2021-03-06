<?php 

class servicios extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('permiso');
$this->load->model('servicio');$this->load->model('imagenes_servicio');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}



}

public function index(){
	$this->permiso->verify_access( 'servicios', 'view');
	//Pagination
	$per_page = 11;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->servicio->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/servicios/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'servicios';
	$data['menu'] = 'control/servicios/menu_servicio';
	$data['content'] = 'control/servicios/all';
	$data['query'] = $this->servicio->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'servicios', 'view');
	$data['title'] = 'servicio';
	$data['content'] = 'control/servicios/detail';
	$data['menu'] = 'control/servicios/menu_servicio';
	$data['query'] = $this->servicio->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'servicios', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo servicio';
	$data['content'] = 'control/servicios/new_servicio';
	$data['menu'] = 'control/servicios/menu_servicio';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'servicios', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('nombre', 'Nombre', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo servicios';
		$data['content'] = 'control/servicios/new_servicio';
		$data['menu'] = 'control/servicios/menu_servicio';
		$this->load->view('control/control_layout', $data);

	}else{

		$file  = $this->upload_image();
		if($_FILES['filename']['size'] > 0){
			if ( $file['status'] == 0 ){
				$this->session->set_flashdata('error', $file['msg']);
			}
		}else{
			$file['filename'] = '';
		}
		


		
		$this->load->helper('url');
		$slug = url_title($this->input->post('nombre'), 'dash', TRUE);
		$newservicio = array( 
			'nombre' => $this->input->post('nombre'), 
			 'slug' => $slug, 
			 'filename' => $file['filename']
		);
		#save
		$this->servicio->add_record($newservicio);
		$this->session->set_flashdata('success', 'servicio creado. <a href="servicios/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/servicios', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'servicios', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar servicio';	
	$data['content'] = 'control/servicios/edit_servicio';
	$data['menu'] = 'control/servicios/menu_servicio';
	$data['query'] = $this->servicio->get_record($this->uri->segment(4));
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

		$data['title'] = 'Nuevo servicio';
		$data['content'] = 'control/servicios/edit_servicio';
		$data['menu'] = 'control/servicios/menu_servicio';
		$data['query'] = $this->servicio->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{	

			if($_FILES['filename']['size'] > 0){

			$file  = $this->upload_image();

			if ( $file['status'] != 0 )
				{
				//guardo
				$servicio = $this->servicio->get_record($this->input->post('id'));
					 $path = 'images-servicios/'.$servicio->filename;
					 if(is_link($path)){
						unlink($path);
					 }
				
				
				$data = array('filename' => $file['filename']);
				$this->servicio->update_record($this->input->post('id'), $data);
				}

			}		


		$id=  $this->input->post('id');

		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		
		$editedservicio = array(  
		'nombre' => $this->input->post('nombre'),

		'slug' => $this->input->post('slug'),
		);
		#save
		$this->session->set_flashdata('success', 'servicio Actualizado!');
		$this->servicio->update_record($id, $editedservicio);
		if($this->input->post('id')!=""){
			redirect('control/servicios', 'refresh');
		}else{
			redirect('control/servicios', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'servicios', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft

	$id_servicio = $this->input->post('iditem');
	if($id_servicio > 0 && $id_servicio != ""){

		$editedservicio = array(
		'status' => 1,
		);
		$this->servicio->update_record($id_servicio, $editedservicio);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}





	public function imagenes(){
	$this->load->helper('form');
	$data['content'] = 'control/servicios/imagenes';
	$data['title'] = 'Imagenes ';
	$data['menu'] = 'control/servicios/menu_servicio';
	$data['query_imagenes'] = $this->imagenes_servicio->imagenes_servicio($this->uri->segment(4));
	$data['servicio'] = $this->servicio->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


	public function add_imagen(){

	//adjunto
	if($_FILES['adjunto']['size'] > 0){

	$file  = $this->upload_file();

	if ( $file['status'] != 0 ){
		//guardo
		$nueva_imagen = array(  
			'servicio_id' => $this->input->post('id'),
			'filename' => $file['filename'],
		);
		#save
		$this->session->set_flashdata('success', 'Imagen cargada!');
		$this->imagenes_servicio->add_record($nueva_imagen);	
		redirect('control/servicios/imagenes/'.$this->input->post('id'));
	}


	}
	$this->session->set_flashdata('error', $file['msg']);
	redirect('control/servicios/imagenes/'.$this->input->post('id'));
}

public function delete_imagen(){
	$id_imagen = $this->uri->segment(4); 
	 
	$imagen = $this->imagenes_servicio->get_record($id_imagen);
	$path = 'images-servicios/'.$imagen->filename;
	unlink($path);
	
	$this->imagenes_servicio->delete_record($id_imagen);	
	#echo "Eliminada : ".$imagen->filename;
}

function main_imagen_update(){
	echo $idimagen = $this->input->post('idimagen');
	$idservicio = $this->input->post('idservicio');
	$data_update = array('main_image' => $idimagen);
	$this->servicio->update_main($idservicio, $data_update);
	$arr = array('status' => "OK");
	echo json_encode($arr);
	exit();
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
		$yukle->set_directory('./images-servicios');
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

/*******  FILE ADJUNTO  ********/
public function upload_image(){

	//1 = OK - 0 = Failure
	$file = array('status' => '', 'filename' => '', 'msg' => '' );

	//check ext.
	$file_extensions_allowed = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
	$exts_humano = array('gif', 'png', 'jpeg', 'jpg');
	$exts_humano = implode(', ',$exts_humano);
	$ext = $_FILES['filename']['type'];
	#$ext = strtolower($ext);
	if(!in_array($ext, $file_extensions_allowed)){
		$exts = implode(', ',$file_extensions_allowed);

		$file['msg'] .="<p>".$_FILES['filename']['name']." <br />Puede subir archivos que tengan alguna de estas extenciones: ".$exts_humano."</p>";

	}else{
		include(APPPATH.'libraries/class.upload.php');
		$yukle = new upload;
		$yukle->set_max_size(1900000);
		$yukle->set_directory('./images-servicios');
		$yukle->set_tmp_name($_FILES['filename']['tmp_name']);
		$yukle->set_file_size($_FILES['filename']['size']);
		$yukle->set_file_type($_FILES['filename']['type']);
		$random = substr(md5(rand()),0,6);
		$name_whitout_whitespaces = str_replace(" ","-",$_FILES['filename']['name']);
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