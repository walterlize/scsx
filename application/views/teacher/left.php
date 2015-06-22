
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
                    <div class="photo">
                        <img src="<?= base_url(); ?>images/backstage1.png" />
                    </div>
                    <div class="welcome">
                        <p style="color:#052e00;"><?= $name ?></p><P style="color:#2e333f; margin-left:0px;">欢迎您！</P><p style="color:#45b439;">（教师）</p>
                    </div>
                </div>
                <div class="fengeline">
                    <img src="<?= base_url(); ?>images/backstage2.png" />
                </div>
                <div id="firstpane" class="menu_list">
                	<p class="menu_head current">实习课程管理</p>
                    <div style="display:block" class=menu_body >                       
                        <a href="<?= base_url(); ?>index.php/teacher/course/courseList" target="content1" title="选择实习模式、编辑实习基底、发布实习课程">实习课程发布</a>
                        <a href="<?= base_url(); ?>index.php/teacher/audit/courseList" target="content1" title="审核报名学生的实习课程报名">实习学生审核</a>
                            <a href="<?= base_url(); ?>index.php/teacher/compmanage/companyList" target="content1">实习基地管理</a>
                    </div> 
                    <p class="menu_head">学生管理</p>
                    <div style="display:none" class=menu_body >                       
                        <a href="<?= base_url(); ?>index.php/teacher/student/courseList" target="content1">查看学生信息</a>
                        <a href="<?= base_url(); ?>index.php/teacher/mission/missionList" target="content1">下达实习总结任务</a>
                        <a href="<?= base_url(); ?>index.php/teacher/tsummary/tsummaryList" target="content1">审核实习总结</a>
                        <a href="<?= base_url(); ?>index.php/teacher/tsummary/tsummaryLists" target="content1">查看实习总结</a>
                        <a href="<?= base_url(); ?>index.php/teacher/score/scoreList" target="content1">评价实习结果</a>
                        <a href="<?= base_url(); ?>index.php/teacher/score/scoreLists" target="content1">查看评价结果</a>                                       
                    </div>             
                    <p class="menu_head">个人管理</p>
                    <div style="display:none" class=menu_body >               
                        <a href="<?= base_url(); ?>index.php/teacher/teacher/teacherDetail" target="content1">个人信息查看</a>                                    
                    </div>
                    <p class="menu_head">互动管理</p>
                    <div style="display:none" class=menu_body >                       
                        <a href="<?= base_url(); ?>index.php/teacher/luntan/luntanList" target="content1">回复学生发帖</a>
                        <a href="<?= base_url(); ?>index.php/teacher/luntan/cluntanList" target="content1">查看已回贴</a>
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
