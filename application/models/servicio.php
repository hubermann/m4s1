<?php  

class Servicio extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($limit){
		$this->db->select()->from('servicios')->where('status', 0)->order_by('nombre','ASC')->limit($limit);
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('servicios');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->where('status', 0)->from('servicios');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('servicios', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('servicios', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('servicios');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('servicios_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('servicios');

					return $c->row('nombre'); 
				}
		
		*/

}

?>