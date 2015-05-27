<?php

class m_student extends CI_Model {

    var $b_id = '';
    var $c_id = '';
    var $comId = '';
    var $comName = '';
    var $caddress = '';
    var $cphone = '';
    var $cemail = '';
    var $content = '';
    var $plan = '';
    var $tu_id = '';
    var $tu_name = '';
    var $troleId = '';
    var $tpassword = '';
    var $trealname = '';
    var $tphone = '';
    var $temail = '';
    var $taddress = '';
    var $tclass = '';
    var $u_id = '';
    var $u_name = '';
    var $roleId = '';
    var $password = '';
    var $realname = '';
    var $phone = '';
    var $email = '';
    var $address = '';
    var $class = '';
    var $stateId = '';
    var $state = '';

    
    function getStudents1($array, $per_page, $offset) {
        $this->db->select();
        
        $this->db->where('courseTeaId', $this->session->userdata('u_name').'*');
        
        $this->db->where("stateId",3);
        $this->db->order_by("b_id", "asc");
        $q = $this->db->get('ws_chakan1', $per_page, $offset);
        return $q->result();
    }
    
    function getStudents2($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('u_id', $this->session->userdata('u_id'));
        $this->db->where("stateId",5);
        $this->db->order_by("fb_id", "asc");
        $q = $this->db->get('ws_freestudent', $per_page, $offset);
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

    function getNum1($array) {
        $this->db->where('courseTeaId',$this->session->userdata('u_name').'*');
        $this->db->where("stateId",3);
        $this->db->from('ws_chakan1');
        return $this->db->count_all_results();
    }
    function getNum2($array) {
        $this->db->where('u_id', $this->session->userdata('u_id'));
        $this->db->where("stateId",5);
        $this->db->from('ws_freestudent');
        return $this->db->count_all_results();
    }
}

?>
