<?php  

class Imagenes_laempresa extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('imagenes_laempresa')->limit($num,$start);
		return $this->db->get();

	}
	
	
	
	function view_all($id){
		
		$this->db->where('laempresa_id', $id);
		return  $this->db->get('imagenes_laempresa');
		
		
		}
		
	//all by publiccacion
	public function imagenes_laempresa($id_laempresa){

		$this->db->select()->from('imagenes_laempresa')->where('laempresa_id',$id_laempresa);
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('imagenes_laempresa');

		return $c->row(); 
	}
	
	public function get_records_menu(){
			$this->db->select()->from('imagenes_laempresa')->order_by('id','ASC');
			return $this->db->get();
	
		}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('imagenes_laempresa');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ 
		
		$this->db->insert('imagenes_laempresa', $data);
		}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('imagenes_laempresa', $data);

		}

		//destroy
		public function delete_record($id_imagen){

			$this->db->where('id', $id_imagen);
			$this->db->delete('imagenes_laempresa');
		}
		
		




}


?>