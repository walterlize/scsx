<?php

class m_score extends CI_Model {

    var $s_id = '';
    var $teaId = '';
    var $stuId = '';
    var $score = '';
    var $comment = '';

    function saveInfo($stuId) {
        $this->s_id = $this->input->post('s_id');
        $this->teaId = $this->session->userdata('u_name');
        $this->stuId = $stuId;
        $this->score = $this->input->post('score');
        $this->comment = $this->input->post('comment');

        $id = $this->s_id;
        $data = array(
            's_id' => $this->s_id,
            'teaId' => $this->teaId,
            'stuId' => $this->stuId,
            'score' => $this->score,
            'comment' => $this->comment
        );
        if ($id == 0) {
            $this->db->insert('score', $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('score', $data, array('s_id' => $this->s_id));
        }
        return $id;
    }

    function updatePstateId($pstateId, $b_id) {
        $this->b_id = $b_id;
        $this->pstateId = $pstateId;
        $id = $this->b_id;
        $data = array(
            'pstateId' => $pstateId
        );

        $this->db->where('b_id', $id);
        $this->db->update('baoming', $data);
    }

    function getScore($array) {
        $this->db->select();
        $this->db->from('ws_summary1');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getScores1($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('courseTeaId', $this->session->userdata('u_name')+"*");
        $this->db->where("stateId",3);
        $this->db->order_by("b_id", "asc");
        $q = $this->db->get('ws_chakan1', $per_page, $offset);
        return $q->result();
    }
    
    function getScores2($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('u_id', $this->session->userdata('u_name')+"*");
        $this->db->where("stateId",5);
        $this->db->order_by("fb_id", "asc");
        $q = $this->db->get('ws_freestudent', $per_page, $offset);
        return $q->result();
    }

    function sgetScores($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('teaId', $this->session->userdata('u_name'));
        $this->db->order_by("s_id", "asc");
        $q = $this->db->get('ws_score1', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo1($id) {
        $this->db->select();
        $this->db->from('ws_chakan1');
        $this->db->where('b_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    function getOneInfo2($id) {
        $this->db->select();
        $this->db->from('ws_freestudent');
        $this->db->where('fb_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function sgetOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_score1');
        $this->db->where('s_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfos($id) {
        $this->db->select();
        $this->db->from('ws_summary1');
        $this->db->where('sumId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum1($array) {
        $this->db->where('courseTeaId', $this->session->userdata('u_name')+"*");
        $this->db->where("stateId", 3);
        $this->db->where("pstateId", 0);
        $this->db->from('ws_chakan1');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    function getNum2($array) {
        $this->db->where('teaId', $this->session->userdata('u_name')+"*");
        $this->db->from('ws_score1');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    function getNum3($array) {
        $this->db->where('courseTeaId', $this->session->userdata('u_name')+"*");
        $this->db->where("stateId",3);
        $this->db->from('ws_chakan1');
        return $this->db->count_all_results();
    }
    function getNum4($array) {
        $this->db->where('u_id', $this->session->userdata('u_name')+"*");
        $this->db->where("stateId",5);
        $this->db->from('ws_freestudent');
        return $this->db->count_all_results();
    }

    function updateScoreinfo($id, $array) {
        $this->db->where('sumId', $id);
        $this->db->update('summary', $array);
    }

    function updateScore($id, $array) {
        $this->db->where('sumId', $id);
        $this->db->update('summary', $array);
    }

    function delete($id) {
        $this->db->where('sumId', $id);
        $this->db->delete('summary');
    }
    
    function getScoreNum($array1,$array2) {
    	$this->db->where($array1);
    	$this->db->where($array2);
    	$this->db->from('ws_score1');
    	return $this->db->count_all_results();
    }

}

?>
