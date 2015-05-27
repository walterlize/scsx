<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
           
                  <link href="<?= base_url(); ?>css/news.css" rel="stylesheet" type="text/css" />
                <script language="javascript" src="<?= base_url() ?>javascript/jquery.js"></script>
                <link href="<?= base_url() ?>css/coe/ndxy.css" type="text/css" rel="stylesheet">
                    <script src="<?= base_url(); ?>javascript/frameMenu.js" type="text/javascript"></script>
                    <title>中国农业大学食品科学与营养工程学院生产实习信息化系统</title>
                    <meta name="Keywords" content="中国农业大学、农业大学、中国农大、农大、北京农业大学、国家211工程"><meta name="Generator" content="中国农业大学欢迎您"><meta name="Author" content="中国农业大学">
                                <meta name="channel" content="机械与农业工程实验教学中心">
                                    <script type="text/javascript">
                                        function ShowTag(TagName, TagClass, num, count, more) {
                                            for (var i = 0; i < count; i++) {
                                                var tag = document.getElementById(TagName + "_tab_" + i);
                                                var cont = document.getElementById(TagName + "_cont_" + i);
                                                var mores;
                                                if (more) {
                                                    mores = document.getElementById(TagName + "_more_" + i);
                                                }
                                                if (i == num) {
                                                    tag.className = TagClass + "On";
                                                    cont.style.display = "block";
                                                    if (more) {
                                                        mores.style.display = "block";
                                                    }
                                                } else {
                                                    tag.className = TagClass;
                                                    cont.style.display = "none";
                                                    if (more) {
                                                        mores.style.display = "none";
                                                    }
                                                }
                                            }
                                        }
                                    </script>

                                    </head>
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
                                    <body>
                                        <div style="width:1002px; margin:0 auto; padding:0">

                                            <table width="962" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:3px;">
                                                <tbody><tr>
                                                        <td valign="top"><img height="150" alt="" width="962" border="0" src="<?= base_url() ?>/images/coe/logo.jpg">
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            <table width="962" height="34" border="0" align="center" cellpadding="0" cellspacing="0" background="<?= base_url() ?>images/coe/gxy_13.jpg">
                                                <tbody><tr>
                                                        <td width="3%"> </td>
                                                        <td><table border="0" cellspacing="0" cellpadding="0" width="95%" height="34">   
                                                                <tbody><tr>                                                                      
                                                                        <td width="98" align="center"><a class="white1" href="<?= base_url() ?>">首 页</a></td>                                       
                                                                        <td width="2" align="center"><img alt="" width="2" height="13" src="<?= base_url() ?>images/coe/ndrscsty_17.gif"></td>
                                                                        <td width="98" align="center"><a class="white1" href="<?= base_url() ?>index.php/admin/notice/noticeLists">通知公告</a></td>
                                                                        <td width="2" align="center"><img alt="" width="2" height="13" src="<?= base_url() ?>images/coe/ndrscsty_17.gif"></td>
                                                                        <td width="98" align="center"><a class="white1" href="<?= base_url() ?>index.php/admin/news/newsLists">实习新闻</a></td>
                                                                        <td width="2" align="center"><img alt="" width="2" height="13" src="<?= base_url() ?>images/coe/ndrscsty_17.gif"></td>
                                                                        <td width="98" align="center"><a class="white1" href="<?= base_url() ?>index.php/admin/sum/sumLists">实习总结</a></td>
                                                                        <td width="2" align="center"><img alt="" width="2" height="13" src="<?= base_url() ?>images/coe/ndrscsty_17.gif"></td>
                                                                        <td width="98" align="center"><a class="white1" target="_blank"href="<?= base_url() ?>index.php/index/instruction/7/7">互动交流</a></td>
                                                                    </tr>  
                                                                </tbody></table>
                                                        </td>
                                                    </tr>
                                                </tbody></table></body></html>