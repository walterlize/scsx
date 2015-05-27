<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Score extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function scoreList() {
        $this->timeOut();

        $this->load->model('m_score');
        $num1 = $this->m_score->getNum3(array());
        $num2 = $this->m_score->getNum4(array());
        $num = $num1+$num2;
        $offset = $this->uri->segment(4);

        $data['score1'] = $this->getScores1($offset);
        
        $config['base_url'] = base_url() . 'index.php/teacher/score/scoreList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/score/score', $data);
        $this->load->view('common/footer');
    }
    
    public function scoreLists() {
        $this->timeOut();

        $this->load->model('m_scores');
        $num = $this->m_scores->getNum2(array());
        $offset = $this->uri->segment(4);

        $data['score'] = $this->sgetScores($offset);
        $config['base_url'] = base_url() . 'index.php/teacher/score/scoreLists';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        
        $stu=array();
        $course=array();
        for($i=0;$i<count($data['score']);$i++){
        	$stu[$i]=$this->getStu($data['score'][$i]['stuId'] );
        	$course[$i] =$this->getCourse($data['score'][$i]['course_id'] ); 
        }
        $data['stu']=$stu;
        $data['course']=$course;

        $this->load->view('common/header3');
        $this->load->view('teacher/score/scores', $data);
        $this->load->view('common/footer');
    }
    
    //获得学生信息
    function getStu($stuId){
    	$this->load->model('m_nstudent');
    	$result=$this->m_nstudent->getStuById($stuId);
    	$data =array();
    	foreach ($result as $r){
    		$data = $r;
    	}
    	return $data;
    }
    
    //获得课程信息
    function getCourse($id){
    	$this->load->model('m_ncourse');
    	$result=$this->m_ncourse->getNcourseById($id);
    	
    	$data =array();
    	foreach ($result as $r){
    		$data = $r;
    	}
    	return $data;
    }
    
    
    //

    // 实验任务详细信息页面
    public function scoreDetail1() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getScore1($id);
        
       


        $this->load->view('common/header3');
        $this->load->view('teacher/score/scoreDetail1', $data);
        $this->load->view('common/footer');
    }
    
    function getExit($id){
    	$this->load->model('m_scores');
    	$result=$this->m_scores->getNcourseById($id);
    	 
    	$data =array();
    	foreach ($result as $r){
    		$data = $r;
    	}
    	return $data;
    }
    public function scoreDetail2() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getScore2($id);


        $this->load->view('common/header3');
        $this->load->view('teacher/score/scoreDetail2', $data);
        $this->load->view('common/footer');
    }
    
    // 实验任务详细信息页面
    public function scoreDetails() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->sgetScore($id);


        $this->load->view('common/header3');
        $this->load->view('teacher/score/scoreDetails', $data);
        $this->load->view('common/footer');
    }

    // 实验任务信息编辑页面
    public function scoreEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        //$b_id = $this->uri->segment(5);
        $data['score'] = $this->sgetScore($id);
        //$data['baoming'] = $this->getScore($b_id);

        $data['showActive'] = '';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('teacher/score/scoreEdit', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息新增页面
    public function scoreNew1() {
        $this->timeOut();

        @$score->s_id = 0;
        $score->stuId = $this->uri->segment(4);
        $score->teaId = $this->session->userdata('u_name');
        $score->comment = '';
        $score->score = '';
        $id = $this->uri->segment(5);
        $baoming = $this->getScore1($id);
        
        $score->course_id =$baoming->course_id;
        $score->courseId = $baoming->courseId;
        $score->courseNum = $baoming->courseNum;

        
        $data['baoming'] = $baoming;
        $data['score'] = $score;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('teacher/score/scoreEdit1', $data);
        $this->load->view('common/footer');
    }
    public function scoreNew2() {
        $this->timeOut();

        @$score->s_id = 0;
        $score->stuId = $this->uri->segment(4);
        $score->teaId = $this->session->userdata('u_id');
        $score->comment = '';
        $score->score = '';

        $id = $this->uri->segment(5);
        $data['baoming'] = $this->getScore2($id);
        $data['score'] = $score;

        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('teacher/score/scoreEdit2', $data);
        $this->load->view('common/footer');
    }

    public function scoreDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_score');
        $this->m_score->delete($id);

        $num = $this->m_score->getNum1(array());
        $offset = 0;

        $data['score'] = $this->getScores($offset);
        $config['base_url'] = base_url() . 'index.php/teacher/score/scoreList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/score/score', $data);
        $this->load->view('common/footer');
    }

    // 保存实验任务信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_scores');
        $stuId = $this->uri->segment(4);
        //$pstateId = $this->uri->segment(5);
        //$b_id = $this->uri->segment(6);
        //$this->m_score->updatePstateId($pstateId,$b_id);
        $id = $this->m_scores->saveInfo($stuId);
        $data = $this->sgetScore($id); 

        $this->load->view('common/header3');
        $this->load->view('teacher/score/scoreDetails', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部实验任务信息
    public function getScores1($offset) {
        $this->timeOut();
        $this->load->model('m_score');
        $data = array();
        $result = $this->m_score->getScores1($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array( 
            		'b_id' => $r->b_id,
            		'courseName' => $r->courseName,
            		'stuMajor' => $r->stuMajor,
            		'stuId' => $r->stuId,
            		'stuName' => $r->stuName,
            		'stuSex' => $r->stuSex,          
                );
            array_push($data, $arr);
        }
        return $data;
    }


    public function sgetScores($offset) {
        $this->timeOut();
        $this->load->model('m_scores');
        $data = array();
        $result = $this->m_scores->sgetScores($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array(
            		's_id'=>$r->s_id,
            		'course_id' => $r->course_id,
            		'courseId' => $r->courseId,
            		'courseNum' => $r->courseNum,
            		'stuId' => $r->stuId,
            		'teaId' => $r->teaId,
            		'score'=>$r->score
              );
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个实验任务信息
    function getScore1($id) {
        $this->load->model('m_score');
        $result = $this->m_score->getOneInfo1($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    function getScore2($id) {
        $this->load->model('m_score');
        $result = $this->m_score->getOneInfo2($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    
    // 获取单个实验任务信息
    function sgetScore($id) {
        $this->load->model('m_score');
        $result = $this->m_score->sgetOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 3) {
            $this->load->view('logout');
        }
    }

}

?>