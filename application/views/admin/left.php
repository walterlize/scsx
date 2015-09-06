
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
                    <div class="photo"><img src="<?= base_url(); ?>images/pic3.png" style="width: 60px; height: 60px;" /></div>
                    <div class="welcome"><p style="color:#052e00;"><?= $id ?></p><p style="color:#052e00;"><?= $name ?></p><p style="color:#052e00;">管理员</p><P style="color:#2e333f; margin-left:0px;">欢迎你</P></div>     
                </div>
                <div class="fengeline"><img src="<?= base_url(); ?>images/backstage2.png" /></div>
                <div id="firstpane" class="menu_list">
                	
                <p class="menu_head current">实习资讯</p>
                    <div style="display:block;" class=menu_body >
                        
                        <a href="<?= base_url(); ?>index.php/admin/news/noticeList" target="content1">通知公告</a> 
                        <a href="<?= base_url(); ?>index.php/admin/news/ruleList" target="content1">实习规定</a>
                        <!--  
                        <a href="<?= base_url(); ?>index.php/admin/news/newsList" target="content1">实习新闻</a>
                        <a href="<?= base_url(); ?>index.php/admin/news/sumList" target="content1">实习总结</a>  
                        -->
                        <a href="<?= base_url(); ?>index.php/admin/imgnews/imgList" target="content1">实习风采</a>        
                    </div>
                    <p class="menu_head">实习汇报审核</p>
                    <div style="display:none" class="menu_body" >                       
                        <a href="<?= base_url(); ?>index.php/admin/report/reportList" target="content1">实习汇报审核</a>
                    </div>
                    <p class="menu_head">实习预算审核</p>
                    <div style="display:none" class="menu_body" >
                        <a href="<?= base_url(); ?>index.php/admin/yusuan/yusuanList" target="content1">实习预算审核</a>
                    </div>
                       
                    <p class="menu_head">用户信息</p>
                    <div style="display:none" class="menu_body">
                        <a href="<?= base_url(); ?>index.php/admin/user/stuList" target="content1">学生信息查看</a>
                        <a href="<?= base_url(); ?>index.php/admin/user/teaList" target="content1">教师信息查看</a>
                    </div>
                    
                    
                    <p class="menu_head">统计分析</p>
                    <div style="display:none" class="menu_body" >
                     
                        <a href="<?= base_url(); ?>index.php/admin/sum/sumList1" target="content1">课程基地统计</a>
                   
                        <a href="<?= base_url(); ?>index.php/admin/sum/sumList3" target="content1">基地人数统计</a>
                    </div>
                    <p class="menu_head">个人信息</p>
		    		<div style="display:none" class="menu_body">
		      			<a href="<?=base_url();?>index.php/admin/aself/selfDetail" target="content1">基本信息</a>
		      			<a href="<?= base_url() ?>index.php/user/password" target="content1">密码修改</a>
		    		</div>
                    <!--  
                    <p class="menu_head">报表统计</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/admin/sum1/sumList1" target="content1">班级人数统计</a>
                         <a href="<?= base_url(); ?>index.php/admin/sum1/sumList2" target="content1">学院基地信息统计</a> 
                        <a href="<?= base_url(); ?>index.php/admin/sum1/sumList3" target="content1">实习成绩统计</a>
                    </div>-->
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


