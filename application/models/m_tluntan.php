<?php

class m_tluntan extends CI_Model {

    var $l_id = '';
    var $stuId = '';
    var $stuName ='';
    var $time1 = '';
    var $content = '';
    var $teaId = '';
    var $teaName ='';
    var $time2 = '';
    var $reply = '';
    var $typeId = '';
    var $theme = '';
    var $college = '';

    function saveInfo() {
        $this->l_id = $this->input->post('l_id');
        $this->stuId = $this->input->post('stuId');
        $this->stuName = $this->input->post('stuName');
        $this->time1 = $this->input->post('time1');
        $this->content = $this->input->post('content');

        $this->teaId = $this->session->userdata('u_num');

        $this->teaName = $this->session->userdata('realname');
        $this->time2 = date("Y-m-d H:i:s");
        $this->reply = $this->input->post('reply');
        $this->typeId = $this->input->post('typeId');
        $this->theme = $this->input->post('theme');
        $this->college = $this->session->userdata('college');

        $id = $this->l_id;
        if ($id == 0) {
            $this->db->insert('luntan', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('luntan', $this, array('l_id' => $this->l_id));
        }
        return $id;
    }

    function getLuntan($array) {
        $this->db->select();
        $this->db->from('luntan');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getLuntans($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where('teaId', 0);
        $this->db->order_by("l_id", "asc");
        $q = $this->db->get('ws_luntan_type', $per_page, $offset);
        return $q->result();
    }

    function sgetLuntans($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("l_id", "asc");
        $q = $this->db->get('ws_luntan_type', $per_page, $offset);
        return $q->result();
    }

    function getLuntanss() {
        $this->db->select();
        $this->db->order_by("l_id", "asc");
        $this->db->limit(6);
        $q = $this->db->get('luntan');
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_luntan_type');
        $this->db->where('l_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function sgetOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_lunta');
        $this->db->where('l_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum1($array) {
        $this->db->where('teaId', 0);
        $this->db->from('luntan');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
    function getNum2($array) {
        $this->db->where($array);
        $this->db->from('ws_luntan_type');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function delete($id) {
        $this->db->where('l_id', $id);
        $this->db->delete('luntan');
    }

}

?>
