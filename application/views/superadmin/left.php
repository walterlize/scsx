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
                    <div class="photo"><img src="<?= base_url(); ?>images/pic3.png" style="width: 60px; height: 60px;"/></div>
                    <div class="welcome"><p style="color:#052e00;"><?= $name ?></p><p style="color:#052e00;">超级管理员</p><P style="color:#2e333f; margin-left:0px;">欢迎你</P></div>     
                </div>
                <div class="fengeline"><img src="<?= base_url(); ?>images/backstage2.png" /></div>


                <div id="firstpane" class="menu_list">
                <p class="menu_head current">学期管理</p>
                    <div style="display:block" class=menu_body >   
                        <a href="<?= base_url(); ?>index.php/superadmin/term/termNow" target="content1">设置当前学期</a>
                    </div>
               		 <p class="menu_head">实习资讯</p>
                    <div style="display:none" class=menu_body >
                        
                        
                        <a href="<?= base_url(); ?>index.php/superadmin/news/ruleList" target="content1">实习规定</a>
                        <!--<a href="<?= base_url(); ?>index.php/superadmin/news/newsList" target="content1">实习新闻</a>-->
                        <a href="<?= base_url(); ?>index.php/superadmin/news/noticeList" target="content1">实习公告</a> 
                        <a href="<?= base_url(); ?>index.php/superadmin/imgnews/imgList" target="content1">实习风采</a>
                        <!--  
                        <a href="<?= base_url(); ?>index.php/superadmin/news/sumList" target="content1">实习总结</a>  
                                
                        -->
                    </div>
                    <p class="menu_head">实习预算审核</p>
                    <div style="display:none" class=menu_body >   
                        <a href="<?= base_url(); ?>index.php/superadmin/yusuan/yusuanList" target="content1">实习预算审核</a>
                    </div>
                    
                    <!--  
                    <p class="menu_head">信息管理</p>
                    <div style="display:none" class=menu_body >
                        <a href="<?= base_url(); ?>index.php/superadmin/college/collegeList" target="content1">学院名称管理</a>
                        <a href="<?= base_url(); ?>index.php/superadmin/user/userList" target="content1">院级管理员信息管理</a>
                    </div>
                    -->
                    <p class="menu_head">统计分析</p>
                    <div style="display:none" class=menu_body >
                    <!--  
                        <a href="<?= base_url(); ?>index.php/superadmin/sum/sumList1" target="content1">学院学生人数统计</a>
                        <a href="<?= base_url(); ?>index.php/superadmin/sum/sumList2" target="content1">学院教师人数统计</a>
                    -->
                        <a href="<?= base_url(); ?>index.php/superadmin/sum/sumList3" target="content1">学院基地数目统计</a>
                    
                    </div>
                    <p class="menu_head">管理员管理</p>
		    		<div  style="display:none" class="menu_body">
		      			<a href="<?=base_url();?>index.php/superadmin/admin/adminList" target="content1">管理员信息</a>
		    		</div>
		            <p class="menu_head">个人信息</p>
		    		<div style="display:none" class="menu_body">
		      			<a href="<?=base_url();?>index.php/superadmin/aself/selfDetail" target="content1">基本信息</a>
		      			<a href="<?= base_url() ?>index.php/user/password" target="content1">密码修改</a>
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

