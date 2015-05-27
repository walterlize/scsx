<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url() ?>css/css.css" type="text/css" rel="stylesheet">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>中国农业大学学生生产实习管理平台</title>
            <script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
            <script src="js/koala.min.1.5.js" type="text/javascript"></script>
            <script src="js/terminator2.2.min.js" type="text/javascript"></script>

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
        <div class="top">
            <div class="background"><img style="width:100%; height:163px;" src="<?= base_url() ?>images0/top2.png" /></div>
            <div class="topbox">	
                <div class="logo"><img src="<?= base_url() ?>images0/top1.png"/></div>
            </div>
        </div>
        <div class="banner">
            <div class="background1"><img style="width:100%; height:52px;" src="<?= base_url() ?>images0/banner1.png" /></div>
            <div class="bannerbox">
                <div class="bannercontent">
                    <div style="width:112px;"><a href="<?= base_url() ?>">首页</a></div>
                    <div class="bannerline"><img src="<?= base_url() ?>images0/banner3.png" /></div>
                    <div style="width:111px;"><a href="<?= base_url() ?>index.php/admin/news/noticeLists">通知公告</a></div>
                    <div class="bannerline"><img src="<?= base_url() ?>images0/banner3.png" /></div>
                    <div style="width:114px;"><a href="<?= base_url() ?>index.php/admin/news/newsLists">实习新闻</a></div>                   
                    <div class="bannerline"><img src="<?= base_url() ?>images0/banner3.png" /></div>
                    <div style="width:107px;"><a href="<?= base_url() ?>index.php/admin/news/guidingLists">实习规定</a></div>
                    <div class="bannerline"><img src="<?= base_url() ?>images0/banner3.png" /></div>
                    <div style="width:108px;"><a href="<?= base_url() ?>index.php/admin/news/summaryLists">实习总结</a></div>
                    <div class="bannerline"><img src="<?= base_url() ?>images0/banner3.png" /></div>
                    <div style="width:110px;"><a href="<?= base_url() ?>index.php/index/instruction/7/7">互动交流</a></div>
                    <div class="bannerline"><img src="<?= base_url() ?>images0/banner3.png" /></div>
                    <div style="width:100px;"><a href="<?= base_url() ?>index.php/index/contact">联系我们</a></div>
                </div>	
            </div>	
        </div>
    </body>
</html>