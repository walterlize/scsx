<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?= base_url(); ?>css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>css/mian.css" rel="stylesheet" type="text/css">
       <!--<link href="<?= base_url(); ?>css/global.css" rel="stylesheet" type="text/css">-->
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
        <style type="text/css"> 
            <!--

            .wzOn {color:#003333; font-weight:bold; cursor:pointer;background-image:url("/images/641/gxy_38.jpg");background-position:top; background-repeat:no-repeat; padding-top:2px; }
            .wz {color:#003333; cursor:pointer;padding-top:2px;}
            .ww {color:#003333; cursor:pointer;padding-top:2px;}
            .wwOn {color:#003333; font-weight:bold; cursor:pointer;background-image:url("/images/641/gxy_38.jpg");background-position:top; background-repeat:no-repeat; padding-top:2px; }
            .wq {color:#003333; cursor:pointer;padding-top:2px;}
            .wqOn {color:#003333; font-weight:bold; cursor:pointer;padding-top:2px; }
            .qq {color:#003333; cursor:pointer;padding-top:2px;}
            .qqOn {color:#003333; font-weight:bold; cursor:pointer;padding-top:2px; }


            -->
        </style>

        <script type="text/javascript"> 
            function ShowTag(TagName,TagClass,num,count,more) {
                for(var i=0;i<count;i++) {
                    var tag = document.getElementById(TagName+"_tab_"+i);
                    var cont = document.getElementById(TagName+"_cont_"+i);
                    var mores;
                    if(more) {
                        mores = document.getElementById(TagName+"_more_"+i);
                    } 
                    if(i==num) {
                        tag.className = TagClass+"On";
                        cont.style.display = "block";
                        if(more) {
                            mores.style.display = "block";
                        } 
                    } else {
                        tag.className = TagClass;
                        cont.style.display = "none";
                        if(more) {
                            mores.style.display = "none";
                        } 
                    }
                }
            }
        </script>

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

        <div style="width:1002px; margin:0 auto; padding:0;  background:url(<?= base_url() ?>images/coe/gxy_01.jpg) top repeat-x #FFF">
            <!--<table width="962" height="88" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody>
                    <tr>
                        <td width="580" valign="top">

                            <img width="452" height="88" border="0" src="<?= base_url() ?>/images/gxy_02.jpg" alt="">
                        </td>


                    </tr>
                </tbody>
            </table>-->
            <table width="962" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:3px;">
                <tbody><tr>
                        <td valign="top"><img height="150" alt="" width="962" border="0" src="<?= base_url() ?>/images/gxy_09_1.jpg">
                        </td>
                    </tr>
                </tbody></table>
    </body></html>