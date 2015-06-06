<?php

class m_company extends CI_Model {

    var $comId = '';
    var $comName = '';
    var $content = '';
    var $plan = '';
    var $u_id='';
    var $stateId='';
    var $p_id='';

    function saveInfo() {
        $this->comId = $this->input->post('comId');
        $this->comName = $this->input->post('comName');
        $this->content = $this->input->post('content');
        $this->plan = $this->input->post('plan');
        $this->u_id = $this->input->post('u_id');
        $this->stateId = $this->input->post('stateId');
        $this->p_id = $this->input->post('p_id');

        $id = $this->comId;
        if ($id == 0) {
            $this->db->insert('company', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('company', $this, array('comId' => $this->comId));
        }
        return $id;
    }

    function getCompany($array) {
        $this->db->select();
        $this->db->from('company');
        $this->db->where('stateId',5);
        $q = $this->db->get();
        return $q->result();
    }
    function getaCompany($array) {
        $this->db->select();
        $this->db->from('ws_choose_teacher');
        $this->db->where('stateId',5);
        $this->db->where('patternId',3);
        $q = $this->db->get();
        return $q->result();
    }

    function sgetCompany() {
        $this->db->select();
        $this->db->order_by("comId", "desc");
        $this->db->limit(9);
        $q = $this->db->get('company');
        return $q->result();
    }
  
    function getCompanys($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        $this->db->order_by("stateId", "desc");
        $q = $this->db->get('ws_company', $per_page, $offset);
        return $q->result();
    }
    function getCompanys1() {
        $this->db->select();
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        $this->db->order_by("stateId", "desc");
        $q = $this->db->get('ws_company');
        return $q->result();
    }
    function getCompanyss() {
        $this->db->select();
        //$this->db->where($array);
        $this->db->order_by("comId", "desc");
        $this->db->limit(6);
        $q = $this->db->get('company');
        return $q->result();
    }
    function getStates() {
        $this->db->select();
        $this->db->where('stateId >',4);
        $this->db->order_by("stateId", "desc");
        $q = $this->db->get('state');
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_company');
        $this->db->where('comId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->select();
        $this->db->from('ws_company');
        $this->db->where('collegeId',$this->session->userdata('collegeId'));
        return $this->db->count_all_results();
    }

    function updateCompanyinfo($id, $array) {
        $this->db->where('comId', $id);
        $this->db->update('company', $array);
    }
    function updateCompany($id, $array) {
        $this->db->where('comId', $id);
        $this->db->update('company', $array);
    }

    function delete($id) {
        $this->db->where('comId', $id);
        $this->db->delete('company');
    }

    function getResults($searchtype, $searchterm, $array, $per_page, $offset) {

        $this->db->select();
        $this->db->where($array);
        $this->db->where($searchtype, $searchterm);
        $q = $this->db->get('company', $per_page, $offset);
        return $q->result();
    }

    }

?>
