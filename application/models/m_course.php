<?php

class m_course extends CI_Model {

    var $cour_id = '';
    var $cour_no = '';
    var $cour_num = '';
    var $cour_term = '';
    var $cour_coll_id = '';
    var $cour_coll_name = '';
    var $cour_name = '';
    var $cour_name_en = '';
    var $cour_credit = '';
    var $cour_hours = '';
    var $cour_class = '';
    var $cour_teac_num = '';
    var $cour_teac_name = '';
    var $cour_mode = '';
    var $cour_time = '';
    var $cour_place = '';
    var $cour_week = '';
    var $cour_pattern_id = '';
    var $cour_publish = '';
    
    function saveInfo() {
    	$this->cour_id = $this->input->post('cour_id');
	    $this->cour_no = $this->input->post('cour_no');
	    $this->cour_num = $this->input->post('cour_num');
	    $this->cour_term = $this->input->post('cour_term');
	    $this->cour_coll_id = $this->input->post('cour_coll_id');
	    $this->cour_coll_name = $this->input->post('cour_coll_name');
	    $this->cour_name = $this->input->post('cour_name');
	    $this->cour_name_en = $this->input->post('cour_name_en');
	    $this->cour_credit = $this->input->post('cour_credit');
	    $this->cour_hours = $this->input->post('cour_hours');
	    $this->cour_class = $this->input->post('cour_class');
	    $this->cour_teac_num = $this->input->post('cour_teac_num');
	    $this->cour_teac_name = $this->input->post('cour_teac_name');
	    $this->cour_mode = $this->input->post('cour_mode');
	    $this->cour_time = $this->input->post('cour_time');
	    $this->cour_place = $this->input->post('cour_place');
	    $this->cour_week = $this->input->post('cour_week');
	    $this->cour_pattern_id = $this->input->post('cour_pattern_id');
	    $this->cour_publish = 0;
    
    	$id = $this->cour_id;
    	if ($id == 0) {
    		$this->db->insert('coursep', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('coursep', $this, array('cour_id' => $this->cour_id));
    	}
    	return $id;
    }

    //按ID查找实习项目（课程）
    function getCourseById($id) {
    	$this->db->select();
    	$this->db->from('coursep');
    	$this->db->where('cour_id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    //按条件查找实习项目（课程）
    function getCourse($array) {
        $this->db->select();
        $this->db->from('coursep');
        $this->db->where('cour_coll_name',$this->session->userdata('college'));
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('coursep');
    	$this->db->where('cour_coll_name',$this->session->userdata('college'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getCourses($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('cour_coll_name',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('coursep', $per_page, $offset);
    	return $q->result();
    }

    //更新实习项目（自选，志愿，分配）
    function updateCourse($id, $array) {
        $this->db->where('cour_id', $id);
        $this->db->update('coursep', $array);
        return $this->db->affected_rows();
    }
    
    
    //按ID查找实习项目（课程）
    function getCourseById_ws($id) {
    	$this->db->select();
    	$this->db->from('ws_coursep');
    	$this->db->where('cour_id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //按条件查找实习项目（课程）
    function getCourse_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_coursep');
    	$this->db->where('cour_coll_name',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_coursep');
    	$this->db->where('cour_coll_name',$this->session->userdata('college'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    //分页查询视图
    function getCourses_ws($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('cour_coll_name',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('ws_coursep', $per_page, $offset);
    	return $q->result();
    }
    
    //按条件获得实习项目条数分配式 志愿式
    function getNum1_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_coursep');
    	$college = $this->session->userdata('college');
    	$where = "(patternId = '1' or patternId = '3') AND (cour_coll_name = '".$college."')";
    	$this->db->where($where);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    //分页查询视图
    function getCourses1_ws($array ,$per_page, $offset) {
    	$this->db->select();
    	$college = $this->session->userdata('college');
    	$where = "(cour_patt_id = '1' or cour_patt_id = '3') AND (cour_coll_name = '".$college."')";
    	$this->db->where($where);
    	$this->db->where($array);
    	$q = $this->db->get('ws_coursep', $per_page, $offset);
    	return $q->result();
    }
    //查询视图
    function getCourse1_ws($array) {
    	$this->db->select();
    	$college = $this->session->userdata('college');
    	$where = "(cour_patt_id = '1' or cour_patt_id = '3') AND (cour_coll_name = '".$college."')";
    	$this->db->where($where);
    	$this->db->where($array);
    	$q = $this->db->get('ws_coursep');
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNumALL($array) {
    	$this->db->select();
    	$this->db->from('coursep');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    function deleteCourse($id) {
    	$this->db->where('cour_id', $id);
    	$this->db->delete('coursep');
    }
    

}
?>

