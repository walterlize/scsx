<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url()?>css/cssn1.css" type="text/css" rel="stylesheet">
        <link href="<?=base_url()?>css/stylen1.css" rel="stylesheet" type="text/css">
		<link href="<?=base_url()?>css/style1n1.css" rel="stylesheet" type="text/css">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>中国农业大学学生生产实习管理平台</title>
            <script src="<?=base_url()?>js/jquery-1.8.3.min.js" type="text/javascript"></script>
            <script src="<?=base_url()?>js/koala.min.1.5.js" type="text/javascript"></script>
            <script src="<?=base_url()?>js/terminator2.2.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="js/jquery.SuperSlide.js"></script>

	    <!--[if lt IE 9]>
	    <script src="js/html5.js"></script>
		<![endif]-->
		
		<!--[if lt IE 9]>
		<script src="js/respond.js"></script> 
		<![endif]-->
	
	</head>
	
	<body>
	<?php 
		function utf8Substr($str, $from, $len) {
			return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $from . '}' .
					'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len . '}).*#s', '$1', $str);
		}
		
		function strLength($str, $charset = 'utf-8') {
			if ($charset == 'utf-8')
				@$str = iconv('utf-8', 'gb2312', $str);
			$num = strlen($str);
			$cnNum = 0;
			for ($i = 0; $i < $num; $i++) {
				if (ord(substr($str, $i + 1, 1)) > 127) {
					$cnNum++;
					$i++;
				}
			}
			$enNum = $num - ($cnNum * 2);
			$number = ($enNum / 2) + $cnNum;
			return ceil($number);
		}
	
	?>
		<!-----头部内容----->
		<header id="topbox">
			<!-----上部内容----->
			<div class="top">
		    	<img src="<?=base_url()?>images/topbg_01_02.png" alt="bg">
		        <div class="topmain">
		        	<img src="<?=base_url()?>images/logo_03.png" alt="logo">
		            <h1><img src="<?=base_url()?>images/title_08.png" alt="中国农业大学学生实习平台"></h1>
		        </div>
		    </div>
		    <!-----上部内容结束-----> 

		    
		  