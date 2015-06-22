<?php

class m_scoreteac extends CI_Model {

    var $scor_id = '';
    var $scor_cour_id = '';
    var $scor_stu_num = '';
    var $scor_stu_name = '';
    var $scor_stu_class = '';
    var $scor_teac_num = '';
    var $scor_teac_name = '';
    var $scor_teac_score = '';
    var $scor_teac_comment = '';
    

    function saveInfo() {
        $this->scor_id = $this->input->post('scor_id');
	    $this->scor_cour_id = $this->input->post('scor_cour_id');
	    $this->scor_stu_num = $this->input->post('scor_stu_num');
	    $this->scor_stu_name = $this->input->post('scor_stu_name');
	    $this->scor_stu_class = $this->input->post('scor_stu_class');
	    $this->scor_teac_num = $this->input->post('scor_teac_num');
	    $this->scor_teac_name = $this->input->post('scor_teac_name');
	    $this->scor_teac_score = $this->input->post('scor_teac_score');
	    $this->scor_teac_comment = $this->input->post('scor_teac_comment');
	    

        $id = $this->scor_id;
        if ($id == 0) {
            $this->db->insert('scoreteac', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('scoreteac', $this, array('scor_id' => $this->scor_id));
        }
        return $id;
    }

    function getScore($array) {
        $this->db->select();
        $this->db->from('scoreteac');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getScores($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('scoreteac', $per_page, $offset);
        return $q->result();
    }
    

    function getScoreById($id) {
        $this->db->select();
        $this->db->from('scoreteac');
        $this->db->where('scor_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
    	$this->db->from('scoreteac');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
   

    function updateScore($id, $array) {
        $this->db->where('scor_id', $id);
        $this->db->update('scoreteac', $array);
    }

   
    function delete($id) {
        $this->db->where('scor_id', $id);
        $this->db->delete('scoreteac');
    }
    
    function getScore_ws($array) {
    	$this->db->select();
    	$this->db->from('ws_scoreteac');
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    

}

?>
