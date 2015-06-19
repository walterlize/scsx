<?php

class m_ncourse extends CI_Model {

    var $id = '';
    var $courseId = '';
    var $courseNum = '';
    var $courseName = '';
    var $courseNameEn = '';
    var $courseCredit = '';
    var $courseHour = '';
    var $courseTeaId = '';
    var $courseTeaName = '';
    var $courseClass = '';
    var $courseType = '';
    var $courseTime = '';
    var $coursePlace = '';
    var $courseWeekly = '';
    var $college = '';
    var $term = '';
    var $patternId = '';
    

    //按ID查找实习项目（课程）
    function getNcourseById($id) {
    	$this->db->select();
    	$this->db->from('ocourse');
    	$this->db->where('id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    //按条件查找实习项目（课程）
    function getNcourse($array) {
        $this->db->select();
        $this->db->from('ocourse');
        //$this->db->where('college',$this->session->userdata('college'));
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    
    //按条件查找实习项目（课程）
    function getNcourseByCol($array) {
    	$this->db->select();
    	$this->db->from('ocourse');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('ocourse');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //按条件获得实习项目条数
    function getNumByCol($array) {
    	$this->db->select();
    	$this->db->from('ocourse');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    
    //分页查询
    function getNcourses($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('ocourse', $per_page, $offset);
    	return $q->result();
    }

    //更新实习项目（自选，志愿，分配）
    function updateNcourse($id, $array) {
        $this->db->where('id', $id);
        $this->db->update('ocourse', $array);
        return $this->db->affected_rows();
    }
    
    
    //按条件获得实习项目条数
    function getNumALL($array) {
    	$this->db->select();
    	$this->db->from('ocourse');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    

}
?>

