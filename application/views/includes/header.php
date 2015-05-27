<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?= base_url(); ?>css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>css/mian.css" rel="stylesheet" type="text/css">
         <link href="<?= base_url(); ?>css/global.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>css/bannerflash.css" rel="stylesheet" type="text/css">
        <script src="<?= base_url(); ?>javascript/jquery1.js" language="javascript" type="text/javascript"></script>
        <script src="<?= base_url(); ?>javascript/jquery.js" language="javascript" type="text/javascript"></script>
        <script src="<?= base_url(); ?>javascript/banner.js" language="javascript" type="text/javascript"></script>
        <title>中国农业大学食品科学与营养工程学院生产实习系统</title>
        <script type="text/javascript">
            function selectTag(showContent,selfObj){
                // 操作标签
                var tag = document.getElementById("tags").getElementsByTagName("li");
                var taglength = tag.length;
                for(i=0; i<taglength; i++){
                    tag[i].className = "normalTag";
                }
                selfObj.parentNode.className = "selectTag";
                // 操作内容
                for(i=0; j=document.getElementById("tagContent"+i); i++){
                    j.style.display = "none";
                }
                document.getElementById(showContent).style.display = "block";


            }
        </script>
    </head>

    <body>
        <div id="wrapper">
            <div class="top">
                <div class="logo"><img src="<?= base_url() ?>images/logo.gif" /></div>
            </div>
        
            <!--end header-->
            <div class="clear"></div>

