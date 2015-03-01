<?php  

class Modulo extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records(){
		$this->db->select()->from('modulos')->order_by('nombre','ASC');
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('modulos');

		return $c->row(); 
	}

	public function find_by_name($name){
		$this->db->where('nombre' ,$name);
		$this->db->limit(1);
		$c = $this->db->get('modulos');

		return $c->row('id');
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->where('status', 0)->from('modulos');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('modulos', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('modulos', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('modulos');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('modulos_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('modulos');

					return $c->row('nombre'); 
				}
		
		*/

}
 
?>