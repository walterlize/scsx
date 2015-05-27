<?php

class m_ncompany extends CI_Model {

    var $comId = '';
    var $comName = '';
    var $address = '';
    var $url = '';
    var $content = '';
    var $plan = '';
    var $u_id='';
    var $u_name='';
    var $stateId='';
    var $p_id='';
    var $collegeId = '';
    var $addId = '';
    var $addType='';

    function saveInfo() {
        $this->comId = $this->input->post('comId');
        $this->comName = $this->input->post('comName');
        $this->address = $this->input->post('address');
        $this->url = $this->input->post('url');
        $this->content = $this->input->post('content');
        $this->plan = $this->input->post('plan');
        $this->u_id = $this->input->post('u_id');
        $this->u_name = $this->input->post('u_name');
        $this->stateId = $this->input->post('stateId');
        //$this->p_id = $this->input->post('p_id');
        $this->p_id = '';
        $this->collegeId = $this->session->userdata('collegeId');
        $this->addId = $this->session->userdata('u_name');
        $this->addType = $this->input->post('addType');

        $id = $this->comId;
        if ($id == 0) {
            $this->db->insert('company', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('company', $this, array('comId' => $this->comId));
        }
        return $id;
    }
    

    function getNCompany($array) {
        $this->db->select();
        $this->db->from('company');
        $this->db->where($array);
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        $q = $this->db->get();
        return $q->result();
    }
    
    
    
    
    function updateNCompany($id, $array) {
    	$this->db->where('comId', $id);
    	$this->db->update('company', $array);
    }
    
    function delete($id) {
    	$this->db->where('comId', $id);
    	$this->db->delete('company');
    }
    //审核通过
    function getNCompany_a($array) {
    	$this->db->select();
    	$this->db->from('company');
    	$this->db->where('stateId','5');
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	$q = $this->db->get();
    	return $q->result();
    }
    //待审核或审核未通过
    function getNCompany_f($array) {
    	$this->db->select();
    	$this->db->from('company');
    	
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
        $this->db->from('company');
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
    	$q = $this->db->get('company', $per_page, $offset);
    	return $q->result();
    }
    
    function getNCompanys_f($array, $per_page, $offset) {
    	$this->db->select();
    	
    	$collegeId = $this->session->userdata('collegeId');
    	$where = "(stateId = '6' or stateId = '7') AND (collegeId = ".$collegeId.")";
    	$this->db->where($where);
    	$this->db->where($array);
    	$q = $this->db->get('company', $per_page, $offset);
    	return $q->result();
    }
    
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('company');
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	return $this->db->count_all_results();
    }
    
    function getNum_a($array) {
    	$this->db->select();
    	$this->db->from('company');
    	$this->db->where(array('stateId'=>'5'));
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	return $this->db->count_all_results();
    }
    function getNum_f($array) {
    	$this->db->select();
    	$this->db->from('company');
    	$collegeId = $this->session->userdata('collegeId');
    	$where = "(stateId = '6' or stateId = '7') AND (collegeId = ".$collegeId.")";
    	$this->db->where($where);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }

    
    //审核通过
    function getNCompany_ao($array) {
    	$this->db->select();
    	$this->db->from('company');
    	$this->db->where('stateId','5');
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	//拼音排序（UTF8->GBK）
    	$this->db->order_by("convert(comName using gbk)","asc");
    	$q = $this->db->get();
    	return $q->result();
    }
    


}
?>
