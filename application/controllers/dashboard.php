<?php  

class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('usuario');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index(){
			if(! $this->session->userdata('logged_in')){
					redirect('dashboard/login');
			}
			$data['title'] = 'Bienvenido';
			$data['menu'] = 'control/empty';
			$data['content'] = 'control/control_index';
			$this->load->view('control/control_layout', $data);
		}

	public function login(){
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

	    #Paso validacion
	    if ($this->form_validation->run()){


		$access_granted = $this->usuario->check_credentials( $this->input->post('email'), $this->input->post('password') );
		if($access_granted===FALSE){
			$this->session->set_flashdata('error', 'No se encuentran usuario con esos datos.');
			redirect('dashboard/login', 'refresh');
		}else{
			redirect('/control/productos');
		}

	}
	//No paso la validacion
	$data['content'] = 'control/login';
	$this->load->view('control/modal_layout', $data);

}

	public function logout(){
		$this->usuario->logout();
		$data['content'] = 'control/login';
		$this->load->view('control/modal_layout', $data);
	}


}

?>