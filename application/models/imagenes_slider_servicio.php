<?php  

class Imagenes_slider_servicio extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('imagenes_slider_servicios')->limit($num,$start);
		return $this->db->get();

	}
	
	
	
	function view_all($id){
		
		$this->db->where('slider_servicio_id', $id);
		return  $this->db->get('imagenes_slider_servicios');
		
		
		}
		
	//all by publiccacion
	public function imagenes_slider_servicio($id_slider_servicio){

		$this->db->select()->from('imagenes_slider_servicios')->where('slider_servicio_id',$id_slider_servicio);
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('imagenes_slider_servicios');

		return $c->row(); 
	}
	
	public function get_records_menu(){
			$this->db->select()->from('imagenes_slider_servicios')->order_by('id','ASC');
			return $this->db->get();
	
		}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('imagenes_slider_servicios');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ 
		
		$this->db->insert('imagenes_slider_servicios', $data);
		}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('imagenes_slider_servicios', $data);

		}

		//destroy
		public function delete_record($id_imagen){

			$this->db->where('id', $id_imagen);
			$this->db->delete('imagenes_slider_servicios');
		}
		
		




}


?>