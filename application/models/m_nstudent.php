<?php

class m_nstudent extends CI_Model {

    //查询所有学生
    function getStu($array){
    	$this->db->select();
    	$this->db->from('ostudent');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //分页显示
    function getStus($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$this->db->order_by('stuId','asc');
    	$q = $this->db->get('ostudent', $per_page, $offset);
    	return $q->result();
    }
    
    //通过学号查询
    function getStuById($teaId) {
        $this->db->select();
        $this->db->from('ostudent');
        $this->db->where('stuId', $teaId);
        $q = $this->db->get();
        return $q->result();
    }
    
    
    
    
    //查询系
    function getMajor($array){
    	$this->db->select('major,class');
    	$this->db->from('ostudent');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	//去重
    	$this->db->distinct();
    	$this->db->order_by("major", "asc");
    	$this->db->order_by("class", "asc");
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //分页显示
    function getMajors($array, $per_page, $offset) {
    	$this->db->select('major,class');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	//去重
    	$this->db->distinct();
    	$this->db->order_by("major", "asc");
    	$this->db->order_by("class", "asc");
    	$q = $this->db->get('ostudent', $per_page, $offset);
    	return $q->result();
    }
    
    //查询班
    function getClass($array){
    	$this->db->select('class');
    	$this->db->from('ostudent');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	//去重
    	$this->db->distinct();
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //分页显示
    function getClasses($array, $per_page, $offset) {
    	$this->db->select('class');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	//姓名拼音排序（UTF8->GBK）
    	$this->db->order_by("convert(class using gbk)","asc");
    	//去重
    	$this->db->distinct();
    	
    	$q = $this->db->get('ostudent', $per_page, $offset);
    	return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('ostudent');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$this->db->distinct();
    	return $this->db->count_all_results();
    }
    
    //按条件获得实习项目条数
    function getNumALL($array) {
    	$this->db->select();
    	$this->db->from('ostudent');
    	$this->db->where($array);
    	$this->db->distinct();
    	return $this->db->count_all_results();
    }
    
    



}
?>

