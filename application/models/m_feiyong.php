<?php

class m_feiyong extends CI_Model {

    var $fy_id = '';
    var $fy_biaozhun = '';
    var $fy_renshu = '';
    var $fy_days = '';
    var $fy_sum = '';
    var $fy_type_id = '';
    var $fy_type = '';
    var $fy_describe = '';
    var $fy_ys = '';
    var $fy_tors = '';
   
    

    function saveInfo() {
        $this->fy_id = $this->input->post('fy_id');
        $this->fy_biaozhun = $this->input->post('fy_biaozhun');
        $this->fy_renshu = $this->input->post('fy_renshu');
        $this->fy_days = $this->input->post('fy_days');
        $this->fy_sum = $this->input->post('fy_sum');
        $this->fy_type_id = $this->input->post('fy_type_id');
        $this->fy_type = $this->input->post('fy_type');
        $this->fy_describe = $this->input->post('fy_describe');
        $this->fy_ys = $this->input->post('fy_ys');
        $this->fy_tors = $this->input->post('fy_tors');
        

        $id = $this->fy_id;
        if ($id == 0) {
            $this->db->insert('feiyong', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('feiyong', $this, array('fy_id' => $this->fy_id));
        }
        return $id;
    }
    
    
    
    function getFeiyong($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->from('feiyong');
        $q = $this->db->get();
        return $q->result();
    }
    
    
    //分页获取全部用户
    function getFeiyongs($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('feiyong', $per_page, $offset);
        return $q->result();
    }
    
    function getFeiyongById($id) {
        $this->db->select();
        $this->db->from('feiyong');
        $this->db->where('fy_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    
  
    

    function getNum($array) {
        $this->db->from('feiyong');
        $this->db->where($array);
        return $this->db->count_all_results();
    }
   
    function updateFeiyong($id, $array) {
        $this->db->where('fy_id', $id);
        $this->db->update('feiyong', $array);
    }

    function deleteFeiyong($id) {
        $this->db->where('fy_id', $id);
        $this->db->delete('feiyong');
    }
    
    function getFeiyong_ws($array) {
    	$this->db->select();
    	$this->db->where($array);
    	$this->db->from('ws_feiyong');
    	$this->db->order_by('fy_type_id');
    	$q = $this->db->get();
    	return $q->result();
    }

}
?>

