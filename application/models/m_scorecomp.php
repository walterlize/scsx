<?php

class m_scorecomp extends CI_Model {

    var $scor_id = '';
    var $scor_cour_id = '';
    var $scor_stu_num = '';
    var $scor_stu_name = '';
    var $scor_stu_class = '';
    
    var $scor_comp_id = '';
    var $scor_comp_name = '';
    var $scor_comp_score = '';
    var $scor_comp_comment = '';

    function saveInfo($stuId) {
        $this->scor_id = $this->input->post('scor_id');
	    $this->scor_cour_id = $this->input->post('scor_cour_id');
	    $this->scor_stu_num = $this->input->post('scor_stu_num');
	    $this->scor_stu_name = $this->input->post('scor_stu_name');
	    $this->scor_stu_class = $this->input->post('scor_stu_class');
	    
	    $this->scor_comp_id = $this->input->post('scor_comp_id');
	    $this->scor_comp_name = $this->input->post('scor_comp_name');
	    $this->scor_comp_score = $this->input->post('scor_comp_score');
	    $this->scor_comp_comment = $this->input->post('scor_comp_comment');

        $id = $this->scor_id;
        if ($id == 0) {
            $this->db->insert('scorecomp', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('scorecomp', $this, array('scor_id' => $this->scor_id));
        }
        return $id;
    }

    function getScore($array) {
        $this->db->select();
        $this->db->from('scorecomp');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getScores($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('scorecomp', $per_page, $offset);
        return $q->result();
    }
    

    function getScoreById($id) {
        $this->db->select();
        $this->db->from('scorecomp');
        $this->db->where('scor_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
    	$this->db->from('scorecomp');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
   

    function updateScore($id, $array) {
        $this->db->where('scor_id', $id);
        $this->db->update('scorecomp', $array);
    }

   
    function delete($id) {
        $this->db->where('scor_id', $id);
        $this->db->delete('scorecomp');
    }
    
    

}

?>
