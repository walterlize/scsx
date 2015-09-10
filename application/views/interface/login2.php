			<!-----导航内容----->
		    <nav id="nav">
		    	<ul class="navbox">
		        	<li><a class="navcurrent" href="<?= base_url() ?>">首页</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/news/noticeList">通知公告</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/news/ruleList">实习规定</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/report/reportList">优秀实习汇报</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/imgnews/imgList">实习风采</a></li>
		            <li><a href="<?= base_url() ?>index.php/index/instruction/7/7">互动交流</a></li>
		            <li><a href="<?= base_url() ?>index.php/index/contact">联系我们</a></li>
		        </ul>
		    </nav>
		    <!-----导航内容结束----->
		</header>
		<!-----头部内容结束----->



<!-----主体内容----->
<div id="maincon"> 
	<section id="maincon_01">
    	<!----通知通告---->
    	<article id="notice">
        	<header class="little_title">
            	<h2>通知通告</h2>
                <a href="<?= base_url() ?>index.php/front/news/noticeList" target="_blank">更多>></a>
            </header>
            <div class="notice_con">
            	<ul>
                	<?php if (is_array($notice)) foreach ($notice as $r): ?>
	                <li>
	                    <a href="<?= base_url() ?>index.php/front/news/newsDetail/<?= $r->news_id ?>" target="_blank" title="<?= $r->news_title ?>">
	                    <?php
                            if (strLength($r->news_title, $charset = 'utf-8') > 24) {
                                echo utf8Substr($r->news_title, $from = 0, 24);
                                echo "...";
                            } else {
                                echo $r->news_title;
                            }
                        ?>
	                    </a>
	                </li>
	                <?php endforeach; ?>
                	
                </ul>
            </div>
        </article>
        <!----通知通告结束---->
        
        <!----新闻---->
    	<article id="news">
        	<div class="foucebox">
				<div class="bd">
					<ul>
						<?php if (is_array($img1)) foreach ($img1 as $r):?>
						 
						<li>
							<a target="_blank" href="<?= base_url() ?>index.php/front/imgnews/imgDetail/<?= $r->news_id ?>">
                             	<img src="<?=$r->news_img?>">
                                <h3><?=$r->news_title?></h3>
                            </a>
						</li>
 						<?php endforeach;?>
						
                    </ul>
				</div>
				<div class="hd">
                	<div class="hoverBg" style="margin-top: 240px;"></div>
                   	<ul>
                   		<?php if (is_array($img1)) foreach ($img1 as $r):?>
                        <li class=" ">
                        	<a href="#">
                    		    <img src="<?=$r->news_img?>">
                            </a>
                        </li>
                       	<?php endforeach;?>
                  	</ul>
               	</div>
			</div>

<script type="text/javascript">
jQuery(".foucebox").slide({ mainCell:".bd ul", effect:"fold", autoPlay:true, delayTime:300, triggerTime:50, startFun:function(i){jQuery(".foucebox .hoverBg").animate({"margin-top":94*i},10);}});
</script>
            
        </article>
        <!----新闻结束---->
    </section>


    <section id="maincon_02">
    	<!----登陆框---->
    	<aside id="loginbox" class="loginbox" style="height: 236px;">
        	<header class="little_title_01">
            	<h2>用户登录</h2>
            </header>
            <section class="logincon">
            	<form id="loginin" name="form1" method="post" action="<?= base_url() ?>index.php/index/login">
                	<div class="userbox">
                    	<label for="user">用户名</label>
                        <input class="loginname" id="loginname" tabindex="1" name="u_name" notnull="true" info="用户名" value="学号或教职工号" onfocus="if(this.value == '学号或教职工号'){this.value = ''}" onblur="if(this.value==''){this.value = '学号或教职工号'} " type="text">
                    </div>
                    <div class="passwordbox">
                    	<label for="password">密&nbsp;&nbsp;&nbsp;码</label>
                        <input class="mima" id="loginname" tabindex="1" name="password" notnull="true" info="密码"  type="password"> 
                    </div>
                    <div class="juesebox">
                    	<label for="juese">角&nbsp;&nbsp;&nbsp;色</label>
                        <select name="userType" class="loginname">
                        <option value="" >请选择用户角色</option>
                        <option value="5">-----学 &nbsp;&nbsp;生------</option>
                        <option value="3">-----教 &nbsp;&nbsp;师------</option>
                    	<option value="1">-----管理员------</option>
                    </select>
                    </div>
                    <div class="buttonbox">
                    	<input type="button" name="login" id="login" value="登录" onclick="form1.submit()">
                        <input type="reset" name="clear_but" id="clear_but" value="重置" onclick="form1.reset()">
                    </div>
                    <!--  
                    <a href="#" title="">忘记密码？</a>
                    -->
                </form>
            
            
            </section>
        </aside>
        <!----登陆框结束---->
        
        <!----实习规定---->
    	<section id="guiding">
        	<header class="little_title">
            	<h2>实习规定</h2>
                <a href="<?= base_url() ?>index.php/front/news/ruleList" target="_blank">更多>></a>
            </header>
            <section class="notice_con">
            	<ul>
            	<?php if (is_array($guiding)) foreach ($guiding as $r): ?>
                	<li>
	                	<a title="<?= $r->news_title ?>" href="<?= base_url() ?>index.php/front/news/newsDetail/<?= $r->news_id ?>" target="_blank">
	                	<?php
                           if (strLength($r->news_title, $charset = 'utf-8') > 20) {
                              echo utf8Substr($r->news_title, $from = 0, 20);
                              echo "...";
                            } else {
                              echo $r->news_title;
                            }
                         ?>
	                	</a>
                	</li>
                <?php endforeach;?>
                </ul>
            </section>
        </section>
        <!----实习规定结束---->
        
        <!----实习总结---->
        
    	<section id="zongjie">
        	<header class="little_title">
            	<h2>优秀实习汇报</h2>
                <a href="<?= base_url() ?>index.php/front/report/reportList" target="_blank">更多>></a>
            </header>
            <section class="notice_con">
            	<ul>
                <?php if (is_array($report)) foreach ($report as $r): ?>
                	<li>
	                	<a title="<?= $r->repo_title ?>" href="<?= base_url() ?>index.php/front/report/reportDetail/<?= $r->repo_id ?>" target="_blank">
	                	<?php
                           if (strLength($r->repo_title, $charset = 'utf-8') > 20) {
                              echo utf8Substr($r->repo_title, $from = 0, 20);
                              echo "...";
                            } else {
                              echo $r->repo_title;
                            }
                         ?>
	                	</a>
                	</li>
                <?php endforeach;?>                
                </ul>
            </section>
        </section>
        <!----实习总结结束----> 
    </section>
    
    
    <section id="maincon_03">
    	<!----联系我们---->
    	<aside id="contact" class="contact">
        	<header class="little_title">
            	<h2>联系我们</h2>
            </header>
            <section class="contactcon">
            	<div>
                	<p>010-62737851</p>
                </div>
                <p>地址：<br>北京市海淀区清华东路17号<br>E-mial：<br>zhaolei2011@cau.edu.cn</p>
            </section>
        </aside>
        <!----联系我们结束---->
        
        <!----实习风采---->
    	<section id="fengcai" class="fengcai">
        	<header class="little_title">
            	<h2>实习风采</h2>
                <a href="<?= base_url() ?>index.php/front/imgnews/imgList" title="">更多>></a>
            </header>
            <section class="fengcaicon">
            	<div>
                	
                	<?php if (is_array($img)) foreach ($img as $r): ?>
                	    <figure>
			                <a target="_blank" href="<?= base_url() ?>index.php/front/imgnews/imgDetail/<?= $r->news_id ?>">
				                <img src="<?=$r->news_img?>"  >
				                <figcaption><?=$r->news_title?></figcaption>
			                </a>
			            </figure>
			        <?php endforeach;?>
                    
                    
                </div>
            </section>
        </section>
        <!----实习风采结束---->
    </section>
    
    
    <section id="maincon_04">
    	<!----联系我们---->
    	<aside id="friend" class="friend">
        	<header class="little_title">
            	<h2>友情链接</h2>
            </header>
            <section class="contactcon">
            	<div>
                	<ul>
                    	<li><a href="http://www.moe.gov.cn/" target="_blank">教育部</a></li>
						<li><a href="http://cau.edu.cn" target="_blank">中国农业大学</a></li>
						<li><a href="http://spxy.cau.edu.cn/" target="_blank">食品科学与营养工程学院</a></li>
						
						<li><a href="http://nxy.cau.edu.cn/" target="_blank">农学与生物技术学院</a></li>
						<li><a href="http://cbs.cau.edu.cn/" target="_blank">生物学院</a></li>
						<li><a href="http://zihuan1.cau.edu.cn/" target="_blank">资源与环境学院</a></li>
						<li><a href="http://cast1.cau.edu.cn/" target="_blank">动物科技学院</a></li>
						<li><a href="http://cvm.cau.edu.cn/" target="_blank">动物医学院</a></li>		
						<li><a href="http://coe.cau.edu.cn/" target="_blank">工学院</a></li>
						<li><a href="http://ciee.cau.edu.cn/" target="_blank">信息与电气工程学院</a></li>
						<li><a href="http://water.cau.edu.cn/" target="_blank">水利与土木工程学院</a></li>
						<li><a href="http://sci.cau.edu.cn/" target="_blank">理学院</a></li>
						<li><a href="http://www2003.cau.edu.cn/cem" target="_blank">经济管理学院</a></li>
						<li><a href="http://cohd.cau.edu.cn/" target="_blank">人文与发展学院</a></li>
						<li><a href="http://szxy1.cau.edu.cn/" target="_blank">思想政治教育学院</a></li>
				        <li><a href="http://icb.cau.edu.cn/" target="_blank">国际学院</a></li>		
                    </ul>
                </div>
            </section>
        </aside>
        <!----联系我们结束---->
    </section>

</div>
<!-----主体内容结束----->































