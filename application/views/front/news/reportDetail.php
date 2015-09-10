<!-----导航内容----->
		    <nav id="nav">
		    	<ul class="navbox">
		        	<li><a href="<?= base_url() ?>">首页</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/news/noticeList">通知公告</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/news/ruleList">实习规定</a></li>
		            <li><a class="navcurrent" href="<?= base_url() ?>index.php/front/report/reportList">优秀实习汇报</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/imgnews/imgList">实习风采</a></li>
		            <li><a href="<?= base_url() ?>index.php/index/instruction/7/7">互动交流</a></li>
		            <li><a href="<?= base_url() ?>index.php/index/contact">联系我们</a></li>
		        </ul>
		    </nav>
		    <!-----导航内容结束----->
		</header>
		<!-----头部内容结束----->

<div class="newsbox" style="width:1100px">
	<div class="nowpagebox" style="width:1100px">
    	<img src="<?=base_url()?>images/newspage1.png" />
        <p>当前位置：<a href="<?= base_url() ?>">首页</a>&nbsp;>&nbsp;<span><?=$title?></span></p>
    </div>
    <div class="news">
    	<div class="newsleftbox">
        	<p class="newspage3"><img src="<?=base_url()?>images/newspage3.png" /></p>
            <p class="newspage4"><img src="<?=base_url()?>images/newspage4.png" /></p>
            <p class="newspage5"><img src="<?=base_url()?>images/newspage5.png" /></p>
        </div>
        <div class="newsrightbox" style="width:800px">
        	<div class="newrightboxtop" style="width:800px">
            	<div class="practicenews">
                	<div class="practicenewsleft" style="width: 200px;">
                		<span class="practice"><?=$title?></span>
                    </div>
                    <div class="practicenewsright" style="width: 50px;">
                    	<p class="newsenglish"></p>
                    </div>
                </div>
                <p class="bigtitle"><?=$news->repo_title?></p>
                <p class="time">时间:<?=$news->repo_time ?> </p>
            </div>
            <div class="newss">
            	<p class="part1"><?=$news->repo_content?></p>
            </div>
        	<div class="backbox"><p align="center"><input type="button" value="关闭窗口" id="close" class="input" onclick="window.close()"></p></div>      
        </div>     
    </div>
</div>
