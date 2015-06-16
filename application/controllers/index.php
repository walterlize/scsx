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
    }

    public function index() {
        $data['title'] = "中国农业大学生产实习信息化系统";
        // 用户登录部分
        $name = $this->session->userdata('u_name');
        $data['userid'] = $this->session->userdata('u_id');
        $role = $this->session->userdata('roleId');
        $offset = $this->uri->segment(4);
        //新闻公告
        $data['news'] = array();
        $data['notice'] = array();
        $data['guiding'] = array();
        $data['summary'] = array();
        /*
        $data['news'] = $this->getNews1();
        $data['notice'] = $this->getNews2();
        $data['guiding'] = $this->getNews3();       
        $data['summary'] = $this->getNews4();
        */
        
        if ($name == '' || $name == null) {
            $data['form'] = '';
            $data['welcome'] = 'display:none';
            $data['welcome1'] = 'display:none';
        } else {

            $data['u_name'] = $name;
            $data['form'] = 'display:none';
            $data['welcome'] = 'display:none';
            $data['welcome1'] = '';
        }

        $this->load->view('common/title');
        $this->load->view('interface/login2', $data);
        $this->load->view('common/foot');
    }
    //获取新闻
    public function getNews1() {
        $this->load->model('m_news');
        $data = $this->m_news->getNews1();
        return $data;
    }
    public function getNews2() {
        $this->load->model('m_news');
        $data = $this->m_news->getNews2();
        return $data;
    }
    public function getNews3() {
        $this->load->model('m_news');
        $data = $this->m_news->getNews3();
        return $data;
    }
    public function getNews4() {
        $this->load->model('m_news');
        $data = $this->m_news->getNews4();
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

        //$array = array('u_name' => $u_name, 'password' => $password);
    	switch ($userType){
    		case 1:
    		case 2:
    		case 3:
    			//查询教师表
    			$this->load->model('m_nteacher');
    			$array = array('teaId' => $u_name, 'password' => $password);
    			//$result = $this->m_nteacher->getTea($array);
                $result = $this->m_nteacher->getTea_orcl($u_name,$password);


            $data = array();
    			foreach ($result as $r) {
    				$data = $r;
    			}
    			
    			if (isset($data->teaId)) {
    				//获得学院id
    				$this->load->model('m_college');
    				$reco = $this->m_college->getCollege(array('college'=>$r->college));
    				$codata = array();
    				foreach ($reco as $r) {
    					$codata = $r;
    				}
    				if(!$codata)
    					@$codata->collegeId=0;
    				switch ($data->teaRole){
    					case "普通老师":
    						$roleId = 3;
    						break;
    					case "校级管理员":
    						$roleId = 1;
    						break;
    					case "院系管理员":
    						$roleId = 2;
    						break;
    					default:
    						$roleId = 0;
    						break;
    				}
    				$array = array(
    						'u_id' => $data->id, 
    						'roleId' => $roleId, 
    						'college' => $data->college,
    						'collegeId' => $codata->collegeId, 
    						'realname' => $data->teaName,
    						'u_name' => $data->teaId, 
    						'u_num' => $data->teaId, 
    						'ustateId' => 1,
    						'grade'=> 0,
    						'major'=> 0,
    						'class'=> 0);
    				$this->session->set_userdata($array);
    				print_r($array);
    				if ($array['ustateId'] == 0) {
    					redirect('index/erro1');
    					
    				} else if ($array['ustateId'] == 1) {
    					if ($array['roleId'] == 1) {
    						redirect('superadmin/frame/index');
    					} else if ($array['roleId'] == 2) {
    						redirect('admin/frame/index');
    					} else if ($array['roleId'] == 3) {
    						redirect('teacher/frame/index');
    					} 
    				}
    			} else {
    				redirect('index/erro');
    			}
    			break;
    		
    		case 4:
    			//查询基地用户表
    			$this->load->model('m_user');
    			$array = array('u_name' => $u_name, 'password' => $password);
    			$result = $this->m_user->getNCompUserL($array);
    			
    			$data = array();
    			foreach ($result as $r) {
    				$data = $r;
    			}
    			
    			if (isset($data->u_id)) {
    				//获得学院
    				$this->load->model('m_college');
    				$reco = $this->m_college->getCollege(array('collegeId'=>$r->collegeId));
    				$codata = array();
    				foreach ($reco as $r) {
    					$codata = $r;
    				}
    				if(!$codata)
    					@$codata->college='';
    			
    				if(!$data->collegeId){
    					$roleId = 0;
    				}else{
    					$roleId = 4;
    				}
    				$array = array(
    						'u_id' => $data->u_id,
    						'roleId' => $roleId,
    						'college' => $codata->college,
    						'collegeId' => $data->collegeId,
    						'realname' => $data->realname,
    						'u_name' => $data->u_name,
    						'u_num' => $data->u_name,
    						'ustateId' => $data->ustateId,
    						'grade'=> 0,
    						'major'=> 0,
    						'class'=> 0);
    				$this->session->set_userdata($array);
    				if ($array['ustateId'] == 0) {
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
    			$array = array('stuId' => $u_name, 'password' => $password);
    			$result = $this->m_nstudent->getStu($array);
    				 
    			$data = array();
    			foreach ($result as $r) {
    				$data = $r;
    			}
    			
    			if (isset($data->stuId)) {
    				//获得学院id
    				$this->load->model('m_college');
    				$reco = $this->m_college->getCollege(array('college'=>$r->college));
    				$codata = array();
    				foreach ($reco as $r) {
    					$codata = $r;
    				}
    				if(!$codata)
    					@$codata->collegeId=0;
    			
    				if(!$data->college){
    					$roleId = 0;
    				}else{
    					$roleId = 5;
    				}
    				$array = array(
    						'u_id' => $data->id,
    						'roleId' => $roleId,
    						'college' => $data->college,
    						'collegeId' => $codata->collegeId,
    						'realname' => $data->stuName,
    						'u_name' => $data->stuId,
    						'u_num' => $data->stuId,
    						'ustateId' => 1,
    						'grade'=>$data->grade,
    						'major'=>$data->major,
    						'class'=>$data->class);
    				$this->session->set_userdata($array);
    				if ($array['ustateId'] == 0) {
    					redirect('index/erro1');
    				} else if ($array['ustateId'] == 1) {
    					if ($array['roleId'] == 5) {
    						redirect('student/frame/index');
    					}
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

    // 登陆2
    public function getin() {
        $id = $this->uri->segment(3);
        $this->load->model('m_user');
        $result = $this->m_user->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }

        if (isset($data->u_name)) {
            if ($data->roleId == 1) {
                redirect('admin/frame/index');
            } else if ($data->roleId == 4) {
                redirect('master/frame/index');
            } else if ($data->roleId == 2) {
                redirect('teacher/frame/index');
            } else if ($data->roleId == 3) {
                redirect('student/frame/index');
            }
        } else {
            redirect(base_url());
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

}

?>