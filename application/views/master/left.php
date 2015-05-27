<!--
<div id="left_wrap">
    <div class="left_top">
        <span class="">实习基地</span>
    </div>
    <div class="menu_wrap">
        <div class="menu">
            <ul id="nav">
                <li><a href="#" ><span>学生实习管理</span></a>
                    <ul><!--chq
                        <li><a href="<?= base_url(); ?>index.php/master/mscore/mscoreList" target="mainFrame"><span>反馈学生实习情况</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/master/mscore/mscoreLists" target="mainFrame"><span>查看学生实习情况</span></a></li>
                    </ul></li> 
            </ul>
        </div>
    </div>
</div>
<div id="sidebar">
    <a onclick="changeFrame()" href="#">
        <img src="<?= base_url(); ?>images/admin/menu_hide.gif" />
    </a>
</div>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>left</title>
    </head>
    <body>
        <div class="enterbox">
            <div class="enterleft">
                <div class="welcomebox">
                    <div class="photo"><img src="<?= base_url(); ?>images/backstage1.png" /></div>
                    <div class="welcome"><p style="color:#052e00;"><?= $name ?></p><p style="color:#052e00;">实习基地</p><P style="color:#2e333f; margin-left:0px;">欢迎你</P></div>     
                </div>
                <div class="fengeline"><img src="<?= base_url(); ?>images/backstage2.png" /></div>
                <div id="firstpane" class="menu_list">
                    <p class="menu_head current">学生实习管理</p>
                    <div style="display:block" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/master/mscore/mscoreList" target="content1">反馈学生实习情况</a>
                        <a href="<?= base_url(); ?>index.php/master/mscore/mscoreLists" target="content1">查看学生实习情况</a>
                    </div>                   
                </div>        
            </div>
        </div>
        <script type=text/javascript>

            $(document).ready(function(){
                $("#firstpane .menu_body:eq(0)").show();
                $("#firstpane p.menu_head").click(function(){
                    $(this).addClass("current").next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
                    $(this).siblings().removeClass("current");
                });
                $("#secondpane .menu_body:eq(0)").show();
                $("#secondpane p.menu_head").mouseover(function(){
                    $(this).addClass("current").next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
                    $(this).siblings().removeClass("current");
                });
	
            });
        </script>
    </body>
</html>
