<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mscore extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function mscoreList() {
        $this->timeOut();

        $this->load->model('m_mscore');
        $num1 = $this->m_mscore->getNum3(array());
        //$num2 = $this->m_mscore->getNum4(array());
        //$num = $num1+$num2;
        $offset = $this->uri->segment(4);

        $data['mscore1'] = $this->getMscores1($offset);
        //$data['mscore2'] = $this->getMscores2($offset);
        $config['base_url'] = base_url() . 'index.php/master/mscore/mscoreList';
        $config['total_rows'] = $num1;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscore', $data);
        $this->load->view('common/footer');
    }
    
    public function mscoreLists() {
        $this->timeOut();

        $this->load->model('m_mscore');
        $num = $this->m_mscore->getNum2(array());
        $offset = $this->uri->segment(4);

        $data['mscore'] = $this->sgetMscores($offset);
        $config['base_url'] = base_url() . 'index.php/master/mscore/mscoreLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscores', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function mscoreDetail1() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getMscore1($id);

        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscoreDetail1', $data);
        $this->load->view('common/footer');
    }
    public function mscoreDetail2() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getMscore2($id);

        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscoreDetail2', $data);
        $this->load->view('common/footer');
    }
    
    // 实验任务详细信息页面
    public function mscoreDetails() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->sgetMscore($id);


        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscoreDetails', $data);
        $this->load->view('common/footer');
    }

    // 实验任务信息编辑页面
    public function mscoreEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        //$b_id = $this->uri->segment(5);
        $data['mscore'] = $this->sgetMscore($id);
        //$data['baoming'] = $this->getMscore($b_id);

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscoreEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function mscoreNew1() {
        $this->timeOut();

        @$mscore->s_id = 0;
        $mscore->stuId = $this->uri->segment(4);
        $mscore->y_id = $this->session->userdata('u_id');
        $mscore->comment = '';
        $mscore->score = '';

        $id = $this->uri->segment(5);
        
        $baoming = $this->getMscore1($id);
        
        
        
        $mscore->course_id =$baoming->course_id;
        $mscore->courseId = $baoming->courseId;
        $mscore->courseNum = $baoming->courseNum;
        
        $data['baoming'] = $baoming;
        $data['mscore'] = $mscore;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscoreEdit1', $data);
        $this->load->view('common/footer');
    }
    public function mscoreNew2() {
        $this->timeOut();

        @$mscore->s_id = 0;
        $mscore->stuId = $this->uri->segment(4);
        $mscore->y_id = $this->session->userdata('u_id');
        $mscore->comment = '';
        $mscore->score = '';

        $id = $this->uri->segment(5);
        $data['baoming'] = $this->getMscore2($id);
        $data['mscore'] = $mscore;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscoreEdit2', $data);
        $this->load->view('common/footer');
    }

    public function mscoreDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_mscore');
        $this->m_mscore->delete($id);

        $num = $this->m_mscore->getNum1(array());
        $offset = 0;

        $data['mscore'] = $this->getMscores($offset);
        $config['base_url'] = base_url() . 'index.php/master/mscore/mscoreList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscore', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_mscores');
        $stuId = $this->uri->segment(4);     
        //$ystateId = $this->uri->segment(5);      
        //$b_id = $this->uri->segment(6);
        //$this->m_mscore->updateYstateId($ystateId,$b_id);
        $id = $this->m_mscores->saveInfo($stuId);
        $data = $this->sgetMscore($id);

        $this->load->view('common/header3');
        $this->load->view('master/mscore/mscoreDetails', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getMscores1($offset) {
        $this->timeOut();
        $this->load->model('m_mscore');
        $data = array();
        $result = $this->m_mscore->getMscores1($data, PER_PAGE, $offset);

        //获取已打分学生信息
        $this->load->model('m_mscore');
        $marray = $this->m_mscore->getMscore(array());
        
        foreach ($result as $r) {
        	$flag=0;
        	for($i=0;$i<count($marray);$i++){
        		if($marray[$i]->stuId == $r->stuId)$flag=1;
        	}
        	if($flag == 0){
            $arr = array( 
            		'b_id' => $r->b_id,
            		'courseName' => $r->courseName,
            		'stuMajor' => $r->stuMajor,
            		'stuId' => $r->stuId,
                    'stuName' => $r->stuName,
            		            
                );
            array_push($data, $arr);
        	}
        }
        return $data;
    }
    public function getMscores2($offset) {
        $this->timeOut();
        $this->load->model('m_mscore');
        $data = array();
        $result = $this->m_mscore->getMscores2($data, PER_PAGE, $offset);
        
        //获取已打分学生信息
        $this->load->model('m_mscore');
        $marray = $this->m_mscore->getMscore(array());
        
        foreach ($result as $r) {
        	$flag=0;
        	for($i=0;$i<count($marray);$i++){
        		if($marray[$i]->stuId == $r->stuId)$flag=1;
        	}
        	if($flag == 0){
            $arr = array( 'userId' => $r->userId,'stuname' => $r->stuname, 'sturealname' => $r->sturealname,
                'stusex' => $r->stusex, 'c_id' => $r->c_id, 'comId' => $r->comId, 'yu_id' => $r->yu_id,
                'comName' => $r->comName, 'content' => $r->content, 'plan' => $r->plan,
                'stateId' => $r->stateId, 'p_id' => $r->p_id, 'yu_name' => $r->yu_name, 'ypassword' => $r->ypassword,
                'yrealname' => $r->yrealname, 'yphone' => $r->yphone, 'yemail' => $r->yemail, 'yaddress' => $r->yaddress,'state' => $r->state,
                'p_name' => $r->p_name, 'patternId' => $r->patternId, 'depart' => $r->depart, 'ycollegeId' => $r->ycollegeId,
                'pattern' => $r->pattern, 'ysex' => $r->ysex, 'u_id' => $r->u_id, 'u_name' => $r->u_name,
                'roleId' => $r->roleId, 'password' => $r->password, 'realname' => $r->realname, 'phone' => $r->phone, 'email' => $r->email,
                'address' => $r->address, 'classId' => $r->classId, 'sex' => $r->sex, 'ustateId' => $r->ustateId, 'collegeId' => $r->collegeId,
                'trealname' => $r->trealname,'class' => $r->class, 'stuId' => $r->stuId, 'fb_id' => $r->fb_id
                );
            array_push($data, $arr);
        	}
        }
        return $data;
    }

    public function sgetMscores($offset) {
        $this->timeOut();
        $this->load->model('m_mscore');
        $data = array();
        $result = $this->m_mscore->sgetMscores($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array(
            		's_id' => $r->s_id, 
            		'stuId' => $r->stuId,
            		'stuName' => $r->stuName, 
            		'courseName' => $r->courseName,
                    'score' => $r->score, 
            		'comment' => $r->comment,
            		);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getMscore1($id) {
        $this->load->model('m_mscore');
        $result = $this->m_mscore->getOneInfo1($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    function getMscore2($id) {
        $this->load->model('m_mscore');
        $result = $this->m_mscore->getOneInfo2($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    
    // 获取单个实验任务信息
    function sgetMscore($id) {
        $this->load->model('m_mscore');
        $result = $this->m_mscore->sgetOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 4) {
            $this->load->view('logout');
        }
    }

}

?>