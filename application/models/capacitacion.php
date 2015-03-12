<?php  

class Capacitacion extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('capacitaciones')->where('status', 0)->order_by('id','ASC')->limit($num,$start);
		return $this->db->get();

	}

	//all
	/*
	public function get_ultimo(){
		$this->db->select()->from('capacitaciones')->where('status', 0)->order_by('id','DESC')->limit(1);
		return $this->db->get();

	}*/
	public function get_by_date($year='2014', $month){
		$this->db->select()->from('capacitaciones')
		->where('YEAR(fecha)', $year, FALSE)
		->where('MONTH(fecha)', $month, FALSE);
		
		return $this->db->get();

	}

	//all
	public function get_records_front(){
		$this->db->select()->from('capacitaciones')->where('status', 0)->order_by('id','ASC');
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('capacitaciones');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->where('status', 0)->from('capacitaciones');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('capacitaciones', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('capacitaciones', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('capacitaciones');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('capacitaciones_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('capacitaciones');

					return $c->row('nombre'); 
				}
		
		*/

}

?>