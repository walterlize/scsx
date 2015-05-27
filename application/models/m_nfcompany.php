<?php

class m_nfcompany extends CI_Model {

    var $comId = '';
    var $comName = '';
    var $address = '';
    var $url = '';
    var $content = '';
    var $plan = '';
    var $u_id='';
    var $u_name='';
    var $stateId='';
    var $p_id='';
    var $collegeId = '';
    var $addId = '';
    var $addType='';

    function saveInfo($u_id) {
        $this->comId = $this->input->post('comId');
        $this->comName = $this->input->post('comName');
        $this->address = $this->input->post('address');
        $this->url = $this->input->post('url');
        $this->content = $this->input->post('content');
        $this->plan = $this->input->post('plan');
        $this->u_id = $u_id;
        $this->u_name = $this->input->post('u_name');
        $this->stateId = $this->input->post('stateId');
        //$this->p_id = $this->input->post('p_id');
        $this->p_id = '';
        $this->collegeId = $this->session->userdata('collegeId');
        $this->addId = $this->session->userdata('u_name');
        $this->addType = $this->session->userdata('roleId');

        $id = $this->comId;
        if ($id == 0) {
            $this->db->insert('company', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('company', $this, array('comId' => $this->comId));
        }
        return $id;
    }
    

    

}
?>
