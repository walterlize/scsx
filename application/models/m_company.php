<?php

class m_company extends CI_Model {

    var $comp_id = '';
    var $comp_name = '';
    var $comp_user_id = '';
    var $comp_address = '';
    var $comp_url='';
    var $comp_content='';
    var $comp_plan='';
    var $comp_stat_id='';
    var $comp_coll_id='';
    var $comp_coll_name='';
    var $comp_teacher='';
    var $comp_add_num = '';
    var $comp_add_type = '';
    var $comp_audit_num = '';

    function saveInfo() {
        $this->comp_id = $this->input->post('comp_id');
	    $this->comp_name = $this->input->post('comp_name');
	    $this->comp_user_id = $this->input->post('comp_user_id');
	    $this->comp_address = $this->input->post('comp_address');
	    $this->comp_url = $this->input->post('comp_url');
	    $this->comp_content = $this->input->post('comp_content');
	    $this->comp_plan = $this->input->post('comp_plan');
	    $this->comp_stat_id = $this->input->post('comp_stat_id');
	    $this->comp_coll_id = $this->session->userdata('collegeId');
	    $this->comp_coll_name = $this->session->userdata('collegeName');
	    $this->comp_teacher = $this->input->post('comp_teacher');
	    $this->comp_add_num = $this->session->userdata('u_num');
	    $this->comp_add_type = $this->session->userdata('roleId');
	    $this->comp_audit_num = $this->input->post('comp_audit_num');

        $id = $this->comp_id;
        if ($id == 0) {
            $this->db->insert('company', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('company', $this, array('comp_id' => $this->comp_id));
        }
        return $id;
    }
    
    function saveInfoByStu($user_id) {
    	if(!$user_id)$user_id=0;
    	$this->comp_id = $this->input->post('comp_id');
    	$this->comp_name = $this->input->post('comp_name');
    	$this->comp_user_id = $user_id;
    	$this->comp_address = $this->input->post('comp_address');
    	$this->comp_url = $this->input->post('comp_url');
    	$this->comp_content = $this->input->post('comp_content');
    	$this->comp_plan = $this->input->post('comp_plan');
    	$this->comp_stat_id = 5;
    	$this->comp_coll_id = $this->session->userdata('collegeId');
    	$this->comp_coll_name = $this->session->userdata('college');
    	$this->comp_teacher = '';
    	$this->comp_add_num = $this->session->userdata('u_num');
    	$this->comp_add_type = $this->session->userdata('roleId');
    	$this->comp_audit_num = $this->input->post('comp_audit_num');
    
    	$id = $this->comp_id;
    	if ($id == 0) {
    		$this->db->insert('company', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('company', $this, array('comp_id' => $this->comp_id));
    	}
    	return $id;
    }
    
    function saveInfoByTea($user_id) {
    	if(!$user_id)$user_id=0;
    	$this->comp_id = $this->input->post('comp_id');
    	$this->comp_name = $this->input->post('comp_name');
    	$this->comp_user_id = $user_id;
    	$this->comp_address = $this->input->post('comp_address');
    	$this->comp_url = $this->input->post('comp_url');
    	$this->comp_content = $this->input->post('comp_content');
    	$this->comp_plan = $this->input->post('comp_plan');
    	$this->comp_stat_id = 6;
    	$this->comp_coll_id = $this->session->userdata('collegeId');
    	$this->comp_coll_name = $this->session->userdata('college');
    	$this->comp_teacher = '';
    	$this->comp_add_num = $this->session->userdata('u_num');
    	$this->comp_add_type = $this->session->userdata('roleId');
    	$this->comp_audit_num = $this->session->userdata('u_num');
    
    	$id = $this->comp_id;
    	if ($id == 0) {
    		$this->db->insert('company', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('company', $this, array('comp_id' => $this->comp_id));
    	}
    	return $id;
    }

    function getCompany($array) {
        $this->db->select();
        $this->db->from('ws_comp_user');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
  
    function getCompanys($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('ws_comp_user', $per_page, $offset);
        return $q->result();
    }
    
    
    function getNum($array) {
        $this->db->select();
        $this->db->from('ws_comp_user');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    
    function getCompanysByCol($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	$this->db->where($array);
    	$q = $this->db->get('ws_comp_user', $per_page, $offset);
    	return $q->result();
    }
    function getNumByCol($array) {
    	$this->db->select();
    	$this->db->from('ws_comp_user');
    	$this->db->where('collegeId',$this->session->userdata('collegeId'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    function getCompanysById($id) {
    	$this->db->select();
    	$this->db->from('ws_comp_user');
    	$this->db->where('comp_id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    function updateCompany($id, $array) {
        $this->db->where('comp_id', $id);
        $this->db->update('company', $array);
    }

    function deleteCompany($id) {
        $this->db->where('comp_id', $id);
        $this->db->delete('company');
    }

}

?>
