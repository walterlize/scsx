<?php

class m_baoming extends CI_Model {

    var $b_id = '';
    var $c_id = '';
    var $u_id = '';
    var $u_name = '';
    var $stateId = '';
    var $pstateId = '';
    var $ystateId = '';

    function saveInfo() {
        $this->b_id = 0;
        //项目基地分配
        $this->c_id = $this->uri->segment(4);
        //学号
        $this->u_id = $this->session->userdata('u_name');
        $this->u_name = $this->session->userdata('realname');
        //报名状态
        $this->stateId = 2;
        $this->pstateId = 1;
        $this->ystateId = 1;

        $id = $this->b_id;
        if ($id == 0) {
            $this->db->insert('baoming', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('baoming', $this, array('b_id' => $this->b_id));
        }
        return $id;
    }

    function getBaoming($array) {
        $this->db->select();
        $this->db->from('baoming');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    function getBaomingById($id) {
    	$this->db->select();
    	$this->db->from('ws_baomings');
    	$this->db->where('b_id',$id);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    function updateBaominginfo($id, $array) {
    	$this->db->where('b_id', $id);
    	$this->db->update('baoming', $array);
    }
    
    function updateBaoming($id, $array) {
    	$this->db->where('b_id', $id);
    	$this->db->update('baoming', $array);
    }
    
    function delete($id) {
    	$this->db->where('b_id', $id);
    	$this->db->delete('baoming');
    }
    
    function getResults($searchtype, $searchterm, $array, $per_page, $offset) {
    
    	$this->db->select();
    	$this->db->where($array);
    	$this->db->where($searchtype, $searchterm);
    	$q = $this->db->get('baoming', $per_page, $offset);
    	return $q->result();
    }
    
    
    

    function getBaomings($depart, $per_page, $offset) {
        $this->db->select();
        $this->db->where('depart', $depart);
        $this->db->where('stateId', 5);
        $this->db->order_by("c_id", "asc");
        $q = $this->db->get('ws_choose_teachers', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_choose_teachers');
        $this->db->where('c_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInf($id) {
        $this->db->select();
        $this->db->from('ws_baoming');
        $this->db->where('b_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getDepart($array) {
        $this->db->select('department');
        $this->db->from('ws_puser');
        $this->db->where('u_id', $this->session->userdata('u_id'));
        $q = $this->db->get();
        $result = $q->result();
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data->department;
    }

    function getNum($depart) {
        $this->db->from('ws_choose_teachers');
        $this->db->where('depart', $depart);
        $this->db->where('stateId', 5);
        return $this->db->count_all_results();
    }



}

?>
