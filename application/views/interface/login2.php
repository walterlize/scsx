<style>
<!--
.botlink{
	width:160px;
	float:left;
}
-->
</style>

<div class="contenttop">
    <div class="contenttopleft">
        <div class="logintopbox">
            <div class="loginimg"><img src="images0/login1.png" /></div>
            <div class="logintop"><p>用户登录</p></div>
        </div>
        <!--<div class="loginbottombox" style="padding-top: 26px;">-->
        <div class="loginbottombox"  style="<?= $form ?>">
            <form method="post" action="<?= base_url() ?>index.php/index/login" id="login-form" name="form1">

                <div class="name">
                    <p>用户名：</p>
                    <input class="loginname" id="loginname" tabindex="1" name="u_name" notnull="true" info="用户名" value="学号或教职工号" onfocus="if(this.value == '学号或教职工号'){this.value = ''}" onblur="if(this.value==''){this.value = '学号或教职工号'} " type="text">
                </div>
                <div class="password">
                    <p>密&nbsp;&nbsp;码：</p>
                    <input class="mima" id="loginname" tabindex="1" name="password" notnull="true" info="密码"  type="password">                   
                    <!--<input class="mima" type="password" name="password" id="password" ><input class="mima" name="mima" type="text" />-->
                </div>
                <div class="name">
                    <p>角&nbsp;&nbsp;色：</p>
                    <select name="userType" class="loginname">
                    	<option value="" >--请选择用户角色--</option>
                    	<option value="1">----校级管理员----</option>
                    	<option value="2">----院级管理员----</option>
                    	<option value="3">-------教 师------</option>
                    	<option value="5">-------学 生------</option>
                    	<!--  <option value="4">-----基地用户-----</option>-->
                    </select>
                </div>
                <div class="buttonbox" >
                    <div class="denglu">
                        <a href="#" onclick="form1.submit()">登录</a>
                    </div>
                    <div class="zhuce">
                        <a href="#" onclick="form1.reset()">重置</a>
                    </div>
                </div>

            </form>
        </div>
        <div class="loginbottombox2" style="<?=$welcome?>">欢迎您,<?php
            if (isset($name))
                echo $name.''.$role_name.'!';
            ?><br/><br/><br/>
            <a class="titleLink"  href="<?= base_url() ?>index.php/index/getin/<?=$role?>">
                登陆
            </a>
            &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
            <a class="titleLink" href="<?= base_url() ?>index.php/index/logOut">
                退出
            </a>
        </div>


    </div>


    <div id="fsD1" class="contenttopcenter" style="margin-left:400px">
        <div id="D1pic1" class="fPic">
        <?php if (is_array($img)) foreach ($img as $r): ?>
            <div class="fcon" style="display: none;">
                <a target="_blank" href="<?= base_url() ?>index.php/front/imgnews/imgDetail/<?= $r->news_id ?>"><img src="<?=$r->news_img?>"  style="opacity: 1; "></a><!--不透明度-->
                <span class="shadow"><a target="_blank" href="#"><?=$r->news_title?></a></span>
            </div>
        <?php endforeach;?>

            
        </div>

        <div class="fbg">  
            <div class="D1fBt" id="D1fBt">  
                <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>1</i></a>  
                <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>2</i></a>  
                <a href="javascript:void(0)" hidefocus="true" target="_self" class="current"><i>3</i></a>  
                <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>4</i></a>  
                <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>5</i></a> 
            </div>  
        </div>  

    </div>  
    <script type="text/javascript">
        Qfast.add('widgets', { path: "js/terminator2.2.min.js", type: "js", requires: ['fx'] });  
        Qfast(false, 'widgets', function () {
            K.tabs({
                id: 'fsD1',   //焦点图包裹id  
                conId: "D1pic1",  //** 大图域包裹id  
                tabId:"D1fBt",  
                tabTn:"a",
                conCn: '.fcon', //** 大图域配置class       
                auto: 1,   //自动播放 1或0
                effect: 'fade',   //效果配置
                eType: 'click', //** 鼠标事件
                pageBt:true,//是否有按钮切换页码
                bns: ['.prev', '.next'],//** 前后按钮配置class                          
                interval: 3000  //** 停顿时间  
            }) 
        })  
    </script>


    <div class="contenttopright">
        <div class="noticetopbox">
            <div class="noticeimg"><img src="images0/login1.png" /></div>
            <div class="noticetop"><p>通知公告</p><a href="<?= base_url() ?>index.php/front/news/noticeList" target="_blank">更多>></a></div>
        </div>

        <div class="noticelist">
            
            <ul>
            <?php if (is_array($notice)) foreach ($notice as $r): ?>
                <li style="margin-top:1px;">
                    <tr>
                        <td><span><img src="images/pointer.png" /></td>                     
                        <td><a title="<?= $r->news_title ?>" href="<?= base_url() ?>index.php/front/news/newsDetail/<?= $r->news_id ?>" target="_blank">
                                <b>
                                    <?php
                                    if (strLength($r->news_title, $charset = 'utf-8') > 15) {
                                        echo utf8Substr($r->news_title, $from = 0, 15);
                                        echo "...";
                                    } else {
                                        echo $r->news_title;
                                    }
                                    ?>
                                </b>         
                            </a></td>
                    </tr></li>
                <?php endforeach; ?></ul>
        </div>
    </div>   
</div>


<div class="contentmiddle">
    <div class="contentmiddleleft">
        <div class="providebox">
            <div class="providetop">
                <div class="providetitle"><p>实习规定</p></div>
                <a href="<?= base_url() ?>index.php/front/news/ruleList" target="_blank">更多>></a>
            </div>
        </div>

        <div class="providelist">
            
            <ul>
            <?php if (is_array($guiding)) foreach ($guiding as $r): ?>
                <li>
                    <tr>
                        <td><span><img src="images0/pointer.png" /></td>
                        <td><a title="<?= $r->news_title ?>" href="<?= base_url() ?>index.php/front/news/newsDetail/<?= $r->news_id ?>" target="_blank">
                                <b>.
                                    <?php
                                    if (strLength($r->news_title, $charset = 'utf-8') > 14) {
                                        echo utf8Substr($r->news_title, $from = 0, 14);
                                        echo "...";
                                    } else {
                                        echo $r->news_title;
                                    }
                                    ?>
                                </b>         
                            </a></td>
                    </tr></li>
                <?php endforeach; ?></ul>
        </div>
    </div>	

    <div class="contentmiddleright">
        <div class="newstitlebox">
            <div class="newstop">
                <div class="newstitle"><p>实习新闻</p></div>
                <a href="<?= base_url() ?>index.php/front/news/newsList" target="_blank">更多>></a>
            </div>
        </div>

        <div class="newslist1">
            <ul>
            <?php if (is_array($news)) foreach ($news as $r): ?>
                <li>
                    <tr>
                        <td><span class="newsdate" style="margin-right: 30px;"><?= $r->news_time ?></span></td>
                        <td><a title="<?= $r->news_title ?>" href="<?= base_url() ?>index.php/front/news/newsDetail/<?= $r->news_id ?>" target="_blank">
                                <b>.
                                    <?php
                                    if (strLength($r->news_title, $charset = 'utf-8') > 24) {
                                        echo utf8Substr($r->news_title, $from = 0, 24);
                                        echo "...";
                                    } else {
                                        echo $r->news_title;
                                    }
                                    ?>
                                </b>         

                            </a></td>
                    </tr></li>
                <?php endforeach; ?></ul>
        </div>    
    </div>		
</div>

<!--  
<div class="contentbottom">
    <div id="newsimgbox">
        <div id="indemo">
            <div id="demo1">
                <a href="#" class="newsimg1"><img src="images0/news1.png" border="0"  onload="return imgzoom(this,600);" onclick="javascript:window.open(this.src);" style="cursor:pointer;"/>
                    <p>我院第十三届学生会举行第一次例会</p>
                </a>
                <a href="#" class="newsimg2"><img src="images0/news2.png" border="0"  onload="return imgzoom(this,600);" onclick="javascript:window.open(this.src);" style="cursor:pointer;"/>
                    <p>包饺子大赛顺利举办</p>
                </a>
                <a href="#" class="newsimg3"><img src="images0/news3.png" border="0"  onload="return imgzoom(this,600);" onclick="javascript:window.open(this.src);" style="cursor:pointer;"/>
                    <p>2014级转说英语演讲俱乐部活动成功举办</p>
                </a>
                <a href="#" class="newsimg4"><img src="images0/news4.png" border="0"  onload="return imgzoom(this,600);" onclick="javascript:window.open(this.src);" style="cursor:pointer;"/>
                    <p>第十三届宿舍文化节答辩评选活动</p>
                </a>
            </div>
            <div id="demo2"></div>
        </div>
    </div>
</div>

<script>
    var speed=15;
    var tab=document.getElementById("newsimgbox");
    var tab1=document.getElementById("demo1");
    var tab2=document.getElementById("demo2");
    tab2.innerHTML=tab1.innerHTML;
    function Marquee(){
        if(tab2.offsetWidth-tab.scrollLeft<=0)
            tab.scrollLeft-=tab1.offsetWidth
        else{
            tab.scrollLeft++;
        }
    }
    var MyMar=setInterval(Marquee,speed);
    tab.onmouseover=function() {clearInterval(MyMar)};
    tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
</script>
-->


        
    <div class="linkbox">
	<div class="linktop">
    	<div class="linktitle"><p>友情链接</p></div>
    </div>
	<div class="linklist">
	
    	<div class="botlink"><a href="http://www.moe.gov.cn/" target="_blank">教育部</a></div>
		<div class="botlink"><a href="http://cau.edu.cn" target="_blank">中国农业大学</a></div>
		<div class="botlink"><a href="http://spxy.cau.edu.cn/" target="_blank">食品科学与营养工程学院</a></div>
		
		<div class="botlink"><a href="http://nxy.cau.edu.cn/" target="_blank">农学与生物技术学院</a></div>
		<div class="botlink"><a href="http://cbs.cau.edu.cn/" target="_blank">生物学院</a></div>
		<div class="botlink"><a href="http://zihuan1.cau.edu.cn/" target="_blank">资源与环境学院</a></div>
		<div class="botlink"><a href="http://cast1.cau.edu.cn/" target="_blank">动物科技学院</a></div>
		<div class="botlink"><a href="http://cvm.cau.edu.cn/" target="_blank">动物医学院</a></div>		
		<div class="botlink"><a href="http://coe.cau.edu.cn/" target="_blank">工学院</a></div>
		<div class="botlink"><a href="http://ciee.cau.edu.cn/" target="_blank">信息与电气工程学院</a></div>
		<div class="botlink"><a href="http://water.cau.edu.cn/" target="_blank">水利与土木工程学院</a></div>
		<div class="botlink"><a href="http://sci.cau.edu.cn/" target="_blank">理学院</a></div>
		<div class="botlink"><a href="http://www2003.cau.edu.cn/cem" target="_blank">经济管理学院</a></div>
		<div class="botlink"><a href="http://cohd.cau.edu.cn/" target="_blank">人文与发展学院</a></div>
		<div class="botlink"><a href="http://szxy1.cau.edu.cn/" target="_blank">思想政治教育学院</a></div>
        <div class="botlink"><a href="http://icb.cau.edu.cn/" target="_blank">国际学院</a></div>		
    </div>

    

</div>
