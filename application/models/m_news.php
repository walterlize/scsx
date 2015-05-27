<?php

class m_news extends CI_Model {

 var $newsId = '';
    var $title = '';
    var $sendTime = '';
    var $content = '';
    var $k_id = '';
    var $addName = '';
    var $addCollege ='';
    var $browse='';
    

    function saveInfo() {
        $this->newsId = $this->input->post('newsId');
        $this->title = $this->input->post('title');
        $this->sendTime = date("Y-m-d");
        $this->content = $this->input->post('content');
        $this->k_id = $this->input->post('k_id');
        $this->addName = $this->session->userdata('realname');
        $this->addCollege = $this->session->userdata('college');
        $this->browse = $this->input->post('browse');

        $id = $this->newsId;
        if ($id == 0) {
            $this->db->insert('news', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('news', $this, array('newsId' => $this->newsId));
        }
        return $id;
    }

    function getNews($array) {
        $this->db->select();
        $this->db->from('news');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getNewss($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("k_id", "desc");
        $q = $this->db->get('ws_news', $per_page, $offset);
        return $q->result();
    }
    function getNew1($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('k_id',1);
        $this->db->order_by("newsId", "desc");
        $q = $this->db->get('ws_news', $per_page, $offset);
        return $q->result();
    }
    function getNew2($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('k_id',2);
        $this->db->order_by("newsId", "desc");
        $q = $this->db->get('ws_news', $per_page, $offset);
        return $q->result();
    }
    function getNew3($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('k_id',3);
        $this->db->order_by("newsId", "desc");
        $q = $this->db->get('ws_news', $per_page, $offset);
        return $q->result();
    }
    function getNew4($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where('k_id',4);
        $this->db->order_by("newsId", "desc");
        $q = $this->db->get('ws_news', $per_page, $offset);
        return $q->result();
    }

    function getNews1() {
        $this->db->select();
        $this->db->where('k_id',1);
        $this->db->order_by("newsId", "desc");
        $this->db->limit(6);
        $q = $this->db->get('ws_news');
        return $q->result();
    }
    function getNews2() {
        $this->db->select();
        $this->db->where('k_id',2);
        $this->db->order_by("newsId", "desc");
        $this->db->limit(6);
        $q = $this->db->get('ws_news');
        return $q->result();
    }
    function getNews3() {
        $this->db->select();
        $this->db->where('k_id',3);
        $this->db->order_by("newsId", "desc");
        $this->db->limit(6);
        $q = $this->db->get('ws_news');
        return $q->result();
    }
    function getNews4() {
        $this->db->select();
        $this->db->where('k_id',4);
        $this->db->order_by("newsId", "desc");
        $this->db->limit(6);
        $q = $this->db->get('ws_news');
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_news');
        $this->db->where('newsId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum1($array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("k_id", "desc");
        $this->db->from('news');
        return $this->db->count_all_results();
    }

    function getNum2($array) {
        $this->db->from('ws_news');
        $this->db->where('k_id',2);
        return $this->db->count_all_results();
    }
    function getNum3($array) {
        $this->db->from('ws_news');
        $this->db->where('k_id',3);
        return $this->db->count_all_results();
    }
    function getNum4($array) {
        $this->db->from('ws_news');
        $this->db->where('k_id',4);
        return $this->db->count_all_results();
    }
    function getNum5($array) {
        $this->db->from('ws_news');
        $this->db->where('k_id',1);
        return $this->db->count_all_results();
    }

    function updateNewsinfo($id, $array) {
        $this->db->where('newsId', $id);
        $this->db->update('news', $array);
    }

    function updateNews($id, $array) {
        $this->db->where('newsId', $id);
        $this->db->update('news', $array);
    }

    function delete($id) {
        $this->db->where('newsId', $id);
        $this->db->delete('news');
    }

    function getResults($searchtype, $searchterm, $array, $per_page, $offset) {

        $this->db->select();
        $this->db->where($array);
        $this->db->where($searchtype, $searchterm);
        $q = $this->db->get('ws_news', $per_page, $offset);
        return $q->result();
    }
    function getKind($array) {
        $this->db->select();
        $this->db->from('kind');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

}

?>
