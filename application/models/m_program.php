<?php

class m_program extends CI_Model {

    var $p_id = '';
    var $p_name = '';
    var $collegeId = '';
    var $patternId = '';
    var $content = '';
    var $depart = '';

    function saveInfo() {
        $this->p_id = $this->input->post('p_id');
        $this->p_name = $this->input->post('p_name');
        $this->collegeId = $this->session->userdata('collegeId');
        $this->patternId = $this->input->post('patternId');
        $this->content = $this->input->post('content');
        $this->depart = $this->input->post('depart');

        $id = $this->p_id;
        if ($id == 0) {
            $this->db->insert('program', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('program', $this, array('p_id' => $this->p_id));
        }
        return $id;
    }

    function getPattern($array) {
        $this->db->select();
        $this->db->from('pattern');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getPrograms($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        //$this->db->where('collegeId',2);
        $this->db->order_by("patternId", "asc");
        $q = $this->db->get('ws_program', $per_page, $offset);
        return $q->result();
    }
    function getsPrograms($array) {
        $this->db->select();
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        //$this->db->where('collegeId',2);
        $this->db->order_by("patternId", "asc");
        $q = $this->db->get('ws_program');
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_program');
        $this->db->where('p_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    function getOneInfo1($id) {
        $this->db->select();
        $this->db->from('ws_puser');
        $this->db->where('u_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('program');
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        return $this->db->count_all_results();
    }

    function updateClainfo($id, $array) {
        $this->db->where('claId', $id);
        $this->db->update('cla', $array);
    }
    function updateCla($id, $array) {
        $this->db->where('claId', $id);
        $this->db->update('cla', $array);
    }

    function delete($id) {
        $this->db->where('p_id', $id);
        $this->db->delete('program');
    }

    }

?>
