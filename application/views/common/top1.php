<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
       <head>
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           <title>top</title>
           <link href="<?= base_url(); ?>css/frame.css" rel="stylesheet" type="text/css" />
           <style type="text/css">           
           </style>
       </head>
<!--    <head>
        <link href="css/css.css" type="text/css" rel="stylesheet" />
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>top</title>
    </head>
-->
    <body>
             <div class="top_wrap">
                 <div class="logo"></div>
     
                 <div class="welcome">您好！<?= $name ?>，欢迎登录!</div>
                 <div class="function">
                     <a class="header_logout" href="<?= base_url() ?>" target="_top">首&nbsp;&nbsp;页</a>
                     <a class="header_modify" href="<?= base_url() ?>index.php/user/password" target="content1" >修改密码</a>
                     <a class="header_assist"  href="<?= base_url() ?>index.php/index/logOut" target="_top" >退&nbsp;&nbsp;出</a>
                 </div>
                 <div class="clear"></div>
             </div>
        
<!--
        <div class="top">
            <div class="backgroundback"><img style="width:100%; height:150px;" src="images/backstage5.png" /></div>
            <div class="topbox">	
                <div class="logo">
                    <img src="images/backstage6.png"/>
                    <div class="righttopbox">
                        <div class="righttop">
                            <a href="<?= base_url() ?>index.php/index/shouye1">返回首页</a>
                            <p><img src="images/backstage8.png" /></p>
                            <a href="<?= base_url() ?>index.php/user/password">帮助中心</a>
                            <p><img src="images/backstage8.png" /></p>
                            <a href="<?= base_url() ?>index.php/index/logOut">退出</a>
                        </div>
                    </div>
                </div>        
            </div>
        </div>-->
    </body>
</html>