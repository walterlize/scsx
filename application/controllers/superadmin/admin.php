<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
            ini_set('max_execution_time', '0');
            date_default_timezone_set('PRC');
            $this->load->model('m_admin');
	}

        public function adminList(){
            $this->timeOut();
       
            $num = $this->m_admin->getNum(array());
            $offset = $this->uri->segment(4);

            $data['admin'] = $this->getAdmins($offset);
            $config['base_url'] = base_url().'index.php/admin/admin/adminList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('superadmin/admin/admin', $data);
           
            $this->load->view('common/footer');
        }

        // 用户信息编辑页面
        public function adminEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['admin'] = $this->getAdminbyId($id);
            $data['title'] ="管理员信息编辑";
   
            $this->load->view('common/header3');
            $this->load->view('superadmin/admin/adminEdit', $data);
            $this->load->view('common/footer');
        }
        
        public function adminDetail(){
        	$this->timeOut();
        	$id = $this->uri->segment(4);
        	$data['admin'] = $this->getAdminbyId($id);
        	$data['title'] ="管理员信息";
        	 
        	$this->load->view('common/header3');
        	$this->load->view('superadmin/admin/adminDetail', $data);
        	$this->load->view('common/footer');
        }

        

        // 用户信息新增页面
        public function adminNew(){
            $this->timeOut();

            @$admin->admin_id= 0;
            $admin->admin_num = '';
            $admin->admin_name = '';
            $admin->admin_password = '';
            $admin->admin_email = '';
            $admin->admin_phone = '';
            $admin->admin_coll_name = '';
            $admin->admin_roleId = '2';
            $admin->admin_stat_id = '1';
            
            $data['admin'] = $admin;
            $data['title'] = '管理员信息编辑';
            $data['show'] = 'display:none';

            $this->load->view('common/header3');
            $this->load->view('superadmin/admin/adminEdit', $data);
            $this->load->view('common/footer');
        }
        
        public function adminSet(){
        	$this->timeOut();
        
        	$admin_id = $this->m_admin->saveInfo();
        	
        	redirect("superadmin/admin/adminDetail/".$admin_id);
        	
        }

        public function adminDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $this->m_admin->delete($id);
            
            $num = $this->m_admin->getNum(array());
            $offset = 0;

            $data['admin'] = $this->getAdmins($offset);
            $config['base_url'] = base_url().'index.php/admin/admin/adminList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            
            $this->load->view('common/header3');
            $this->load->view('superadmin/admin/admin', $data);             
            $this->load->view('common/footer');

        }

        

        // 分页获取全部课题信息
        public function getAdmins($offset){
            $this->timeOut();
           
            $data = array();
            $result = $this->m_admin->getAdmins($data, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('admin_id' => $r->admin_id, 
                		'admin_num' => $r->admin_num,
                		'admin_name' => $r->admin_name,
                       'admin_password' => $r->admin_password,
                		'admin_email' => $r->admin_email, 
                		'admin_phone' => $r->admin_phone,
                		'admin_roleId' => $r->admin_roleId,
                		'admin_coll_name'=>$r->admin_coll_name,
                		'admin_stat_id'=>$r->admin_stat_id
                       );
                array_push($data, $arr);
            }
            return $data;
        }

        // 获取单个用户信息
        function getAdminbyId($id){
            $result = $this->m_admin->getAdminById($id);
            $data = array();
            foreach ($result as $r){
                $data = $r;
                //$data->state = $this->m_user->getState($r->state);
            }
            return $data;
        }


    /*
	 * session中的role不为1的时候退出系统
	 */
	function timeOut(){
		
		$role = $this->session->userdata('roleId');
	
		if($role != 1){
			$this->load->view('logout');
		}
	}
}
?>