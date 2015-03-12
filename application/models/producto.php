<?php  

class Producto extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('productos')->where('status', 0)->order_by('id','ASC')->limit($num,$start);
		return $this->db->get();

	}

	public function get_records_front(){
		$this->db->select()->from('productos')
		->where('status', 0)
		->where('destacado', 1)
		->order_by('id','DESC')->limit(3);
		return $this->db->get();
	}

	public function get_grupo_productos(){
		$this->db->select()->from('productos')
		->where('status', 0)
		->order_by('id','DESC')->limit(6);
		return $this->db->get();
	}


	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('productos');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->where('status', 0)->from('productos');
		$query = $this->db->get();
		return $query->num_rows();
	}



	//add new
	public function add_record($data){ $this->db->insert('productos', $data);}


	//update
	public function update_record($id, $data){

		$this->db->where('id', $id);
		$this->db->update('productos', $data);

	}

	//destroy
	public function delete_record(){

		$this->db->where('id', $this->uri->segment(4));
		$this->db->delete('productos');
	}


	/*
	public function traer_nombre($id){
				$this->db->where('productos_categoria_id' ,$id);
				$this->db->limit(1);
				$c = $this->db->get('productos');

				return $c->row('nombre'); 
			}
	
	*/

}

?>