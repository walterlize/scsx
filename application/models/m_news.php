<?php

class m_news extends CI_Model {

 	var $news_id = '';
    var $news_title = '';
    var $news_time = '';
    var $news_content = '';
    var $news_keywords = '';
    var $news_img = '';
    var $news_auther_id = '';
    var $news_auther ='';
    var $news_auditer_id = '';
    var $news_auditer='';
    var $news_audit = '';
    var $news_audit_date ='';
    var $news_type_id='';
    var $news_college = '';
    var $news_count='';
    

    function saveInfo() {
        $this->news_id = $this->input->post('news_id');
        $this->news_title = $this->input->post('news_title');
        $this->news_time = $this->input->post('news_time');
        $this->news_content = $this->input->post('news_content');
        $this->news_keywords = $this->input->post('news_keywords');
        $this->news_img = $this->input->post('news_img');
        $this->news_auther_id = $this->input->post('news_auther_id');
        $this->news_auther = $this->input->post('news_auther');
        $this->news_auditer_id = $this->input->post('news_auditer_id');
        $this->news_auditer = $this->input->post('news_auditer');
        $this->news_audit = $this->input->post('news_audit');
        $this->news_audit_date = $this->input->post('news_audit_date');
        $this->news_type_id = $this->input->post('news_type_id');
        $this->news_college = $this->input->post('news_college');
        $this->news_count = $this->input->post('news_count');
        
       

        $id = $this->news_id;
        if ($id == 0) {
            $this->db->insert('news', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('news', $this, array('news_id' => $this->news_id));
        }
        return $id;
    }

    function getNews($array) {
        $this->db->select();
        $this->db->from('ws_news');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getNewss($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("news_auditer_id","asc");
        $q = $this->db->get('ws_news', $per_page, $offset);
        return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('ws_news');   	
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    


   

    function getNewsById($id) {
        $this->db->select();
        $this->db->from('ws_news');
        $this->db->where('news_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    
    function updateNews($id, $array) {
        $this->db->where('news_id', $id);
        $this->db->update('news', $array);
    }

    function deleteNews($id) {
        $this->db->where('news_id', $id);
        $this->db->delete('news');
    }

    

}

?>
