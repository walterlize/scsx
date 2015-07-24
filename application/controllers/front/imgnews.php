<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imgnews extends CI_Controller {

    function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

	public function imgList(){
		
		$array = array("news_audit"=>"6","news_type_id"=>5);
    	
		$this->load->model("m_news");
		$num = $this->m_news->getNum($array);
		$offset = $this->uri->segment(4);
		$news = $this->getNews($array,$offset);
    	
    	
    	$config['base_url'] = base_url() . 'index.php/front/news/newsList';
    	$config['total_rows'] = $num;
    	$config['uri_segment'] = 4;
    	$this->pagination->initialize($config);
    	$data['page'] = $this->pagination->create_links();
        $data['num']=$num;

    	$data['news'] = $news;
    	$data['title'] = "实习风采";
    	$data['type']='1';
    	$this->load->view('common/title');
        $this->load->view('front/news/img', $data);
        $this->load->view('common/foot');
	}
	
	
	
	
	
	function imgDetail(){
		$this->load->model("m_news");
		$news_id = $this->uri->segment(4);
		$news = $this->getNewsById($news_id);
		
		$data['list']="imgList";
		$data['title']="实习风采";
		$data["news"]=$news;
		
		$this->load->view('common/title');
		$this->load->view('front/news/imgDetail', $data);
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
