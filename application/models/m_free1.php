<?php

class m_free1 extends CI_Model {
    var $comId = '';
    var $comName = '';
    var $content = '';
    var $plan = '';
    var $u_id = '';
    var $stateId = '';
    var $p_id = '';

    function saveInfo1($u_id,$p_id) {
        $this->comId = $this->input->post('comId');
        $this->comName = $this->input->post('comName');
        $this->content = $this->input->post('content');
        $this->plan = $this->input->post('plan');
        $this->u_id = $u_id;
        $this->stateId = 7;
        $this->p_id = $p_id;

        $id = $this->comId;
        if ($id == 0) {
            $this->db->insert('company', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('company', $this, array('comId' => $this->comId));
        }
        return $id;
    }

    function getPid() {
        $this->db->select('p_id');
        $this->db->from('ws_puser');
        $this->db->where('u_id',$this->session->userdata('u_id'));
        $q = $this->db->get();
        $result = $q->result();
        $data = array(); 
        foreach ($result as $r) {
            $data = $r;
        }
        return $data->p_id;
    }
    
    function getCompany($array) {
        $this->db->select();
        $this->db->from('free');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function sgetCompany() {
        $this->db->select();
        $this->db->order_by("comId", "desc");
        $this->db->limit(9);
        $q = $this->db->get('free');
        return $q->result();
    }
    
    function getCompanys($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('stuId',$this->session->userdata('u_id'));
        $this->db->order_by("stuId", "desc");
        $q = $this->db->get('ws_free', $per_page, $offset);
        return $q->result();
    }
    function getCompanyss() {
        $this->db->select();
        //$this->db->where($array);
        $this->db->order_by("comId", "desc");
        $this->db->limit(6);
        $q = $this->db->get('free');
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
        $this->db->from('ws_free');
        $this->db->where('stuId', $id);
        $q = $this->db->get();
        return $q->result();
    }
    function getFree($id) {
        $this->db->select();
        $this->db->from('ws_free');
        $this->db->where('fb_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->select();
        $this->db->from('ws_free');
        $this->db->where('stuId',$this->session->userdata('u_id'));
        return $this->db->count_all_results();
    }

    function updateCompanyinfo($id, $array) {
        $this->db->where('comId', $id);
        $this->db->update('free', $array);
    }
    function updateCompany($id, $array) {
        $this->db->where('comId', $id);
        $this->db->update('free', $array);
    }

    function delete($id) {
        $this->db->where('comId', $id);
        $this->db->delete('free');
    }

        function getResults($searchtype, $searchterm, $array, $per_page, $offset) {

            $this->db->select();
            $this->db->where($array);
            $this->db->where($searchtype, $searchterm);
            $q = $this->db->get('free', $per_page, $offset);
            return $q->result();
        }

    }

?>
