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
        		"01","02","03","04","05","06","07","08","09","10","11","12","14","40",        
        );
        //各院人数数组
        $this->load->model('m_nstudent');
        $stu = $this->m_nstudent->countStuNumByCol();
        
        $arrNum1 = array();
        $arrCol1 = array();
        $arrYear1 = array();
        foreach ($stu as $r){
        	array_push($arrYear1,$r->NJMC);
        	array_push($arrCol1,$r->XSM);
        }
        $arrYear = array_unique($arrYear1);
        rsort($arrYear);
        //print_r($arrYear);
        $arrColq = array_unique($arrCol1);
        $arrCol = array_merge($arrColq);
        /*
        $stum = array();
        foreach ($stu as $r){
        	if($r->comp_add_type == 3)
        		$comp[$r->comp_coll_name][0]=$r->c_comp;
        	elseif($r->comp_add_type == 5)
        	$comp[$r->comp_coll_name][1]=$r->c_comp;
        }
        
        foreach ($arrCol as $r) {
	        foreach ($stu as $key=>$val){
	        
	        	print_r($val);echo"<br>";
	        
	        }
        }
        */
        
        
        $data['stu'] = $stu;
        
        $this->load->view('common/header3');
        $this->load->view('superadmin/count/sumStu',$data);
        $this->load->view('common/footer');
    }
    public function sumList2() {
        $this->timeOut();
        
        $this->load->model('m_nteacher');
        $tea = $this->m_nteacher->countTeaNumByCol();
        
        $data['tea'] = $tea;
        
        $this->load->view('common/header3');
        $this->load->view('superadmin/count/sumTea',$data);
        $this->load->view('common/footer');
    }
    
    public function sumList3() {
    	$this->timeOut();
    	//
    	$this->load->model("m_company");
    	$res = $this->m_company->countCompanyByCol();
    	//处理
    	$comp = array();
    	foreach ($res as $r){
    		if($r->comp_add_type == 3)
    		$comp[$r->comp_coll_name][0]=$r->c_comp;
    		elseif($r->comp_add_type == 5)
    		$comp[$r->comp_coll_name][1]=$r->c_comp;
    	}
    	//print_r($comp);
    	
    	foreach ($comp as $key=>$val){
    		
    		if(!isset($val[0]))$comp[$key][0]=0;
    		if(!isset($val[1]))$comp[$key][1]=0;
    		//$r[3]=$r[0]+$r[1];
    		$comp[$key][2]=$comp[$key][0]+$comp[$key][1];
    		
    	}
    	

    	$data['comp']=$comp;
    
    	$this->load->view('common/header3');
    	$this->load->view('superadmin/count/sumCompany',$data);
    	$this->load->view('common/footer');
    }
    
    public function ajaxSum1(){
    	 $this->load->model('m_nstudent');
        $stu = $this->m_nstudent->countStuNumByCol();
        
        $arrNum = array();
        $arrCol1 = array();
        $arrYear1 = array();
        foreach ($stu as $r){
        	array_push($arrYear1,$r->NJMC);
        	array_push($arrCol1,$r->XSM);
        }
        $arrYear = array_unique($arrYear1);
        rsort($arrYear);
        $arrColq = array_unique($arrCol1);
        $arrCol = array_merge($arrColq);       
        foreach ($arrYear as $y){
        	$arrNum[$y]= array();
        	foreach ($stu as $r){       	
        		if($r->NJMC == $y){
        			//print_r($r); echo "  1<br>";
        			array_push($arrNum[$y],$r->COSTU);
        		}else{
        			array_push($arrNum[$y],0);
        		}
        		
        	}
        }
        
        //$data['stu'] = $stu;
    	
    	$arr = array( 'collegeName'=>$arrCol,
    			'stuNum'=>$arrNum,
    			'stuYear'=>$arrYear
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