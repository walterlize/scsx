<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function studentList() {
        $this->timeOut();

        $this->load->model('m_student');
        $num1 = $this->m_student->getNum1(array());
        $num2 = $this->m_student->getNum2(array());
        $num = $num1+$num2;
        $offset = $this->uri->segment(4);

        $data['student1'] = $this->getStudents1($offset);
        $data['student2'] = $this->getStudents2($offset);
        $config['base_url'] = base_url() . 'index.php/teacher/student/studentList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('teacher/student/student', $data);
        $this->load->view('common/footer');
    }

    // 实验任务详细信息页面
    public function studentDetail1() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getStudent1($id);

        $this->load->view('common/header3');
        $this->load->view('teacher/student/studentDetail1', $data);
        $this->load->view('common/footer');
    }
    // 实验任务详细信息页面
    public function studentDetail2() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getStudent2($id);

        $this->load->view('common/header3');
        $this->load->view('teacher/student/studentDetail2', $data);
        $this->load->view('common/footer');
    }
    
    // 分页获取全部实验任务信息
    public function getStudents1($offset) {
        $this->timeOut();
        $this->load->model('m_student');
        $data = array();
        $result = $this->m_student->getStudents1($data, PER_PAGE, $offset);

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
    
    public function getStudents2($offset) {
        $this->timeOut();
        $this->load->model('m_student');
        $data = array();
        $result = $this->m_student->getStudents2($data, PER_PAGE, $offset);

        foreach ($result as $r) {
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
        return $data;
    }

    // 获取单个实验任务信息
    function getStudent1($id) {
        $this->load->model('m_student');
        $result = $this->m_student->getOneInfo1($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    
    // 获取单个实验任务信息
    function getStudent2($id) {
        $this->load->model('m_student');
        $result = $this->m_student->getOneInfo2($id);
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