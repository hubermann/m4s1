<?php  

class Imagenes_galeria extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('imagenes_galerias')->limit($num,$start);
		return $this->db->get();

	}

	public function get_front($galeria_id=1){
		$this->db->select()->from('imagenes_galerias');
		$q= $this->db->get();
		return $q->result();

	}

	public function get_footer($galeria_id=1){
		$this->db->select()->from('imagenes_galerias')->limit(9);
		$q= $this->db->get();
		return $q->result();

	}
	
	
	
	function view_all($id){
		
		$this->db->where('galeria_id', $id);
		return  $this->db->get('imagenes_galerias');
		
		
		}
		
	//all by publiccacion
	public function imagenes_galeria($id_galeria){

		$this->db->select()->from('imagenes_galerias')->where('galeria_id',$id_galeria);
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('imagenes_galerias');

		return $c->row(); 
	}
	
	public function get_records_menu(){
			$this->db->select()->from('imagenes_galerias')->order_by('id','ASC');
			return $this->db->get();
	
		}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('imagenes_galerias');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ 
		
		$this->db->insert('imagenes_galerias', $data);
		}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('imagenes_galerias', $data);

		}

		//destroy
		public function delete_record($id_imagen){

			$this->db->where('id', $id_imagen);
			$this->db->delete('imagenes_galerias');
		}
		
		




}


?>