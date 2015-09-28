<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

    function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

	public function newsList(){
		
		$array = array("news_audit"=>"6","news_type_id"=>1);
    	
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
    	
    	
    	$config['base_url'] = base_url() . 'index.php/front/news/newsList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$config['per_page'] = 15;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
        $data['num']=$num;

    	$data['news'] = $news;
    	$data['title'] = "实习新闻";
    	$data['type']='1';
    	$this->load->view('common/title');
        $this->load->view('front/news/news', $data);
        $this->load->view('common/foot');
	}
	
	public function noticeList(){
		
		$array = array("news_audit"=>"6","news_type_id"=>2);
		 
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
		 
		 
		$config['base_url'] = base_url() . 'index.php/front/news/noticeList';
		$config['total_rows'] = $num;
		$config['uri_segment'] = 4;
		$config['per_page'] = 15;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['num']=$num;
	
		$data['news'] = $news;
		$data['title'] = "通知公告";
		$data['type']='2';
		
		$this->load->view('common/title');
        $this->load->view('front/news/news', $data);
        $this->load->view('common/foot');
	}
	
	public function ruleList(){
		
		$array = array("news_audit"=>"6","news_type_id"=>3);
		 
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
		 
		 
		$config['base_url'] = base_url() . 'index.php/front/news/ruleList';
		$config['total_rows'] = $num;
		$config['uri_segment'] = 4;
		$config['per_page'] = 15;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['num']=$num;
	
		$data['news'] = $news;
		$data['title'] = "实习规定";
		$data['type']='3';
		$this->load->view('common/title');
        $this->load->view('front/news/news', $data);
        $this->load->view('common/foot');
	}
	
	public function sumList(){
		
		$array = array("news_audit"=>"6","news_type_id"=>4);
		 
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
		 
		 
		$config['base_url'] = base_url() . 'index.php/front/news/sumList';
		$config['total_rows'] = $num;
		$config['uri_segment'] = 4;
		$config['per_page'] = 15;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['num']=$num;
	
		$data['news'] = $news;
		$data['title'] = "实习总结";
		$data['type']='4';
		$this->load->view('common/title');
        $this->load->view('front/news/news', $data);
        $this->load->view('common/foot');
	}
	
	
	
	function newsDetail(){
		$this->load->model("m_news");
		$news_id = $this->uri->segment(4);
		$news = $this->getNewsById($news_id);
		switch ($news->news_type_id){
			case 1:
				$list = "newsList";
				$title = "实习新闻";
				break;
			case 2:
				$list = "noticeList";
				$title = "通知公告";
				break;
			case 3:
				$list = "ruleList";
				$title = "实习规定";
				break;
			case 4:
				$list = "sumList";
				$title = "实习总结";
				break;
			
			default:
				$list = "newsList";
				$title = "实习新闻";
				break;
		}
		$data['list']=$list;
		$data['title']=$title;
		$data["news"]=$news;
		
		$this->load->view('common/title');
		$this->load->view('front/news/newsDetail', $data);
		$this->load->view('common/foot');
	}
	
	
	
	
	public function getNewsById($id){
		$this->load->model("m_news");
		$result = $this->m_news->getNewsById($id);
		$data = array();
		foreach ($result as $r){
			$data = $r;
		}
		return $data;
		
	}
	
	
	
	
	
	public function getNews($array,$offset) {
		
		$this->load->model('m_news');
		$result = $this->m_news->getNewss($array,15,$offset);
	
		$data = array();
		foreach ($result as $r) {
			$arr = array(
					'news_id' => $r->news_id,
					'news_title' => $r->news_title,
					'news_time'=> $r->news_time,
					'news_auditer_id'=>$r->news_auditer,
					'news_keywords'=>$r->news_keywords,
					'usta_type'=>$r->usta_type
	
			);
			array_push($data, $arr);
		}
		return $data;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
	}
	
	


       

}
?>
