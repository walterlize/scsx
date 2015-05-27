<div class="contenttop">
    <div class="contenttopleft">
        <div class="logintopbox">
            <div class="loginimg"><img src="images0/login1.png" /></div>
            <div class="logintop"><p>用户登录</p></div>
        </div>
        <div class="loginbottombox" style="padding-top: 26px;">
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
                    	<option value="4">-----基地用户-----</option>
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
    </div>


    <div id="fsD1" class="contenttopcenter" style="margin-left:400px">
        <div id="D1pic1" class="fPic">
            <div class="fcon" style="display: none;">
                <a target="_blank" href="#"><img src="images0/adimg1.png"  style="opacity: 1; "></a><!--不透明度-->
                <span class="shadow"><a target="_blank" href="#">拼尽全力，再创辉煌——记2014级新生排球赛季军争夺战</a></span>
            </div>

            <div class="fcon" style="display: none;">
                <a target="_blank" href="#"><img src="images0/adimg2.png"  style="opacity: 1; "></a>
                <span class="shadow"><a target="_blank" href="#">新生欢迎会如期举行</a></span>
            </div>

            <div class="fcon" style="display: none;">
                <a target="_blank" href="#"><img src="images0/adimg3.png"  style="opacity: 1; "></a>
                <span class="shadow"><a target="_blank" href="#">第21届DIY手动大赛进行</a></span>
            </div>

            <div class="fcon" style="display: none;">
                <a target="_blank" href="#"><img src="images0/adimg4.png"  style="opacity: 1; "></a>
                <span class="shadow"><a target="_blank" href="#">校运会长跑活动专题</a></span>
            </div> 
            <div class="fcon" style="display: none;">
                <a target="_blank" href="#"><img src="images0/adimg3.png"  style="opacity: 1; "></a>
                <span class="shadow"><a target="_blank" href="#">DIY手工大赛</a></span>
            </div>   
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
            <div class="noticetop"><p>通知公告</p><a href="<?= base_url() ?>index.php/admin/news/noticeLists" target="_blank">更多>></a></div>
        </div>

        <div class="noticelist">
            <!--
            <ul>
            	<li style="margin-top:10px;"><span><img src="images/pointer.png" /></span><a href="#">关于召开2013年“生产认识实习”交流...</a></li>
                <li><span><img src="images/pointer.png" /></span><a href="#">关于征集“本科生实践教学基地”的通...</a></li>
                <li><span><img src="images/pointer.png" /></span><a href="#">2009级本科生各专业生产实习优秀团队...</a></li>
                <li><span><img src="images/pointer.png" /></span><a href="#">2010级本科生各专业生产实习优秀团队...</a></li>
                <li><span><img src="images/pointer.png" /></span><a href="#">2009级本科生各专业生产实习优秀团队...</a></li>
                <li style="margin-bottom:6px;"><span><img src="images/pointer.png" /></span><a href="#">2010级本科生各专业生产实习优秀团队...</a></li>
            </ul>
            -->
            <ul>
            <?php if (is_array($notice)) foreach ($notice as $r): ?>
                <li style="margin-top:1px;">
                    <tr>
                        <!--<td><span><img src="images/pointer.png" /></td> -->                     
                        <td><a title="<?= $r->title ?>" href="<?= base_url() ?>index.php/admin/news/newsDetails1/<?= $r->newsId ?>" target="_blank">
                                <b>.
                                    <?php
                                    if (strLength($r->title, $charset = 'utf-8') > 15) {
                                        echo utf8Substr($r->title, $from = 0, 15);
                                        echo "...";
                                    } else {
                                        echo $r->title;
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
                <a href="<?= base_url() ?>index.php/admin/news/guidingLists" target="_blank">更多>></a>
            </div>
        </div>

        <div class="providelist">
            <!--
            <ul>
                <li><span class="provitedate">2014-03-26</span><span><img src="images0/pointer.png" /></span><a href="#">本科生生产实习管理办法</a></li>
                <li><span class="provitedate">2014-03-26</span><span><img src="images0/pointer.png" /></span><a href="#">本科生实践教学基地申请表</a></li>
                <li><span class="provitedate">2014-03-26</span><span><img src="images0/pointer.png" /></span><a href="#">本科生生产实习指导书</a></li>
                <li><span class="provitedate">2014-03-26</span><span><img src="images0/pointer.png" /></span><a href="#">本科生生产实习保密承诺书</a></li>
                <li><span class="provitedate">2014-03-26</span><span><img src="images0/pointer.png" /></span><a href="#">2009本科生生产实习指导书</a></li>
                <li><span class="provitedate">2014-03-26</span><span><img src="images0/pointer.png" /></span><a href="#">本科生生产实习保密承诺书</a></li>
            </ul>-->
            <ul>
            <?php if (is_array($guiding)) foreach ($guiding as $r): ?>
                <li>
                    <tr>
                <!-- <td><span class="provitedate"><?= $r->sendTime ?></span><span><img src="images0/pointer.png" /></td>-->
                        <td><a title="<?= $r->title ?>" href="<?= base_url() ?>index.php/admin/news/newsDetails2/<?= $r->newsId ?>" target="_blank">
                                <b>.
                                    <?php
                                    if (strLength($r->title, $charset = 'utf-8') > 14) {
                                        echo utf8Substr($r->title, $from = 0, 14);
                                        echo "...";
                                    } else {
                                        echo $r->title;
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
                <a href="<?= base_url() ?>index.php/admin/news/newsLists" target="_blank">更多>></a>
            </div>
        </div>

        <div class="newslist1">
            <ul>
            <?php if (is_array($news)) foreach ($news as $r): ?>
                <li>
                    <tr>
                        <td><span class="newsdate"><?= $r->sendTime ?></span></td>
                        <td><a title="<?= $r->title ?>" href="<?= base_url() ?>index.php/admin/news/newsDetails3/<?= $r->newsId ?>" target="_blank">
                                <b>.
                                    <?php
                                    if (strLength($r->title, $charset = 'utf-8') > 24) {
                                        echo utf8Substr($r->title, $from = 0, 24);
                                        echo "...";
                                    } else {
                                        echo $r->title;
                                    }
                                    ?>
                                </b>         

                            </a></td>
                    </tr></li>
                <?php endforeach; ?></ul>
        </div>    
    </div>		
</div>


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


<div class="linkbox">
    <div class="linktop">
        <div class="linktitle"><p>友情链接</p></div>
    </div>
    <div class="linklist">
        <a href="http://www.moe.gov.cn/">教育部</a>
        <a href="http://cau.edu.cn">中国农业大学</a>
        <a href="http://nxy.cau.edu.cn/">农学与生物技术学院</a>
        <a href="http://cbs.cau.edu.cn/">生物学院</a>
        <a href="http://cast1.cau.edu.cn/">动物科技学院</a>
        <a href="http://cvm.cau.edu.cn/">动物医学院</a>
        <a href="http://spxy.cau.edu.cn/">食品科学与营养工程学院</a>
        <a href="http://zihuan1.cau.edu.cn/">资源与环境学院</a>
        <a href="http://www.ciee.cn/">信息与电气工程学院</a>
        <a href="http://coe.cau.edu.cn/">工学院</a>
        <a href="http://water.cau.edu.cn/">水利与土木工程学院</a>
        <a href="http://sci.cau.edu.cn/">理学院</a>
        <a href="http://www2003.cau.edu.cn/cem/">经济管理学院</a>
        <a href="http://cohd.cau.edu.cn/">人文与发展学院(公共管理学院) </a>
    </div>
</div>
