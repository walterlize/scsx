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
            $this->load->view('superadmin/frame');
	}

       
        public function main(){
            $this->load->view('common/header');
            $this->load->view('superadmin/main');
            $this->load->view('common/footer');
        }

        public function menu(){
            $data['name'] = $this->session->userdata('u_name');
            $this->load->view('common/header');
            $this->load->view('superadmin/left',$data);
            $this->load->view('common/footer');
        }

}
?>
