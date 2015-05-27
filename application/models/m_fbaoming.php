<?php

class m_fbaoming extends CI_Model {

    var $b_id = '';
    var $c_id = '';
    var $u_id = '';
    var $u_name = '';
    var $stateId = '';
    var $pstateId = '';
    var $ystateId = '';

    function saveInfo($id) {
        $this->b_id = $this->input->post('b_id');;
        //项目基地分配
        $this->c_id = $id;
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

    


}

?>
