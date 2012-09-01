<?php 

class Twotter extends CI_Controller {

	public function __construct() {
        parent::__construct();

        session_start();
        $this->load->helper('url');
        $this->load->model('twoots');
    }

	public function index() {

		$twoots = $this->twoots->get_all();
		$data = array(
			'twoots'=>$twoots
		);
		$this->load->view('view', $data);
	}

	public function add(){		
		$twoot_data = array('msg'=>$this->input->post('twoot'));
		$this->twoots->append_twoot($twoot_data);
		redirect('/twotter/');
	}

	public function edit() {
		$this->load->view('edit');
	}

	public function delete($id) {
		$this->twoots->delete_twoot($id);
		redirect('/twotter/');
	}

	public function delete_all(){
		$this->twoots->delete_all_twoots();
	}
}