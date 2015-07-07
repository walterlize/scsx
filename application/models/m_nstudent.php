<?php

class m_nstudent extends CI_Model {
	/*
	var $table = "ostudent";
    //查询所有学生
    function getStu1($array){
    	$this->db->select();
    	$this->db->from($this->table);
    	//$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$q = $this->db->get();
    	return $q->result();
    }
    
    //分页显示
    function getStusByCol1($array, $per_page, $offset) {
    	$this->db->select();
    	$this->db->where('XSM',$this->session->userdata('college'));
    	$this->db->where($array);
    	$this->db->order_by('XH','asc');
    	$q = $this->db->get($this->table, $per_page, $offset);
    	return $q->result();
    }
    
    //通过学号查询
    function getStuById1($stuId) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where('stuId', $teaId);
        $q = $this->db->get();
        return $q->result();
    }
   
    
    //按条件获得实习项目条数
    function getNum1($array) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where('college',$this->session->userdata('college'));
    	$this->db->where($array);
    	$this->db->distinct();
    	return $this->db->count_all_results();
    }
    
    //按条件获得实习项目条数
    function getNumALL1($array) {
    	$this->db->select();
    	$this->db->from($this->table);
    	$this->db->where($array);
    	$this->db->distinct();
    	return $this->db->count_all_results();
    }
    */
    
    function getStu($array){
    	$conn = $this->dbConn();
        //处理array
        $str1 = $this->arrToStr($array);
        $str=iconv('UTF-8', 'GBK', $str1);
        
        $query = "select * from V_SX_XSXXB ".$str;
       
               
        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
    }
    
    //通过学号查询
    function getStuById($stuId) {
    	$conn = $this->dbConn();
             
        $query = "select * from V_SX_XSXXB WHERE XH ='".$stuId."'";
               
        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
    }
    
    //分页显示
    function getStus($array, $per_page, $offset) {
    	$conn = $this->dbConn();
        //处理array
        $str = $this->arrToStr($array);           
        if($offset =='' || !$offset) $offset=0;
        $strLimit1 = "  and rownum <= ".($offset+$per_page);
        $strLimit2 = "  and rownum <= ".$offset;
        if(!$str) {
        	$strLimit1 = " WHERE rownum <= ".($offset+$per_page);
        	$strLimit2 = " WHERE rownum <= ".$offset;
        }
        $query2 = "select * from V_SX_XSXXB ".$str;
        $query1 = $query2.$strLimit1." minus ".$query2.$strLimit2;    
        $query=iconv('UTF-8', 'GBK', $query1);
        //$query = "select * from V_SX_XSXXB WHERE ".$str.$strLimit;
               
        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
    }
    
    //分页显示
    function getStusByCol($array, $per_page, $offset) {
    	$conn = $this->dbConn();
        //处理array
        $str = $this->arrToStr($array);           
        $college = $this->session->userdata('college');
        $strCol = " and XSM = ".$college;
        if(!$str) $strCol="WHERE XSM = ".$college;
        if($offset =='' || !$offset) $offset=0;
        $strLimit1 = "  and rownum <= ".($offset+$per_page);
        $strLimit2 = "  and rownum <= ".$offset;
        $query2 = "select * from V_SX_XSXXB ".$str.$strCol;
        $query1 = $query2.$strLimit1." minus ".$query2.$strLimit2;  
        $query=iconv('UTF-8', 'GBK', $query1);
        //$query = "select * from V_SX_XSXXB WHERE ".$str.$strCol.$strLimit;
               
        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句       
        $results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        return $results;
    } 
    
    //按条件获得实习项目条数
    function getNum($array) {
    	$conn = $this->dbConn();
        //处理array
        $str = $this->arrToStr($array);           
        $college = $this->session->userdata('college');
        $strCol = " and XSM = ".$college;
        if(!$str) $strCol="WHERE XSM = ".$college;
        
        $query1 = "select * from V_SX_XSXXB ".$str.$strCol;
        $query=iconv('UTF-8', 'GBK', $query1);
               
        $content=oci_parse($conn,$query);  //被解析语句     
        oci_execute($content);//执行被解析语句       
        $num = oci_fetch_all($content,$result);
        $this->dbClose($content,$conn);
        return $num;
    }
    
    //按条件获得实习项目条数
    function getNumALL($array) {
    	$conn = $this->dbConn();
    	//处理array
    	$str = $this->arrToStr($array);
    	
    	$query1 = "select * from V_SX_XSXXB ".$str;
    	$query=iconv('UTF-8', 'GB2312', $query1);
    	
    	//echo $query;
    	
    	$content=oci_parse($conn,$query);  //被解析语句
    	//echo $content; echo "<br>";
    	oci_execute($content);//执行被解析语句
    	$num = oci_fetch_all($content,$result);
        $this->dbClose($content,$conn);
        return $num;
    }
    
    function countStuNumByCol(){
    	$conn = $this->dbConn();
    	//$query1 = "select * from V_SX_XSXXB WHERE ".$str;
    	$query1 = "SELECT XSM, NJMC , count(*) AS COSTU FROM V_SX_XSXXB GROUP BY XSM , NJMC ORDER BY XSM ASC,NJMC DESC";
    	$query=iconv('UTF-8', 'GB2312', $query1);
    	 
    	//echo $query;
    	 
    	$content=oci_parse($conn,$query);  //被解析语句
    	//echo $content; echo "<br>";
    	oci_execute($content);//执行被解析语句
    	$results = $this->resToObj($content);
        $this->dbClose($content,$conn);
        //print_r($results);
        return $results;
    }
    
    function countStuNumByBM($array){
    	$conn = $this->dbConn();
    	$str = $this->arrToStr($array);
    	//$query1 = "select * from V_SX_XSXXB WHERE ".$str;
    	$query1 = "SELECT BM,NJMC, count(*) AS COSTU FROM V_SX_XSXXB ".$str." GROUP BY BM,NJMC ORDER BY NJMC DESC , BM ASC";
    	$query=iconv('UTF-8', 'GB2312', $query1);
    
    	//echo $query;
    
    	$content=oci_parse($conn,$query);  //被解析语句
    	//echo $content; echo "<br>";
    	oci_execute($content);//执行被解析语句
    	$results = $this->resToObj($content);
    	$this->dbClose($content,$conn);
    	//print_r($results);
    	return $results;
    }
    
    //连接数据库
    function dbConn(){
        $conn = oci_connect('sjk','sjk#_2015$','(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 202.205.91.55)(PORT = 1521)) (CONNECT_DATA = (SERVICE_NAME = urpjw) (SID = urpjw)))');

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
    
    function resToObj($content){
    	$results = array();
    	while (($row = oci_fetch_object($content)) != false) {
    		// Use upper case attribute names for each standard Oracle column
    		//echo $row->JSH . "<br>\n";
    		@$this->zhandi_iconv($row,"GB2312","UTF-8");
    		array_push($results,$row);
    	}
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
    
    function arrToStr($array){
    	//处理array
    	$str = '';
    	$i = 0;
    	$ai = count($array);
    	foreach($array as $key => $val){
    		$str = $str." ".$key." = '".$val."'";
    		$i++;
    		if($i < $ai)$str = $str." and ";
    	}
    	if($str) $str1 = "WHERE ".$str;
    	else $str1 = $str;
    	return $str1;
    }
    
    



}
?>

