<?php

class m_summary extends CI_Model {

    var $summ_id = '';
    var $summ_miss_id = '';
    var $summ_content = '';
    var $summ_time = '';
    var $summ_stu_num = '';
    var $summ_appr_id = '';
    var $summ_appr_time = '';
    var $summ_result = '';

    function saveInfo() {
        $this->summ_id = $this->input->post('summ_id');
        $this->summ_miss_id = $this->input->post('summ_miss_id');
        $this->summ_content = $this->input->post('summ_content');
        $this->summ_stu_num = $this->input->post('summ_stu_num');
        $this->summ_appr_id = $this->input->post('summ_appr_id');
        $this->summ_appr_time = $this->input->post('summ_appr_time');
        $this->summ_time = $this->input->post('summ_time');
        $this->summ_result = $this->input->post('summ_result');

        $id = $this->summ_id;
        if ($id == 0) {
            $this->db->insert('summary', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('summary', $this, array('summ_id' => $this->summ_id));
        }
        return $id;
    }

    function getSummary($array) {
        $this->db->select();
        $this->db->from('summary');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getSummarys($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        //$this->db->order_by("summ_id", "asc");
        $q = $this->db->get('summary', $per_page, $offset);
        return $q->result();
    }
    

    function getSummaryById($id) {
        $this->db->select();
        $this->db->from('summary');
        $this->db->where('summ_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('summary');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    

    function updateSummary($id, $array) {
        $this->db->where('summ_id', $id);
        $this->db->update('summary', $array);
    }

    function deleteSummary($id) {
        $this->db->where('summ_id', $id);
        $this->db->delete('summary');
    }
    
    function getSummarys_ws($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$this->db->order_by("miss_cour_no", "asc");
    	$this->db->order_by("miss_cour_num", "asc");
    	$q = $this->db->get('ws_summary', $per_page, $offset);
    	return $q->result();
    }
    
    function getSummary_ws($array) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get('ws_summary');
    	return $q->result();
    }
    function getNum_ws($array) {
    	$this->db->from('ws_summary');
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    function getSummaryById_ws($id) {
    	$this->db->select();
    	$this->db->from('ws_summary');
    	$this->db->where('summ_id', $id);
    	$q = $this->db->get();
    	return $q->result();
    }

}

?>
