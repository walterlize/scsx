<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>中国农业大学生产实习信息化系统</title>
<!--[if lte IE 7]><link href="/resource/css/index.ie6.release.css?s201207172004s.css" rel="stylesheet" type="text/css" media="screen"><![endif]--><!--[if gt IE 7]><!--><!--<![endif]-->
<!--[if lt IE 9]><script type="text/javascript">(function(){var e = "abbr,article,aside,audio,bb,canvas,datagrid,datalist,details,dialog,eventsource,figure,footer,hgroup,header,mark,menu,meter,nav,output,progress,section,time,video".split(','),i=0,length=e.length;while(i<length){document.createElement(e[i++])}})();</script><![endif]-->
<link href="<?= base_url(); ?>login_files/userlogin.css" rel="stylesheet" type="text/css" media="screen">
<link href="<?= base_url(); ?>login_files/banner.css" rel="stylesheet" type="text/css">
<script id="jsBase" type="text/javascript" src="login_files/base.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>login_files/jquery-1.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>login_files/jquery.js"></script>	
<script type="text/javascript" src="<?= base_url(); ?>login_files/md5.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>login_files/validate.js"></script>
</head><body><img src="<?= base_url(); ?>login_files/loginSession.htm" style="display:none" height="1px;" width="1px;">
<img src="<?= base_url(); ?>login_files/ssion.png" style="display:none" height="1px;" width="1px;">
<img src="<?= base_url(); ?>login_files/clearSession.htm" style="display:none" height="1px;" width="1px;">

<!--[if IE 6]>
	<script type="text/javascript" src="/platform/js/DD_belatedPNG.js" ></script>
	<script type="text/javascript">
	   DD_belatedPNG.fix('#login,.flash_bar');
	</script>
    <![endif]-->

<input id="idInput" value="company" type="hidden">
<div id="header">
	<div class="content">
		<div id="logo"> </div>
		<div id="nav" class="headR"> 
			<!--  <a href="#" class="cur_headR" onClick="qhbj(1)" id="qhbj1">跳转</a><a href="#" onClick="qhbj(2)" id="qhbj2">系统设置</a> <a href="#" onClick="qhbj(3)" id="qhbj3">帮助</a>--> 
		</div>
	</div>
	<div class="header-shadow"></div>
</div>
<div id="main"> 
<script>
var reToTop = false;
</script>
	<div id="funBoxBg">
		<div id="funBox">
			<div id="flashBg" style="background: url(&quot;/platform/images/slibg_1.jpg&quot;) repeat-x scroll left top transparent;">
				<div id="flashLine">
					<div id="flash"> 
						<a href="#" id="flash1" style="display: block; " name="url(/platform/images/slibg_1.jpg) repeat-x scroll left top">
								<img src="<?= base_url(); ?>login_files/notice1.jpg" height="393" width="980">		
						</a> 
						<div class="flash_bar">
							<div class="dq" id="f1" onclick="changeflash(1)"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="left: 774.5px;" id="login">
            <div class="item"></div>
		<h1>中国农业大学生产实习信息化系统</h1>
		<div id="modLoginWrap" class="mod-qiuser-pop">
			<div class="login">
				<form action="<?= base_url(); ?>index.php/index/login" method="post" class="bd" name="frmLogin" id="loginForm">
					<!-- 兼容base 无自动登录 --> 
					<!-- 用户名 -->
                                        <div class="item"></div>
					<div class="item">
						<label class="name" for="userNameIpt">用户名</label>
						<input id="userNameIpt" tabindex="1" class="ipt ipt-t " name="u_name" notnull="true" info="用户名" value="学号或教职工号" onfocus="if(this.value == '学号或教职工号'){this.value = ''}" onblur="if(this.value==''){this.value = '学号或教职工号'} " type="text">
					</div>
                                        <div class="item"></div>
					<!-- 密码 -->
					<div class="item">
						<label class="name" for="pwdInput">密&nbsp;&nbsp; 码</label>
						<input id="pwdInput" tabindex="2" class="ipt ipt-t" name="password" notnull="true" info="密码" autocomplete="off" type="password">
					</div>
                                        <div class="item"></div>
					<div class="item submit">
                                                <input type="hidden" name="action" value="login" /> 
						<input tabindex="7"  class="btn btn-submit" id="btnSubmit" value="登录系统"  type="submit">
						<span class="txt-err" id="divError"></span>
						<input tabindex="7" class="btn btn-submit" id="btnClear" value="找回密码" onclick="window.location.href='<?= base_url() ?>index.php/password';" type="button">
					</div>
				</form>
			</div>
		</div>
	</div>
	<ul id="desc" class="clearfix">
		<li class="safe">
			<h3>操作简便，安全可靠</h3>
			<span>用户可以在电脑上完成实验的预约、退约和查看，<br>
			方便师生随时操作查看，安全稳定可靠，值得信赖。</span> </li>
		<li class="vol">
			<h3>规范管理方案</h3>
			<span>本系统包括超级管理员、管理员、教师、实习基地和学生五组用户，分组管理，规范操作，方便管理。</span> </li>
	</ul>
</div>
<div id="footer"> <br>
</div>
<script src="<?= base_url(); ?>login_files/topqh.js"></script> 
<script src="<?= base_url(); ?>login_files/banner.js"></script>
</body>
</html>