<?php  

class Imagenes_producto extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('imagenes_productos')->limit($num,$start);
		return $this->db->get();

	}
	
	
	
	function view_all($id){
		
		$this->db->where('producto_id', $id);
		return  $this->db->get('imagenes_productos');
		
		
		}
		
	//all by publiccacion
	public function imagenes_producto($id_producto){

		$this->db->select()->from('imagenes_productos')->where('producto_id',$id_producto);
		return $this->db->get();

	}

	//all by publiccacion
	public function traer_una($id_producto){

		$this->db->where('producto_id' ,$id_producto);
					$this->db->limit(1);
					$c = $this->db->get('imagenes_productos');

					return $c->row('filename');

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('imagenes_productos');

		return $c->row(); 
	}
	
	public function get_records_menu(){
			$this->db->select()->from('imagenes_productos')->order_by('id','ASC');
			return $this->db->get();
	
		}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('imagenes_productos');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ 
		
		$this->db->insert('imagenes_productos', $data);
		}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('imagenes_productos', $data);

		}

		//destroy
		public function delete_record($id_imagen){

			$this->db->where('id', $id_imagen);
			$this->db->delete('imagenes_productos');
		}
		
		




}


?>