
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
                    <div class="welcome"><p style="color:#052e00;"><?= $id ?></p><p style="color:#052e00;"><?= $name ?></p><p style="color:#052e00;">管理员</p><P style="color:#2e333f; margin-left:0px;">欢迎你</P></div>     
                </div>
                <div class="fengeline"><img src="<?= base_url(); ?>images/backstage2.png" /></div>
                <div id="firstpane" class="menu_list">
                	
                <p class="menu_head">实习项目管理</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/nclass/classList" target="content1">班级信息查看</a>
                        <a href="<?= base_url(); ?>index.php/admin/variable/variableList" target="content1">选课信息查看</a> 
                        <a href="<?= base_url(); ?>index.php/admin/ncourse/ncourseList" target="content1">实习项目管理</a>
                        <a href="<?= base_url(); ?>index.php/admin/ncomcou/ncomcouList" target="content1">分配实习基地</a>         
                    </div>
                    <p class="menu_head">实习基地管理</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/ncompanyuser/ncompanyUserList" target="content1">实习基地用户管理</a>
                        <a href="<?= base_url(); ?>index.php/admin/ncompany/ncompanyList" target="content1">实习基地信息管理</a>
                        <a href="<?= base_url(); ?>index.php/admin/ncompany/ncompanyListf" target="content1">学生提交基地审核</a>
                    </div>
                    <p class="menu_head">实习分配管理</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/allocation/allocationList" target="content1">班级分配基地</a>
                        <a href="<?= base_url(); ?>index.php/admin/allocation/allocationList1" target="content1">查看分配结果</a>
                        <a href="<?= base_url(); ?>index.php/admin/shenhe/shenheList" target="content1">学生报名审核</a>
                    </div>
                    <!--  
                    <p class="menu_head">实习项目管理</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/cla/claList" target="content1">班级信息管理</a>
                        <a href="<?= base_url(); ?>index.php/admin/program/programList" target="content1">实习项目信息管理</a>
                        <a href="<?= base_url(); ?>index.php/admin/company/companyList" target="content1">实习项目基地管理</a>
                        <a href="<?= base_url(); ?>index.php/admin/choose_teacher/choose_teacherList" target="content1">基地负责教师</a>         
                    </div>
                    <p class="menu_head">实习分配管理</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/allocation/allocationList" target="content1">班级分配基地</a>
                        <a href="<?= base_url(); ?>index.php/admin/allocation/allocationList1" target="content1">查看分配结果</a>
                        <a href="<?= base_url(); ?>index.php/admin/shenhe/shenheList" target="content1">学生报名审核</a>
                    </div>
                    -->
                    <p class="menu_head">新闻公告管理</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/news/newsList" target="content1">新闻公告规定总结管理</a>
                    </div>
                    <p class="menu_head">用户信息</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/user/stuList" target="content1">学生信息查看</a>
                        <a href="<?= base_url(); ?>index.php/admin/user/teaList" target="content1">教师信息查看</a>
                    </div>
                    <p class="menu_head">互动管理</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/type/typeList" target="content1">类别管理</a>
                        <a href="<?= base_url(); ?>index.php/admin/luntan/luntanList" target="content1">互动管理</a>
                    </div>
                    <p class="menu_head">统计分析</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/sum/sumList1" target="content1">班级人数统计</a>
                        <a href="<?= base_url(); ?>index.php/admin/sum/sumList3" target="content1">实习成绩统计</a>
                    </div>
                    <p class="menu_head">报表统计</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/sum1/sumList1" target="content1">班级人数统计</a>
                        <!-- <a href="<?= base_url(); ?>index.php/admin/sum1/sumList2" target="content1">学院基地信息统计</a> -->
                        <a href="<?= base_url(); ?>index.php/admin/sum1/sumList3" target="content1">实习成绩统计</a>
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


