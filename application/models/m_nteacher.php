<?php

class m_nteacher extends CI_Model {

	var $table = "oteacher";
	//var $table = "V_SX_JSXXB";
	var $db_connect1;
    var $db_connect2;
    /*
    public function __construct(){
        parent::__construct();

        //
        //引入远程的oracle数据库
         $this->load->database('db2', TRUE);
         
    }*/
    
    //连接数据库
    function dbConn(){
        $conn = oci_connect('sjk','sjk#_2015$','202.205.91.55/urpjw');
        if (!$conn) {
            $Error = oci_error();
            print htmlentities($Error['message']);
            exit;
        } else
        {
            return $conn;
        }
    }
    //关闭连接
    function dbClose($content,$conn){
        oci_free_statement($content);
        oci_close($conn);
    }
    
    function getTea($array){
        $conn = $this->dbConn();
        //处理array
        $str = '';
        $i = 0;
        $ai = count($array);
        foreach($array as $key => $val){
            $str = $str." ".$key." = '".$val."'";
            $i++;
            if($i < $ai)$str = $str." and ";
            
        }
        //$query = "select * from V_SX_JSXXB WHERE JSH =(:name) and MM = (:password1)";
        //$query = "select * from V_SX_JSXXB WHERE JSH ='96521' and MM = 'FUVQNQ'";
        $query = "select * from V_SX_JSXXB WHERE ".$str;
        
       
        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句
       
        //$results = oci_fetch_object($content);
        //$num = oci_fetch_all($content,$results);
        //echo $num;
        $results = array();
        while (($row = oci_fetch_object($content)) != false) {
        // Use upper case attribute names for each standard Oracle column
            //echo $row->JSH . "<br>\n";
            $this->zhandi_iconv($row,"GB2312","UTF-8");
            array_push($results,$row);
            
        }
        $this->dbClose($content,$conn);
        return $results;

    }
    
    /**
        * 循环实现编码互转
        *
        * @param string $param(字符串，对象，或者数组)，$currCharset当前编码，$toCharset期望编码
        * @return 参数类型

        */

       function zhandi_iconv($param,$currCharset,$toCharset){


        if ($currCharset != $toCharset){
           if (is_string($param)){
              return iconv($currCharset, $toCharset, $param);
           }else if (is_array($param)){
              foreach ($param as $key => $value){
                 $param[$key] = $this->zhandi_iconv($value,$currCharset,$toCharset);
              }
              return $param;
           }else if (is_object($param)){
              foreach ($param as $key => $value){
                   $param->$key = $this->zhandi_iconv($value,$currCharset,$toCharset);
              }
              return $param;
           }else{
         return $param;
         }
       }
        return $param;
       }

    //查询所有教师
        
    function getTea1($array){
    	$this->db->select();
    	$this->db->from($this->table);
    	
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }


    /*-----Oracle数据库查询------- */

    function getTea_orcl($u_name,$password){
        $oracle= $this->load->database('db2', TRUE);
        $query = "select * from V_SX_JSXXB where JSH = ".$u_name." and MM = ".$password."";
       /* $q = $oracle->query("SELECT * FROM V_SX_JSXXB where JSH='$u_name' and MM='$password'");
        return $q->result();
       */
        $orc=oci_parse($oracle,$query);
        oci_execute($orc);
        $q=oci_fetch_array($orc, OCI_BOTH);
        return $q->result();
    }


    //分页显示
    function getTeasByCol($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get($this->table, $per_page, $offset);
    	return $q->result();
    }
    
    //通过教师号查询
    function getTeaById($teaId) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where('JSH', $teaId);
        $q = $this->db->get();
        return $q->result();
    }
    
    function getNumByCol($array){
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    function getNumALL($array){
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where($array);
    	return $this->db->count_all_results();
    }
    
    //分页显示
    function getTeasALL($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where($array);
    	$q = $this->db->get($this->table, $per_page, $offset);
    	return $q->result();
    }


}
?>

