<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sum extends CI_Controller {

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
        //院列表
        $this->load->model('m_college');
        $college = $this->m_college->getCollege(array());
         
        //院名数组
        $collegeName=array("农院","生院","资环","动科","动医","食院","工学院","信电","水院","理学院","经管","人发","国院","烟院","思政","体艺","继续教育");
        $collegeNames=array(
        		"农学与生物技术学院",
        		"生物学院",
        		"资源与环境学院",
        		"动物科学技术学院",
        		"动物医学院",
        		"食品科学与营养工程学院",
        		"工学院",
        		"信息与电气工程学院",
        		"水利与土木工程学院",
        		"理学院",
        		"经济管理学院",
        		"人文与发展学院",
        		"国际学院",
        		"烟台研究院",
        		"思政学院",
        		"体育与艺术教学部",
        		"继续教育学院"
        );
        $collegeNames1=array(
        		"01",
        		"02",
        		"03",
        		"04",
        		"05",
        		"06",
        		"07",
        		"08",
        		"09",
        		"10",
        		"11",
        		"12",
        		"14",
        		"40",
        
        );
        //各院人数数组
        $this->load->model('m_nstudent');
        //for($i=0;$i<count($collegeNames);$i++){
        	//$stuNum[$i] = $this->m_nstudent->getNumALL(array('XSM'=>$collegeNames[$i]));
        	//太长不方便缩写
        	//$collegeName[$i] = $college[$i]->college;
        //}
        $stu = $this->m_nstudent->getStu(array('XSM'=>"农学与生物技术学院"));
       // print_r($stu); echo "<br>";
        $num = $this->m_nstudent->getNumALL(array('XSM'=>"农学与生物技术学院"));
        echo $num;
        //$arr = array( 'collegeName'=>$collegeName,
        //		'stuNum'=>$stuNum
        //);
        
       // $data['collegeName']=$collegeNames;
        //$data['stuNum']=$stuNum;
        
        //$this->load->view('common/header3');
        //$this->load->view('superadmin/count/sum1',$data);
        //$this->load->view('common/footer');
    }
    public function sumList2() {
        $this->timeOut();
        
        $this->load->view('common/header3');
        $this->load->view('superadmin/sum/sum2');
        $this->load->view('common/footer');
    }
    public function sumList3() {
    	$this->timeOut();
    
    	$this->load->view('common/header3');
    	$this->load->view('superadmin/sum/sum3');
    	$this->load->view('common/footer');
    }
    
    public function ajaxSum1(){
    	$this->timeOut();
    	
    	//院列表
    	$this->load->model('m_college');
    	$college = $this->m_college->getCollege(array());
    	
    	//院名数组
    	$collegeName=array("农院","生院","资环","动科","动医","食院","工学院","信电","水院","理学院","经管","人发","国院","烟院","思政","体艺","继续教育");
    	$collegeNames=array(
    			"农学与生物技术学院",
    			"生物学院",
    			"资源与环境学院",
    			"动物科学技术学院",
    			"动物医学院",
    			"食品科学与营养工程学院",
    			"工学院",
    			"信息与电气工程学院",
    			"水利与土木工程学院",
    			"理学院",
    			"经济管理学院",
    			"人文与发展学院",
    			"国际学院",
    			"烟台研究院",
    			"思政学院",
    			"体育与艺术教学部",  			
    	        "继续教育学院"    			
    	);
    	//各院人数数组
    	$this->load->model('m_nstudent');
    	for($i=0;$i<count($college);$i++){
    		$stuNum[$i] = $this->m_nstudent->getNumALL(array('college'=>$collegeNames[$i]));
    		//太长不方便缩写
    		//$collegeName[$i] = $college[$i]->college;
    	}
    	
    	$arr = array( 'collegeName'=>$collegeName,
    			'stuNum'=>$stuNum
    	);
    	echo json_encode($arr);
    }
    //教师人数统计
    public function ajaxSum2(){
    	$this->timeOut();
    	 
    	//院列表
    	$this->load->model('m_college');
    	$college = $this->m_college->getCollege(array());
    	 
    	//院名数组
    	$collegeName=array("农院","生院","动科","动医","食院","资环","信电","工学院","水利","理学院","经管","人发","国院","烟院","思政","体艺","继续教育");
    	//各院人数数组
    	$this->load->model('m_nteacher');
    	for($i=0;$i<count($college);$i++){
    		$stuNum[$i] = $this->m_nteacher->getNumALL(array('college'=>$college[$i]->college));
    		//太长不方便缩写
    		//$collegeName[$i] = $college[$i]->college;
    	}
    	 
    	$arr = array( 'collegeName'=>$collegeName,
    			'stuNum'=>$stuNum
    	);
    	echo json_encode($arr);
    }
    
    //课程数统计
    public function ajaxSum3(){
    	$this->timeOut();
    
    	//院列表
    	$this->load->model('m_college');
    	$college = $this->m_college->getCollege(array());
    
    	//院名数组
    	$collegeName=array("农院","生院","动科","动医","食院","资环","信电","工学院","水利","理学院","经管","人发","国院","烟院","思政","体艺","继续教育");
    	//各院人数数组
    	$this->load->model('m_ncourse');
    	for($i=0;$i<count($college);$i++){
    		$stuNum[$i] = $this->m_ncourse->getNumALL(array('college'=>$college[$i]->college));
    		//太长不方便缩写
    		//$collegeName[$i] = $college[$i]->college;
    	}
    
    	$arr = array( 'collegeName'=>$collegeName,
    			'stuNum'=>$stuNum
    	);
    	echo json_encode($arr);
    }
    /*
    public function ajaxSum2(){
    	$this->timeOut();
    	 
    	//院列表
    	$this->load->model('m_college');
    	$college = $this->m_college->getCollege(array());
    	 
    	//院名数组
    	$collegeName=array("农院","生院","动科","动医","食院","资环","信电","工学院","水利","理学院","经管","人发","国院","烟院","思政","体艺","继续教育");
    	//各院人数数组
    	$this->load->model('m_user');
    	for($i=0;$i<count($college);$i++){
    		$stuBNum[$i] = $this->m_user->getStuNum(array('collegeId'=>$college[$i]->collegeId,'sex'=>"男"));
    		$stuGNum[$i] = $this->m_user->getStuNum(array('collegeId'=>$college[$i]->collegeId,'sex'=>"女"));
    		//太长不方便缩写
    		//$collegeName[$i] = $college[$i]->college;
    	}
    	 
    	$arr = array( 'collegeName'=>$collegeName,
    			'stuBNum'=>$stuBNum,
    			'stuGNum'=>$stuGNum
    	);
    	echo json_encode($arr);
    }
    */
    
    //按年级统计
    public function ajaxSum4(){
    	$this->timeOut();
    	 
    	//院列表
    	$this->load->model('m_college');
    	$college = $this->m_college->getCollege(array());
    	 
    	//院名数组
    	$collegeName=array("农院","生院","动科","动医","食院","资环","信电","工学院","水利","理学院","经管","人发","国院","烟院","思政","体艺","继续教育");
    	//各院人数数组
    	$this->load->model('m_nstudent');
    	for($i=0;$i<count($college);$i++){
    		$stuNum[$i] = $this->m_nstudent->getNumALL(array('college'=>$college[$i]->college));
    		//太长不方便缩写
    		//$collegeName[$i] = $college[$i]->college;
    	}
    	 
    	$arr = array( 'collegeName'=>$collegeName,
    			'stuNum'=>$stuNum
    	);
    	echo json_encode($arr);
    }
    
    

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 1) {
            $this->load->view('logout');
        }
    }

}

?>