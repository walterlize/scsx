
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
                    <div class="welcome"><p style="color:#052e00;"><?= $id ?></p><p style="color:#052e00;"><?= $name ?></p><p style="color:#052e00;">学生</p><P style="color:#2e333f; margin-left:0px;">欢迎你</P></div>     
                </div>
                <div class="fengeline"><img src="<?= base_url(); ?>images/backstage2.png" /></div>
                <div id="firstpane" class="menu_list">
                	<p class="menu_head current">查看实习课程</p>
                	<div style="display:block" class=menu_body >            
                        <a href="<?= base_url(); ?>index.php/student/variable/variableList" target="content1">查看实习课程</a>              
                    </div>
                   <p class="menu_head">志愿式--报名管理</p>
                    <div style="display:none" class=menu_body >            
                        <a href="<?= base_url(); ?>index.php/student/baoming/baomingList" target="content1">实习报名</a>
                        <a href="<?= base_url(); ?>index.php/student/chakan/chakanList" target="content1">报名查看</a>              
                    </div>
                    <p class="menu_head">分配式--报名管理</p>
                    <div style="display:none" class=menu_body >                
                        <a href="<?= base_url(); ?>index.php/student/achakan/achakanList" target="content1">查看实习分配结果</a>                   
                    </div>
                    <p class="menu_head">自选式--报名管理</p>
                    <div style="display:none" class=menu_body >                
                        <a href="<?= base_url(); ?>index.php/student/course/courseList" target="content1">查看实习项目</a>
                        <a href="<?= base_url(); ?>index.php/student/company/companyList" target="content1">提交基地信息</a>
                        <a href="<?= base_url(); ?>index.php/student/freestudent/courseList" target="content1">查看报名结果</a>                   
                    </div>

                    <p class="menu_head">实习管理</p>
                    <div style="display:none" class=menu_body >   
                        <a href="<?= base_url(); ?>index.php/student/summary/summaryList" target="content1">填写实习总结</a>
                        <a href="<?= base_url(); ?>index.php/student/summary/summaryLists" target="content1">已提交实习总结</a>
                        <a href="<?= base_url(); ?>index.php/student/chakan1/chakan1List" target="content1">查看评价</a>                    
                    </div>
                    <p class="menu_head">互动管理</p>
                    <div style="display:none" class=menu_body >                  
                        <a href="<?= base_url(); ?>index.php/student/luntan/luntanList" target="content1">发帖提问</a>
                        <a href="<?= base_url(); ?>index.php/student/luntan/cluntanList" target="content1">查看回帖</a>                    
                    </div>
                    <p class="menu_head">个人信息查看</p>
                    <div style="display:none" class=menu_body > 
                        <a href="<?= base_url(); ?>index.php/student/student/studentDetail" target="content1">个人信息查看</a>                   
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