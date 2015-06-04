<?php
//基地选择
class m_elecom extends CI_Model {

    var $elco_id = '';
    var $elco_cour_no = '';
    var $elco_cour_num = '';
    var $elco_cour_term = '';
    var $elco_stu_num = '';
    var $elco_comp_id = '';
    var $elco_state = '';
    
    
    function saveInfo() {
    	$this->elco_id = $this->input->post('elco_id');
	    $this->elco_cour_no = $this->input->post('elco_cour_no');
	    $this->elco_cour_num = $this->input->post('elco_cour_num');
	    $this->elco_cour_term = $this->input->post('elco_cour_term');
	    $this->elco_stu_num = $this->input->post('elco_stu_num');
	    $this->elco_comp_id = $this->input->post('elco_comp_id');
	    $this->elco_state = $this->input->post('elco_state');
    
    	$id = $this->elco_id;
    	if ($id == 0) {
    		$this->db->insert('elecom', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('elecom', $this, array('elco_id' => $this->elco_id));
    	}
    	return $id;
    }
    
    function saveInfoByArr($array) {
    	$this->elco_id = $array->elco_id;
    	$this->elco_cour_no = $array->elco_cour_no;
    	$this->elco_cour_num = $array->elco_cour_num;
    	$this->elco_cour_term = $array->elco_cour_term;
    	$this->elco_stu_num = $array->elco_stu_num;
    	$this->elco_comp_id = $array->elco_comp_id;
    	$this->elco_state = $array->elco_state;
    	
    
    	$id = $this->elco_id;
    	
    	if ($id == 0) {
    		$this->db->insert('elecom', $this);
    		$id = $this->db->insert_id();
    	} else {
    		$this->db->update('elecom', $this, array('elco_id' => $this->elco_id));
    	}
    	
    	return $id;
    }

    //按ID查找
    function getElecomById($id) {
    	$this->db->select();
    	$this->db->from('elecom');
    	$this->db->where('elco_id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }

    //按条件查找
    function getElecom($array) {
        $this->db->select();
        $this->db->from('elecom');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$this->db->select();
    	$this->db->from('elecom');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    
    //分页查询
    function getElecoms($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get('elecom', $per_page, $offset);
    	return $q->result();
    }
    

    //更新
    function updateElecom($id, $array) {
        $this->db->where('elco_id', $id);
        $this->db->update('elecom', $array);
        return $this->db->affected_rows();
    }
    
    function deleteCoucom($id) {
    	$this->db->where('elco_id', $id);
    	$this->db->delete('elecom');
    }
    
    //按条件查找
    function getElecom_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_elecom');
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    

}
?>

