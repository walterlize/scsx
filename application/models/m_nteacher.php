<?php

class m_nteacher extends CI_Model {

    //查询所有教师
    function getTea($array){
    	$this->db->select();
    	$this->db->from('oteacher');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //分页显示
    function getTeas($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get('oteacher', $per_page, $offset);
    	return $q->result();
    }
    
    //通过教师号查询
    function getTeaById($teaId) {
        $this->db->select();
        $this->db->from('oteacher');
        $this->db->where('teaId', $teaId);
        $q = $this->db->get();
        return $q->result();
    }
    
    function getNum($array){
    	$this->db->select();
    	$this->db->from('oteacher');
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    function getNumALL($array){
    	$this->db->select();
    	$this->db->from('oteacher');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页显示
    function getTeasALL($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get('oteacher', $per_page, $offset);
    	return $q->result();
    }


}
?>

