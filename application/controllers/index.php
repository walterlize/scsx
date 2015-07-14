<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('m_user');
        $this->load->model('m_nteacher');
        
    }

    public function index() {
        $data['title'] = "中国农业大学生产实习信息化系统";
        // 用户登录部分
        $name = $this->session->userdata('u_name');
        $data['userid'] = $this->session->userdata('u_id');
        $data['role'] = $this->session->userdata('roleId');

        //新闻公告
        $data['news'] = array();
        $data['notice'] = array();
        $data['guiding'] = array();
        $data['summary'] = array();
        
        $data['news'] = $this->getNews();
        $data['notice'] = $this->getNotice();
        $data['guiding'] = $this->getRule();       
        $data['summary'] = $this->getSum();
        $data['img'] = $this->getImg();
        if($data['role']==1){
            $data['role_name']='学校管理员';
        }elseif($data['role']==2){
            $data['role_name']='学院管理员';
        }elseif($data['role']==3){
            $data['role_name']='老师';
        }elseif($data['role']==4){
            $data['role_name']='基地管理员';
        }elseif($data['role']==5){
            $data['role_name']='学生';
        }
        
        if ($name == '' || $name == null) {
            $data['name'] = $name;
            $data['form'] = '';
            $data['welcome'] = 'display:none';

        } else {

            $data['name'] = $name;
            $data['form'] = 'display:none';
            $data['welcome'] = '';

        }

        $this->load->view('common/title');
        $this->load->view('interface/login2', $data);
        $this->load->view('common/foot');
    }
    //获取新闻
    public function getNews() {
    	$array = array("news_audit"=>"6","news_type_id"=>1);
        $this->load->model('m_news');
        $data = $this->m_news->getNewss($array, 5, 0);
        return $data;
    }
    public function getNotice() {
       $array = array("news_audit"=>"6","news_type_id"=>2);
        $this->load->model('m_news');
        $data = $this->m_news->getNewss($array, 5, 0);
        return $data;
    }
    public function getRule() {
        $array = array("news_audit"=>"6","news_type_id"=>3);
        $this->load->model('m_news');
        $data = $this->m_news->getNewss($array, 5, 0);
        return $data;
    }
    public function getSum() {
        $array = array("news_audit"=>"6","news_type_id"=>4);
        $this->load->model('m_news');
        $data = $this->m_news->getNewss($array, 5, 0);
        return $data;
    }
    public function getImg() {
    	$array = array("news_audit"=>"6","news_type_id"=>5);
        $this->load->model('m_news');
        $data = $this->m_news->getNewss($array, 5, 0);
        return $data;
    }

    public function instruction() {
        $data = $this->uri->segment(3);

        if ($data == 7) {
            redirect('luntan/frame/index');
        } else if ($data == 8) {
            redirect('admin/xuesheng/xueshengLists');
        } else if ($data == 9) {
            redirect('admin/jiaoshi/jiaoshiLists');
        } else if ($data == 10) {
            redirect('admin/jidi/jidiLists');
        }
    }
    public function contact() {
        $this->load->view('common/title');
        $this->load->view('common/contact');
        $this->load->view('common/foot');
    }

    // 登陆
    public function login() {
        $u_name = $this->input->post('u_name');
        $password = $this->input->post('password');
        $userType = $this->input->post('userType');

        $t = $this->getNowTerm(1);
        $term = $t->term;
        
    	switch ($userType){
    		case 1:
    			//校级管理员 与院级管理员
    			$this->load->model('m_admin');
    			$array = array('admin_num' => $u_name, 'admin_password' => $password);
                $num=$this->m_admin->getNum($array);
                if($num==1){
    			$result = $this->m_admin->getAdmin($array);
    			if($result){
    				$data = array();
    				foreach ($result as $r) {
    					$data = $r;
    				}
    				$array = array(
    						'id' => $data->admin_id,
    						'u_id' => $data->admin_num,
    						'roleId' => $data->admin_roleId,
    						'college' => 0,
    						'realname' => $data->admin_name,
    						'u_name' => $data->admin_num,
    						'u_num' => $data->admin_num,
    						'ustateId' => 1,
    						'grade'=> 0,
    						'major'=> 0,
    						'class'=> 0,
    						'term'=>$term

    				);
    				$this->session->set_userdata($array);
    				redirect('superadmin/frame/index');

    			} else {
    				redirect('index/erro');
    			}
                }elseif($num==0){
                    redirect('index/erro');
                }else{
                    echo "出现重复数据！请联系管理员！";
                }
    		case 2:
    			//院级管理员
    			//校级管理员
    			$this->load->model('m_admin');
    			$array = array('admin_num' => $u_name, 'admin_password' => $password,'admin_roleId'=>2);
    			$result = $this->m_admin->getAdmin($array);

    			if($result){
    				$data = array();
    				foreach ($result as $r) {
    					$data = $r;
    				}
    				$array = array(
    						'id' => $data->admin_id,
    						'u_id' => $data->admin_num,
    						'roleId' => 2,
    						'college' => $data->admin_coll_name,
    						'realname' => $data->admin_name,
    						'u_name' => $data->admin_num,
    						'u_num' => $data->admin_num,
    						'ustateId' => 1,
    						'grade'=> 0,
    						'major'=> 0,
    						'class'=> 0,
    						'term'=>$term

    				);
    				$this->session->set_userdata($array);
    				redirect('admin/frame/index');

    			} else {
    				redirect('index/erro');
    			}
    			break;
    		case 3:



/*-------------------普通模式下查询---------------------------------------------*/
	            $this->load->model('m_nteacher');
	            $array = array('JSH' => $u_name, 'MM' => $password);
                    
	            $result = $this->m_nteacher->getTea($array);
                if($result==null){
                    echo "查询结果为空请仔细检查输入。";
                }
	           
	    		if ($result) {
	    			$data = array();
	    			foreach ($result as $r) {
	    				$data = $r;
	    			}
	    			$array = array(
	    					'u_id' => $data->JSH, 
	    					'roleId' => 3, 
	    					'college' => $data->XSM,
	    					'realname' => $data->JSM,
	    					'u_name' => $data->JSM, 
	    					'u_num' => $data->JSH, 
	    					'ustateId' => 1,
	    					'grade'=> 0,
	    					'major'=> 0,
	    					'class'=> 0,
    						'term'=>$term
	    					
	    			);
	    			$this->session->set_userdata($array);
                    //print_r($this->session->all_userdata());
	    			//普通教师
	    			redirect('teacher/frame/index');
	    			
	    			
	    		} else {
	    			redirect('index/erro');
	    		}
	    		break;
    		
    		case 4:

    			//查询基地用户表
    			$this->load->model('m_user');
    			$array = array('user_num' => $u_name, 'user_password' => $password);
    			$result = $this->m_user->getNCompUserL($array);
    			
    			
    			
    			if ($result) {
	    			$data = array();
	    			foreach ($result as $r) {
	    				$data = $r;
	    			}

    				$array = array(
    						'u_id' => $data->u_id,
    						'roleId' => 4,
    						'college' => $codata->college,
    						
    						'realname' => $data->realname,
    						'u_name' => $data->u_name,
    						'u_num' => $data->u_name,
    						'ustateId' => $data->ustateId,
    						'grade'=> 0,
    						'major'=> 0,
    						'class'=> 0,
    						'term'=>$term
    						
    				);
    				$this->session->set_userdata($array);
    				if ($array['ustateId'] == 2) {
    					redirect('index/erro1');
    				} else if ($array['ustateId'] == 1) {
    					if ($array['roleId']) {
    						redirect('master/frame/index');
    					}
    				}
    			} else {
    				redirect('index/erro');
    			}
    			
    			break;
    			
    		case 5:
    			//查询学生表
    			$this->load->model('m_nstudent');
    			$array = array('XH' => $u_name, 'MM' => $password);
    			$result = $this->m_nstudent->getStu($array);
    				 
    			if ($result) {
	    			$data = array();
	    			foreach ($result as $r) {
	    				$data = $r;
	    			}
    				
    				$array = array(
    						'u_id' => $data->XH,
    						'roleId' => 5,
    						'college' => $data->XSM,
    						
    						'realname' => $data->XM,
    						'u_name' => $data->XH,
    						'u_num' => $data->XH,
    						'ustateId' => 1,
    						'grade'=>$data->NJMC,
    						'major'=>$data->ZYM,
    						'class'=>$data->BM,
    						'term'=>$term,
    						
    				);
    				$this->session->set_userdata($array);
    				if ($array['ustateId'] == 0) {
    					redirect('index/erro1');
    				} else if ($array['ustateId'] == 1) {
    					
    						redirect('student/frame/index');
    					
    				}
    			} else {
    				redirect('index/erro');
    			}
    				 
    			break;
    		
    	}

        /*
    	$result = $this->m_user->getUser($array);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }

        if (isset($data->u_name)) {
            $array = array('u_id' => $data->u_id, 'roleId' => $data->roleId, 'collegeId' => $data->collegeId, 'realname' => $data->realname,
                'u_name' => $data->u_name, 'password' => $data->password, 'ustateId' => $data->ustateId,'classId'=>$data->classId);
            $this->session->set_userdata($array);
            if ($data->ustateId == 0) {
                redirect('index/erro1');
            } else if ($data->ustateId == 1) {
                if ($data->roleId == 1) {
                    redirect('superadmin/frame/index');
                } else if ($data->roleId == 2) {
                    redirect('admin/frame/index');
                } else if ($data->roleId == 3) {
                    redirect('teacher/frame/index');
                } else if ($data->roleId == 4) {
                    redirect('master/frame/index');
                } else if ($data->roleId == 5) {
                    redirect('student/frame/index');
                }
            }
        } else {
            redirect('index/erro');
        }*/
    }

    // 如果已经登录，则可以在首页直接登录
    public function getin()
    {

        $this->load->model('m_user');
        $role = $this->uri->segment(3);

        if ($role == 1) {
            redirect('superadmin/frame/index');
        }
        else if ($role == 2) {
            redirect('admin/frame/index');
        }
        else if ($role == 3) {
            redirect('teacher/frame/index');
        }
        else if ($role == 4) {
            redirect('master/frame/index');
        }
        else if ($role == 5) {
            redirect('student/frame/index');
        }
    }


    public function erro() {
        $this->load->view('common/erro');
    }
    public function erro1() {
        $this->load->view('common/erro1');
    }

    public function title() {
        $this->load->view('common/title');
    }

    public function foot() {
        $this->load->view('common/foot');
    }
    public function foot1() {
        $this->load->view('common/foot1');
    }

    public function top11() {
        $data['name'] = $this->session->userdata('u_name');
        $this->load->view('common/top11', $data);
    }
    public function top1() {
        $data['name'] = $this->session->userdata('u_name');
        $this->load->view('common/top1', $data);
    }

    public function top2() {
        $data['name'] = $this->session->userdata('u_name');
        $this->load->view('common/top2', $data);
    }

    public function top3() {
        $data['name'] = $this->session->userdata('u_name');
        $this->load->view('common/top3', $data);
    }

    public function top4() {
        $data['name'] = $this->session->userdata('u_name');
        $this->load->view('common/top4', $data);
    }

    public function top5() {
        $data['name'] = $this->session->userdata('u_name');
        $this->load->view('common/top5', $data);
    }

    public function shouye1() {
        $this->load->view('superadmin/main');
    }

    public function shouye2() {
        $this->load->view('admin/main');
    }

    public function shouye3() {
        $this->load->view('teacher/main');
    }

    public function shouye4() {
        $this->load->view('master/main');
    }

    public function shouye5() {
        $this->load->view('student/main');
    }

    public function timeOut() {
        $array = array();
        $this->session->set_userdata($array);
        $this->session->sess_destroy();
        $this->load->view('time_out');
    }

    public function logOut() {
        $array = array();
        $this->session->set_userdata($array);
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
    function getNowTerm($id){
    	$this->load->model('m_nowterm');
    	$result = $this->m_nowterm->getNowtermById($id);
    	$data = array();
    	foreach ($result as $r) {
    		$data = $r;
    	}
    	return $data;
    }

}

?>