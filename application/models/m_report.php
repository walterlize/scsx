<?php

class m_report extends CI_Model {

 	var $repo_id = '';
 	var $repo_cour_no ='';
 	var $repo_cour_num = '';
 	var $repo_cour_term = '';
 	var $repo_cour_name = '';
 	
    var $repo_title = '';
    var $repo_time = '';
    var $repo_content = '';
    var $repo_keywords = '';
    
    var $repo_auther_id = '';
    var $repo_auther ='';
    var $repo_auditer1_id = '';
    var $repo_auditer1='';
    var $repo_audit1 = '';
    var $repo_audit1_content ='';
    var $repo_audit1_date ='';
    var $repo_auditer2_id = '';
    var $repo_auditer2='';
    var $repo_audit2 = '';
    var $repo_audit2_content ='';
    var $repo_audit2_date ='';
    var $repo_state='';
    var $repo_college = '';
    var $repo_count='';
    

	function saveInfo() {
        $this->repo_id = $this->input->post('repo_id');
        $this->repo_cour_no = $this->input->post('repo_cour_no');
        $this->repo_cour_num = $this->input->post('repo_cour_num');
        $this->repo_cour_term = $this->input->post('repo_cour_term');
        $this->repo_cour_name = $this->input->post('repo_cour_name');
        
        $this->repo_title = $this->input->post('repo_title');
        $this->repo_time = $this->input->post('repo_time');
        $this->repo_content = $this->input->post('repo_content');
        $this->repo_keywords = $this->input->post('repo_keywords');
        
        $this->repo_auther_id = $this->input->post('repo_auther_id');
        $this->repo_auther = $this->input->post('repo_auther');
        $this->repo_auditer1_id = $this->input->post('repo_auditer1_id');
        $this->repo_auditer1 = $this->input->post('repo_auditer1');
        $this->repo_audit1 = $this->input->post('repo_audit1');
        $this->repo_audit1_content = $this->input->post('repo_audit1_content');
        $this->repo_audit1_date = $this->input->post('repo_audit1_date');
        $this->repo_auditer2_id = $this->input->post('repo_auditer2_id');
        $this->repo_auditer2 = $this->input->post('repo_auditer2');
        $this->repo_audit2 = $this->input->post('repo_audit2');
        $this->repo_audit2_content = $this->input->post('repo_audit2_content');
        $this->repo_audit2_date = $this->input->post('repo_audit2_date');
        $this->repo_state = $this->input->post('repo_state');
        $this->repo_college = $this->input->post('repo_college');
        $this->repo_count = $this->input->post('repo_count');
        
       

        $id = $this->repo_id;
        if ($id == 0) {
            $this->db->insert('report', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('report', $this, array('repo_id' => $this->repo_id));
        }
        return $id;
    }
    
    function saveInfoByArr($array) {
    	$this->repo_id = $array->repo_id;
    	$this->repo_cour_no = $array->repo_cour_no;
    	$this->repo_cour_num = $array->repo_cour_num;
    	$this->repo_cour_term = $array->repo_cour_term;
    	$this->repo_cour_name = $array->repo_cour_name;
    
    	$this->repo_title = $array->repo_title;
    	$this->repo_time = $array->repo_time;
    	$this->repo_content = $array->repo_content;
    	$this->repo_keywords = $array->repo_keywords;
    
    	$this->repo_auther_id = $array->repo_auther_id;
    	$this->repo_auther = $array->repo_auther;
    	$this->repo_auditer1_id = $array->repo_auditer1_id;
    	$this->repo_auditer1 = $array->repo_auditer1;
    	$this->repo_audit1 = $array->repo_audit1;
    	$this->repo_audit1_content = $array->repo_audit1_content;
    	$this->repo_audit1_date = $array->repo_audit1_date;
    	$this->repo_auditer2_id = $array->repo_auditer2_id;
    	$this->repo_auditer2 = $array->repo_auditer2;
    	$this->repo_audit2 = $array->repo_audit2;
    	$this->repo_audit2_content = $array->repo_audit2_content;
    	$this->repo_audit2_date = $array->repo_audit2_date;
    	$this->repo_state = $array->repo_state;
    	$this->repo_college = $array->repo_college;
    	$this->repo_count = $array->repo_count;
    
    	 
    
    	$id = $this->repo_id;
    	if ($id == 0) {
    		$this->db->insert('report', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('report', $this, array('repo_id' => $this->repo_id));
    	}
    	return $id;
    }

    function getReport($array) {
        $this->db->select();
        $this->db->from('report');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getReports($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        //$this->db->order_by("repo_auditer_id","asc");
        //$this->db->order_by("repo_time","desc");
        $q = $this->db->get('report', $per_page, $offset);
        return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('report');   	
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    


   

    function getReportById($id) {
        $this->db->select();
        $this->db->from('report');
        $this->db->where('repo_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    
    function updateReport($id, $array) {
        $this->db->where('repo_id', $id);
        $this->db->update('report', $array);
    }

    function deleteReport($id) {
        $this->db->where('repo_id', $id);
        $this->db->delete('report');
    }

    

}

?>
