<?php

class m_score extends CI_Model {

    var $scor_id = '';
    var $scro_elec_id = '';
    var $scor_teac_id = '';
    var $scor_teac_name = '';
    var $scor_teac_score = '';
    var $scor_teac_comment = '';
    var $scor_comp_id = '';
    var $scor_comp_name = '';
    var $scor_comp_score = '';
    var $scor_comp_comment = '';

    function saveInfo($stuId) {
        $this->scor_id = $this->input->post('scor_id');
	    $this->scro_elec_id = $this->input->post('scro_elec_id');
	    $this->scor_teac_id = $this->input->post('scor_teac_id');
	    $this->scor_teac_name = $this->input->post('scor_teac_name');
	    $this->scor_teac_score = $this->input->post('scor_teac_score');
	    $this->scor_teac_comment = $this->input->post('scor_teac_comment');
	    $this->scor_comp_id = $this->input->post('scor_comp_id');
	    $this->scor_comp_name = $this->input->post('scor_comp_name');
	    $this->scor_comp_score = $this->input->post('scor_comp_score');
	    $this->scor_comp_comment = $this->input->post('scor_comp_comment');

        $id = $this->scor_id;
        if ($id == 0) {
            $this->db->insert('score', $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('score', $data, array('scor_id' => $this->scor_id));
        }
        return $id;
    }

    function getScore($array) {
        $this->db->select();
        $this->db->from('score');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getScores($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('score', $per_page, $offset);
        return $q->result();
    }
    

    function getScoreById($id) {
        $this->db->select();
        $this->db->from('score');
        $this->db->where('score_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
    	$this->db->from('score');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
   

    function updateScore($id, $array) {
        $this->db->where('score_id', $id);
        $this->db->update('score', $array);
    }

   
    function delete($id) {
        $this->db->where('score_id', $id);
        $this->db->delete('score');
    }
    
    

}

?>
