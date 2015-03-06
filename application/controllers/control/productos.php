<?php 

class productos extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('permiso');
$this->load->model('producto');$this->load->model('imagenes_producto');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}



}

public function index(){
	#$this->permiso->verify_access( 'productos', 'view');
	//Pagination
	$per_page = 10;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->producto->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/productos/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'productos';
	$data['menu'] = 'control/productos/menu_producto';
	$data['content'] = 'control/productos/all';
	$data['query'] = $this->producto->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'productos', 'view');
	$data['title'] = 'producto';
	$data['content'] = 'control/productos/detail';
	$data['menu'] = 'control/productos/menu_producto';
	$data['query'] = $this->producto->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'productos', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo producto';
	$data['content'] = 'control/productos/new_producto';
	$data['menu'] = 'control/productos/menu_producto';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'productos', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('titulo', 'Titulo', 'required');

$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

#$this->form_validation->set_rules('tags', 'Tags', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo productos';
		$data['content'] = 'control/productos/new_producto';
		$data['menu'] = 'control/productos/menu_producto';
		$this->load->view('control/control_layout', $data);

	}else{

		#adjunto
		$adjunto  = $this->upload_adjunto();
		if($_FILES['adjunto']['size'] > 0){
			if ( $adjunto['status'] == 0 ){
				$this->session->set_flashdata('error', $adjunto['msg']);
			}
		}else{
			$adjunto['adjunto'] = '';
		}


		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		$destacado = ( $this->input->post('destacado') == "on" ? 1 : 0 );
		$newproducto = array( 
			'titulo' => $this->input->post('titulo'), 
			'descripcion' => $this->input->post('descripcion'), 
			'tags' => $this->input->post('tags'), 
			'destacado' => $destacado,
			'adjunto' => $adjunto['adjunto'],
			'slug' => $slug, 
		);
		#save
		$this->producto->add_record($newproducto);
		$this->session->set_flashdata('success', 'producto creado. <a href="productos/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/productos', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'productos', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar producto';	
	$data['content'] = 'control/productos/edit_producto';
	$data['menu'] = 'control/productos/menu_producto';
	$data['query'] = $this->producto->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('titulo', 'Titulo', 'required');

$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

#$this->form_validation->set_rules('tags', 'Tags', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo producto';
		$data['content'] = 'control/productos/edit_producto';
		$data['menu'] = 'control/productos/menu_producto';
		$data['query'] = $this->producto->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{	

	#adjunto
		if($_FILES['adjunto']['size'] > 0){
			$file  = $this->upload_adjunto();
			if ( $file['status'] != 0 )
				{
				//guardo
				$producto = $this->producto->get_record($this->input->post('id'));
					$path = 'adjuntos-productos/'.$producto->adjunto;
					if(is_link($path)){
						unlink($path);
					}
				$data = array('adjunto' => $file['adjunto']);
				$this->producto->update_record($this->input->post('id'), $data);

				}
		}




	
		$id=  $this->input->post('id');
		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);

		$destacado = ( $this->input->post('destacado') == "on" ? 1 : 0 );

		$editedproducto = array(  
		'titulo' => $this->input->post('titulo'),
		'descripcion' => $this->input->post('descripcion'),
		'destacado' => $destacado,
		'tags' => $this->input->post('tags'),
		'slug' => $slug,
		);
		#save
		$this->session->set_flashdata('success', 'producto Actualizado!');
		$this->producto->update_record($id, $editedproducto);
		if($this->input->post('id')!=""){
			redirect('control/productos', 'refresh');
		}else{
			redirect('control/productos', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'productos', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft

	$id_producto = $this->input->post('iditem');
	if($id_producto > 0 && $id_producto != ""){

		$editedproducto = array(
		'status' => 1,
		);
		$this->producto->update_record($id_producto, $editedproducto);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}





	public function imagenes(){
	$this->load->helper('form');
	$data['content'] = 'control/productos/imagenes';
	$data['title'] = 'Imagenes ';
	$data['menu'] = 'control/productos/menu_producto';
	$data['query_imagenes'] = $this->imagenes_producto->imagenes_producto($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


	public function add_imagen(){

	//adjunto
	if($_FILES['adjunto']['size'] > 0){

	$file  = $this->upload_file();

	if ( $file['status'] != 0 ){
		//guardo
		$nueva_imagen = array(  
			'producto_id' => $this->input->post('id'),
			'filename' => $file['filename'],
		);
		#save
		$this->session->set_flashdata('success', 'Imagen cargada!');
		$this->imagenes_producto->add_record($nueva_imagen);	
		redirect('control/productos/imagenes/'.$this->input->post('id'));
	}


	}
	$this->session->set_flashdata('error', $file['msg']);
	redirect('control/productos/imagenes/'.$this->input->post('id'));
}

public function delete_imagen(){
	$id_imagen = $this->uri->segment(4); 
	 
	$imagen = $this->imagenes_producto->get_record($id_imagen);
	$path = 'images-productos/'.$imagen->filename;
	unlink($path);
	
	$this->imagenes_producto->delete_record($id_imagen);	
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
		$yukle->set_directory('./images-productos');
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



public function upload_adjunto(){

	//1 = OK - 0 = Failure
	$adjunto = array('status' => '', 'adjunto' => '', 'msg' => '' );


	//check ext.
	$file_extensions_allowed = array('application/pdf', 'application/zip', 'application/srt', 'text/plain', 'application/msword', 'application/vnd.ms-excel','application/x-rar-compressed');
	$exts_humano = array('pdf', 'zip','rar', 'word', 'excel');
	$exts_humano = implode(', ',$exts_humano);
	$ext = $_FILES['adjunto']['type'];
	#$ext = strtolower($ext);
	if(!in_array($ext, $file_extensions_allowed)){
		$exts = implode(', ',$file_extensions_allowed);
		
		$adjunto['msg'] .="<p>".$_FILES['adjunto']['name']." <br />Puede subir archivos que tengan alguna de estas extenciones: ".$exts_humano."</p>";

	}else{
		include(APPPATH.'libraries/class.upload_files.php');
		$yukle_adjunto = new upload_files;
		$yukle_adjunto->set_max_size(1900000);
		$yukle_adjunto->set_directory('./adjuntos-productos');
		$yukle_adjunto->set_tmp_name($_FILES['adjunto']['tmp_name']);
		$yukle_adjunto->set_file_size($_FILES['adjunto']['size']);
		$yukle_adjunto->set_file_type($_FILES['adjunto']['type']);
		$random = substr(md5(rand()),0,6);
		$name_whitout_whitespaces = str_replace(" ","-",$_FILES['adjunto']['name']);
		$imagname=''.$random.'_'.$name_whitout_whitespaces;
		#$thumbname='tn_'.$imagname;
		$yukle_adjunto->set_file_name($imagname);


		$yukle_adjunto->start_copy();


		if($yukle_adjunto->is_ok()){
			#$yukle_adjunto->resize(600,0);
			#$yukle_adjunto->set_thumbnail_name('tn_'.$random.'_'.$name_whitout_whitespaces);
			#$yukle_adjunto->create_thumbnail();
			#$yukle_adjunto->set_thumbnail_size(200, 0);

			//UPLOAD ok
			$adjunto['adjunto'] = $imagname;
			$adjunto['status'] = 1;
		}
		else{
			$adjunto['status'] = 0 ;
			$adjunto['msg'] = 'Error al subir archivo';
			
		}

		//clean
		$yukle_adjunto->set_tmp_name('');
		$yukle_adjunto->set_file_size('');
		$yukle_adjunto->set_file_type('');
		$imagname='';
	}//fin if(extencion)


	return $adjunto;
}

} //end class

?>