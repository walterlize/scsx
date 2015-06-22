<?php

class m_mission extends CI_Model {

    var $miss_id = '';
    var $miss_cour_id = '';
    var $miss_teac_num = '';
    var $miss_teac_name = '';
    var $miss_title = '';
    var $miss_content = '';
    var $miss_start_time = '';
    var $miss_end_time = '';
    

    function saveInfo() {
        $this->miss_id = $this->input->post('miss_id');
        $this->miss_cour_id = $this->input->post('miss_cour_id');
        $this->miss_teac_num = $this->session->userdata('u_num');
        $this->miss_teac_name = $this->session->userdata('realname');
        $this->miss_title = $this->input->post('miss_title');
        $this->miss_content = $this->input->post('miss_content');
        $this->miss_start_time= date("Y-m-d");
        $this->miss_end_time= $this->input->post('miss_end_time');
        

        $id = $this->miss_id;
        if ($id == 0) {
            $this->db->insert('mission', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('mission', $this, array('miss_id' => $this->miss_id));
        }
        return $id;
    }

    function getMission($array) {
        $this->db->select();
        $this->db->from('mission');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getMissions($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("miss_id", "asc");
        $q = $this->db->get('mission', $per_page, $offset);
        return $q->result();
    }

    function getMissionById($id) {
        $this->db->select();
        $this->db->from('mission');
        $this->db->where('miss_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('mission');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateMission($id, $array) {
        $this->db->where('miss_id', $id);
        $this->db->update('mission', $array);
    }


    function deleteMission($id) {
        $this->db->where('miss_id', $id);
        $this->db->delete('mission');
    }
    
    function getMissions_ws($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$this->db->order_by("miss_id", "asc");
    	$q = $this->db->get('ws_mission', $per_page, $offset);
    	return $q->result();
    }
    
    function getMissionById_ws($id) {
    	$this->db->select();
    	$this->db->from('ws_mission');
    	$this->db->where('miss_id', $id);
    	$q = $this->db->get();
    	return $q->result();
    }

}

?>
