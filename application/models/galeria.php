<?php  

class Galeria extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('galerias')->where('status', 0)->order_by('id','ASC')->limit($num,$start);
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('galerias');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->where('status', 0)->from('galerias');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('galerias', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('galerias', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('galerias');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('galerias_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('galerias');

					return $c->row('nombre'); 
				}
		
		*/

}

?>