<?php

class m_yusuan extends CI_Model {

    var $ys_id = '';
    var $ys_college = '';
    var $ys_name = '';
    var $ys_teac_name = '';
    var $ys_no = '';
    var $ys_content = '';
    var $ys_class = '';
    var $ys_address = '';
    var $ys_stu_num = '';
    var $ys_days = '';
    var $ys_teac = '';
    var $ys_stu = '';
    var $ys_teac_num = '';
    var $ys_state = '';
    var $ys_coll_idea = '';
    var $ys_audit_name = '';
    var $ys_audit_num = '';
    var $ys_state2 = '';
    var $ys_idea = '';
    var $ys_audit_name2= '';
    var $ys_audit_num2 = '';
    var $ys_term = '';
    var $ys_time = '';
    

    function saveInfo() {
        $this->ys_id = $this->input->post('ys_id');
        $this->ys_college = $this->input->post('ys_college');
        $this->ys_name = $this->input->post('ys_name');
        $this->ys_teac_name = $this->input->post('ys_teac_name');
        $this->ys_no = $this->input->post('ys_no');
        $this->ys_content = $this->input->post('ys_content');
        $this->ys_class = $this->input->post('ys_class');
        $this->ys_address = $this->input->post('ys_address');
        $this->ys_stu_num = $this->input->post('ys_stu_num');
        $this->ys_days = $this->input->post('ys_days');
        $this->ys_teac = $this->input->post('ys_teac');
        $this->ys_stu = $this->input->post('ys_stu');
        $this->ys_teac_num = $this->input->post('ys_teac_num');
        $this->ys_state = $this->input->post('ys_state');
        $this->ys_coll_idea = $this->input->post('ys_coll_idea');
        $this->ys_audit_name = $this->input->post('ys_audit_name');
        $this->ys_audit_num = $this->input->post('ys_audit_num');
        $this->ys_state2 = $this->input->post('ys_state2');
        $this->ys_idea = $this->input->post('ys_idea');
        $this->ys_audit_name2 = $this->input->post('ys_audit_name2');
        $this->ys_audit_num2 = $this->input->post('ys_audit_num2');
        $this->ys_term = $this->input->post('ys_term');
        $this->ys_time = $this->input->post('ys_time');
      
        $id = $this->ys_id;
        if ($id == 0) {
            $this->db->insert('yusuan', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('yusuan', $this, array('ys_id' => $this->ys_id));
        }
        return $id;
    }
    
    
    
    function getYusuan($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->from('yusuan');
        $q = $this->db->get();
        return $q->result();
    }
    
    //分页获取全部用户
    function getYusuans($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('yusuan', $per_page, $offset);
        return $q->result();
    }
    
    function getYusuanById($id) {
        $this->db->select();
        $this->db->from('yusuan');
        $this->db->where('ys_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    
  
    

    function getNum($array) {
        $this->db->from('yusuan');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
   
    function updateYusuan($id, $array) {
        $this->db->where('ys_id', $id);
        $this->db->update('yusuan', $array);
    }

    function deleteYusuan($id) {
        $this->db->where('ys_id', $id);
        $this->db->delete('yusuan');
    }

}
?>

