<?php

class m_free extends CI_Model {
    var $u_id = '';
    var $u_name = '';
    var $roleId = '';
    var $password = '';
    var $realname = '';
    var $phone = '';
    var $email = '';
    var $address = '';
    var $classId = '';
    var $sex = '';
    var $ustateId = '';
    var $collegeId = '';

    function saveInfo() {
        $this->u_id = $this->input->post('u_id');
        $this->u_name = $this->input->post('phone');
        $this->roleId = 4;
        $this->password = $this->input->post('email');
        $this->realname = $this->input->post('realname');
        $this->phone = $this->input->post('phone');
        $this->email = $this->input->post('email');
        $this->address = $this->input->post('address');
        //
        $this->classId = $this->session->userdata('classId');;
        $this->sex = $this->input->post('sex');
        $this->ustateId = 1;
        $this->collegeId = $this->session->userdata('collegeId');

        $id = $this->u_id;
        if ($id == 0) {
            $this->db->insert('company_users', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('company_users', $this, array('u_id' => $this->u_id));
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
