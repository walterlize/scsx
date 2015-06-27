<?php

class m_nvariable extends CI_Model {

    var $table = "ovariable";

    //按ID查找选课结果
    function getNvariableById($id) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where('id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    //按条件查找选课结果
    function getNvariable($array) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    //按条件获得实习项目条数
    function getNumByCol($array) {
    	$this->db->select();
    	$this->db->where('XSM',$this->session->userdata('college'));
    	$this->db->from($this->table);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页查询
    function getNvariables($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get($this->table, $per_page, $offset);
    	return $q->result();
    }
    
    //分页查询
    function getNvariablesByCol($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('XSM',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get($this->table, $per_page, $offset);
    	return $q->result();
    }


    //按条件查找选课结果
    function getClass($array) {
    	$this->db->select('stuClass,stuMajor');
    	$this->db->from($this->table);
    	
    	$this->db->order_by("convert(stuClass using gbk)","asc");
    	$this->db->where($array);
    	$this->db->distinct();
    	$q = $this->db->get();
    	return $q->result();
    }
    
    
    
    
}
?>

