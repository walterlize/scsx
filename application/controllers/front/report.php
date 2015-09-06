<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

	public function reportList(){
		
		$array = array("repo_state"=>6);
    	
		$this->load->model("m_report");
		$num = $this->m_report->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getReports($array,$offset);
    	
    	
    	$config['base_url'] = base_url() . 'index.php/front/report/reportList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
        $data['num']=$num;

    	$data['news'] = $news;
    	$data['title'] = "优秀实习汇报";
    	$data['type']='1';
    	$this->load->view('common/title');
        $this->load->view('front/news/report', $data);
        $this->load->view('common/foot');
	}
	
	
	
	
	
	function reportDetail(){
		$this->load->model("m_report");
		$repo_id = $this->uri->segment(4);
		$news = $this->getReportById($repo_id);
		
		
		$data['title']="优秀实习汇报";
		$data["news"]=$news;
		
		$this->load->view('common/title');
		$this->load->view('front/news/reportDetail', $data);
		$this->load->view('common/foot');
	}
	
	
	
	
	public function getReportById($id){
		$this->load->model("m_report");
		$result = $this->m_report->getReportById($id);
		$data = array();
		foreach ($result as $r){
			$data = $r;
		}
		return $data;
		
	}
	
	
	
	
	
	public function getReports($array,$offset) {
		
		$this->load->model('m_report');
		$result = $this->m_report->getReports($array,15,$offset);
	
		$data = array();
		foreach ($result as $r) {
			$arr = array(
					'news_id' => $r->repo_id,
					'news_title' => $r->repo_title,
					'news_time'=> $r->repo_time,
					'news_auditer2'=>$r->repo_auditer2,
					'news_keywords'=>$r->repo_keywords,
					
	
			);
			array_push($data, $arr);
		}
		return $data;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
	}
	
	


       

}
?>
