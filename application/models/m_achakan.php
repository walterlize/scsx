<?php

class m_achakan extends CI_Model {

    var $b_id = '';
    var $c_id = '';
    var $comId = '';
    var $comName = '';
    var $content = '';
    var $plan = '';
    var $tu_id = '';
    var $tu_name = '';
    var $trname = '';
    var $tphone = '';
    var $temail = '';
    var $taddress = '';
    var $class = '';
    var $stateId = '';
    var $state = '';
    var $pstateId = '';
    var $ystateId = '';
    var $stuId = '';
    var $stu_name = '';
    var $sturealname = '';
    var $stuphone = '';
    var $stuemail = '';
    var $stuaddress = '';
    var $stusex = '';
    var $stuclass = '';
    var $stucollege = '';
    var $ustate = '';
    var $department = '';
    var $tuserId = '';
    var $yu_id = '';
    var $wstateId = '';
    var $p_id = '';
    var $yu_name = '';
    var $yrealname = '';
    var $yphone = '';
    var $yemail = '';
    var $yaddress = '';
    var $wstate = '';
    var $p_name = '';
    var $patternId = '';
    var $depart = '';
    var $pattern = '';
    var $ycollegeId = '';
    var $ysex = '';
    var $classId = '';
    var $tsex = '';
    var $ustateId = '';
    var $collegeId = '';
    var $trealname = '';


    
    function getAchakans($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('stuId', $this->session->userdata('u_name'));
        $this->db->where($array);
        $this->db->order_by("b_id", "asc");
        $q = $this->db->get('ws_chakan1', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_chakan1');
        $this->db->where('b_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->where('stuId', $this->session->userdata('u_name'));
        $this->db->from('ws_chakan1');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
     function getExist($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->from('ws_chakan1');
        $q = $this->db->get();
        return $q->result();
    }
}

?>
