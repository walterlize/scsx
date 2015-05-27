<?php

class m_ncompanys extends CI_Model {

    function getNCompanys($array) {
        $this->db->select();
        $this->db->from('ws_companys');
        $this->db->where($array);
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        $q = $this->db->get();
        return $q->result();
    }

    //审核通过
    function getNCompany_a($array) {
    	$this->db->select();
    	$this->db->from('ws_companys');
    	$this->db->where('stateId','5');
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	$q = $this->db->get();
    	return $q->result();
    }
    //待审核或审核未通过
    function getNCompany_f($array) {
    	$this->db->select();
    	$this->db->from('ws_companys');
    	
    	//$this->db->where(array('stateId'=>'6'));
    	//$this->db->or_where(array('stateId'=>'7'));
    	//$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	$collegeId = $this->session->userdata('collegeId');
    	$where = "(stateId = '6' or stateId = '7') AND (collegeId = ".$collegeId.")";
    	$this->db->where($where);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    function getNCompanyById($id) {
        $this->db->select();
        $this->db->from('ws_companys');
        $this->db->where('comId', $id);
        $q = $this->db->get();
        return $q->result();
    }
    
    //分页显示
    function getNCompanys_a($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	$this->db->where('stateId','5');
    	$this->db->where($array);
    	$q = $this->db->get('ws_companys', $per_page, $offset);
    	return $q->result();
    }
    
    function getNCompanys_f($array, $per_page, $offset) {
    	$this->db->select();
    	
    	$collegeId = $this->session->userdata('collegeId');
    	$where = "(stateId = '6' or stateId = '7') AND (collegeId = ".$collegeId.")";
    	$this->db->where($where);
    	$this->db->where($array);
    	$q = $this->db->get('ws_companys', $per_page, $offset);
    	return $q->result();
    }
    
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('ws_companys');
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	return $this->db->count_all_results();
    }
    
    function getNum_a($array) {
    	$this->db->select();
    	$this->db->from('ws_companys');
    	$this->db->where(array('stateId'=>'5'));
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	return $this->db->count_all_results();
    }
    function getNum_f($array) {
    	$this->db->select();
    	$this->db->from('ws_companys');
    	$collegeId = $this->session->userdata('collegeId');
    	$where = "(stateId = '6' or stateId = '7') AND (collegeId = ".$collegeId.")";
    	$this->db->where($where);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }

    
    //审核通过
    function getNCompany_ao($array) {
    	$this->db->select();
    	$this->db->from('ws_companys');
    	$this->db->where('stateId','5');
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	//拼音排序（UTF8->GBK）
    	$this->db->order_by("convert(comName using gbk)","asc");
    	$q = $this->db->get();
    	return $q->result();
    }
    


}
?>
