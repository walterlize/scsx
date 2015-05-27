<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sum1 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function sumList1() {
        $this->timeOut();
        $da=array();
        //班级列表
        $this->load->model('m_nstudent');
        $class = $this->m_nstudent->getClass(array());
        sort($class);

        foreach ($class as $r) {
            $sum = $this->m_nstudent->getNum(array('class'=>$r->class));
            $arr = array('class' => $r->class, 'sum' => $sum);
            array_push($da, $arr);
        }
        $data['sum'] = $da;
        
       
        
        $data['class']=$class;

        $this->load->view('common/header3');
        $this->load->view('admin/sum1/sum1', $data);
        $this->load->view('common/footer');
    }

    public function sumList2() {
        $this->timeOut();
        $this->load->model('m_company');
        $num = $this->m_company->getNum(array());

        $data['company'] = $this->getCompanys();

        $this->load->view('common/header3');
        $this->load->view('admin/sum1/sum2', $data);
        $this->load->view('common/footer');
    }

    public function sumList3() {
        $this->timeOut();
        //获取学院名
    	$this->load->model("m_college");
    	$college= $this->m_college->getCollege(array('collegeId'=>$this->session->userdata('collegeId')));
    	$colName = $college[0]->college;

    	//获取成绩
    	$this->load->model('m_score');
    	$s1=$this->m_score->getScoreNum(array('score <= ' => 100,'score >= ' => 95),array('college'=>$colName));
    	$s2=$this->m_score->getScoreNum(array('score < ' => 95,'score >= ' => 90),array('college'=>$colName));
    	$s3=$this->m_score->getScoreNum(array('score < ' => 90,'score >= ' => 85),array('college'=>$colName));
    	$s4=$this->m_score->getScoreNum(array('score < ' => 85,'score >= ' => 80),array('college'=>$colName));
    	$s5=$this->m_score->getScoreNum(array('score < ' => 80,'score >= ' => 75),array('college'=>$colName));
    	$s6=$this->m_score->getScoreNum(array('score < ' => 75,'score >= ' => 70),array('college'=>$colName));
    	$s7=$this->m_score->getScoreNum(array('score < ' => 70,'score >= ' => 65),array('college'=>$colName));
    	$s8=$this->m_score->getScoreNum(array('score < ' => 65,'score >= ' => 60),array('college'=>$colName));
    	$s9=$this->m_score->getScoreNum(array('score < ' => 60),array('college'=>$colName));
    
    	 
    	$scoName = array("100-95","95-90","90-85","85-80","80-75","75-70","70-65","65-60","60以下");
    	$scoNum = array($s1,$s2,$s3,$s4,$s5,$s6,$s7,$s8,$s9);
    	
    	$data['scoName']=$scoName;
    	$data['scoNum']=$scoNum;
        $this->load->view('common/header3');
        $this->load->view('admin/sum1/sum3', $data);
        $this->load->view('common/footer');
    }

    public function getCompanys() {
        $this->timeOut();
        $this->load->model('m_company');
        $data = array();
        $result = $this->m_company->getCompanys1();

        foreach ($result as $r) {
            $arr = array('comId' => $r->comId, 'comName' => $r->comName, 'address' => $r->address,
                'phone' => $r->phone, 'email' => $r->email, 'content' => $r->content, 'plan' => $r->plan,
                'u_id' => $r->u_id, 'realname' => $r->realname, 'stateId' => $r->stateId, 'p_id' => $r->p_id,
                'p_name' => $r->p_name, 'patternId' => $r->patternId, 'depart' => $r->depart, 'u_name' => $r->u_name,
                'password' => $r->password, 'state' => $r->state, 'pattern' => $r->pattern, 'collegeId' => $r->collegeId);
            array_push($data, $arr);
        }
        return $data;
    }

    public function getClass() {
        $this->load->model('m_cla');
        $data = $this->m_cla->getCla1(array());
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 2) {
            $this->load->view('logout');
        }
    }

}

?>