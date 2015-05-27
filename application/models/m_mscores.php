<?php

class m_mscores extends CI_Model {

    var $s_id = '';
    var $y_id = '';
    var $stuId = '';
    var $score = '';
    var $comment = '';
    var $course_id = '';
    var $courseId = '';
    var $courseNum = '';

    function saveInfo($stuId) {
        $this->s_id = $this->input->post('s_id');
        $this->y_id = $this->session->userdata('u_id');
        $this->stuId = $stuId;
        $this->score = $this->input->post('score');
        $this->comment = $this->input->post('comment');
        $this->course_id = $this->input->post('course_id');
        $this->courseId = $this->input->post('courseId');
        $this->courseNum = $this->input->post('courseNum');
        
        
        
        $id = $this->s_id;
         $data = array(
            's_id' => $this->s_id,
            'y_id' => $this->y_id,
            'stuId' => $this->stuId,
            'score' => $this->score,
            'comment' => $this->comment, 
         	'course_id'=>$this->course_id,
        	'courseId'=>$this->courseId,
        	'courseNum'=>$this->courseNum
        );
        if ($id == 0) {
            $this->db->insert('mscore', $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('mscore', $data, array('s_id' => $this->s_id));
        }
        return $id;
    }
    

    
    function getMscore($array) {
        $this->db->select();
        $this->db->from('mscore');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getMscores1($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('u_id', $this->session->userdata('u_id'));
        $this->db->where("stateId",3);
        $this->db->order_by("b_id", "asc");
        $q = $this->db->get('ws_chakan1', $per_page, $offset);
        return $q->result();
    }

    
    function sgetMscores($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('y_id', $this->session->userdata('u_id'));
        $this->db->order_by("s_id", "asc");
        $q = $this->db->get('mscore', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo1($id) {
        $this->db->select();
        $this->db->from('ws_chakan1');
        $this->db->where('b_id', $id);
        $this->db->where("stateId",3);
        $q = $this->db->get();
        return $q->result();
    }

    
    function sgetOneInfo($id) {
        $this->db->select();
        $this->db->from('mscore');
        $this->db->where('s_id', $id);
        $q = $this->db->get();
        return $q->result();
    }


    function getNum1($array) {
        $this->db->select();
        $this->db->where('yu_id', $this->session->userdata('u_id'));
        $this->db->where("stateId",3);
        $this->db->where("ystateId",0);
        $this->db->from('ws_baoming');
        return $this->db->count_all_results();
    }
    
    function getNum2($array) {
        $this->db->where('y_id', $this->session->userdata('u_id'));
        $this->db->from('ws_mscore');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    function getNum3($array) {
        $this->db->select();
        $this->db->where('yu_id', $this->session->userdata('u_id'));
        $this->db->where("stateId",3);
        $this->db->from('ws_baoming');
        return $this->db->count_all_results();
    }


    function updateScoreinfo($id, $array) {
        $this->db->where('s_id', $id);
        $this->db->update('mscore', $array);
    }

    function updateScore($id, $array) {
        $this->db->where('s_id', $id);
        $this->db->update('mscore', $array);
    }

    function delete($id) {
        $this->db->where('s_id', $id);
        $this->db->delete('mscore');
    }

}

?>
