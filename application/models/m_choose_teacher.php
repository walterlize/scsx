<?php

class m_choose_teacher extends CI_Model {

    var $comId = '';
    var $u_id = '';
    var $c_id = '';
    var $userId = '';

    function saveInfo() {
        $this->comId = $this->input->post('comId');
        $this->u_id = $this->input->post('u_id');
        $this->c_id = $this->input->post('c_id');
        $this->userId = $this->input->post('userId');

        $id = $this->c_id;
        if ($id == 0) {
            $this->db->insert('choose_teacher', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('choose_teacher', $this, array('c_id' => $this->c_id));
        }
        return $id;
    }

    function sgetCompany() {
        $this->db->select();
        $this->db->order_by("c_id", "desc");
        $this->db->limit(9);
        $q = $this->db->get('ws_choose_teachers');
        return $q->result();
    }
    
    function getChoose_teacher($array) {
        $this->db->select();
        $this->db->from('choose_teacher');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getChoose_teachers($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        $this->db->order_by("c_id", "desc");
        $q = $this->db->get('ws_choose_teachers', $per_page, $offset);
        return $q->result();
    }
    function getChoose_teacherss() {
        $this->db->select();
        //$this->db->where($array);
        $this->db->order_by("c_id", "desc");
        $this->db->limit(6);
        $q = $this->db->get('choose_teacher');
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_choose_teachers');
        $this->db->where('c_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('ws_choose_teachers');
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        return $this->db->count_all_results();
    }

    function updateChoose_teacherinfo($id, $array) {
        $this->db->where('c_id', $id);
        $this->db->update('choose_teacher', $array);
    }
    function updateChoose_teacher($id, $array) {
        $this->db->where('c_id', $id);
        $this->db->update('choose_teacher', $array);
    }

    function delete($id) {
        $this->db->where('c_id', $id);
        $this->db->delete('choose_teacher');
    }

        function getResults($searchtype, $searchterm, $array, $per_page, $offset) {

            $this->db->select();
            $this->db->where($array);
            $this->db->where($searchtype, $searchterm);
            $q = $this->db->get('choose_teacher', $per_page, $offset);
            return $q->result();
        }

    }

?>
