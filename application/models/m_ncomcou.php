<?php

class m_ncomcou extends CI_Model {

    var $id = '';
    var $comId = '';
    var $course_id = '';
    var $courseId = '';
    var $courseNum = '';
    
    
    function saveInfo() {
    	$this->id = $this->input->post('id');
    	$this->comId = $this->input->post('comId');
    	$this->course_id = $this->input->post('course_id');
    	$this->courseId = $this->input->post('courseId');
    	$this->courseNum = $this->input->post('courseNum');
    	
    
    	$id = $this->id;
    	if ($id == 0) {
    		$this->db->insert('com_cou', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('com_cou', $this, array('id' => $this->id));
    	}
    	return $id;
    }
    
    function saveInfo1($comId) {
    	$this->id = $this->input->post('comcou_id');
    	$this->comId = $comId;
    	$this->course_id = $this->input->post('course_id');
    	$this->courseId = $this->input->post('courseId');
    	$this->courseNum = $this->input->post('courseNum');
    	 
    
    	$id = $this->id;
    	if ($id == 0) {
    		$this->db->insert('com_cou', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('com_cou', $this, array('id' => $this->id));
    	}
    	return $id;
    }
    

    //按ID查找实习项目（课程）
    function getNcomcouById($id) {
    	$this->db->select();
    	$this->db->from('com_cou');
    	$this->db->where('id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    //按条件查找实习项目（课程）
    function getNcomcou($array) {
        $this->db->select();
        $this->db->from('com_cou');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('com_cou');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getNcomcous($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get('com_cou', $per_page, $offset);
    	return $q->result();
    }

    //更新
    function updateNcomcou($id, $array) {
        $this->db->where('id', $id);
        $this->db->update('com_cou', $array);
        return $this->db->affected_rows();
    }
    
    
    
    
    
    //按ID查找实习项目（课程）
    function getNcomcouById_ws($id) {
    	$this->db->select();
    	$this->db->from('ws_com_cou');
    	$this->db->where('id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //按条件查找实习项目（课程）
    function getNcomcou_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_com_cou');
    	$this->db->where($array);
    	$this->db->where('college',$this->session->userdata('college'));
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_com_cou');
    	$this->db->where($array);
    	$this->db->where('college',$this->session->userdata('college'));
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getNcomcous_ws($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$this->db->where('college',$this->session->userdata('college'));
    	$q = $this->db->get('ws_com_cou', $per_page, $offset);
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum1_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_com_cou');
    	$this->db->where($array);
    	$this->db->where('college',$this->session->userdata('college'));
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getNcomcous1_ws($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$this->db->where('college',$this->session->userdata('college'));
    	$q = $this->db->get('ws_com_cou', $per_page, $offset);
    	return $q->result();
    }
    
    
    

}
?>

