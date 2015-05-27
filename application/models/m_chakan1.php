<?php

class m_chakan1 extends CI_Model {

    var $stuId = '';
    var $mscore = '';
    var $mcomment = '';
    var $y_id = '';
    var $yu_name = '';
    var $yrealname = '';
    var $teaId = '';
    var $tu_name = '';
    var $trealname = '';
    var $score = '';
    var $comment = '';

    function getChakan1s($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('stuId', $this->session->userdata('u_name'));
        $q = $this->db->get('ws_student_score1', $per_page, $offset);
        return $q->result();
    }
    function getChakan1s1($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('stuId', $this->session->userdata('u_name'));
        $this->db->order_by("stuId", "asc");
        $q = $this->db->get('ws_student_score1', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_student_score1');
        $this->db->where('b_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->where('stuId', $this->session->userdata('u_id'));
        $this->db->from('ws_student_score1');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
}

?>
