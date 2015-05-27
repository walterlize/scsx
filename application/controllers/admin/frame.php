<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frame extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
	}

	public function index(){
            $this->load->view('admin/frame');
	}

        public function main(){
            $this->load->view('common/header');
            $this->load->view('admin/main');
            $this->load->view('common/footer');
        }

        public function menu(){
        	$data['id'] = $this->session->userdata('u_name');
            $data['name'] = $this->session->userdata('realname');
            $this->load->view('common/header');
            $this->load->view('admin/left',$data);
            $this->load->view('common/footer');
        }

}
?>
