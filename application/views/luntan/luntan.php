<meta charset="UTF-8">
<!-----导航内容----->
		    <nav id="nav">
		    	<ul class="navbox">
		        	<li><a href="<?= base_url() ?>">首页</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/news/noticeList">通知公告</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/news/ruleList">实习规定</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/report/reportList">优秀实习汇报</a></li>
		            <li><a href="<?= base_url() ?>index.php/front/imgnews/imgList">实习风采</a></li>
		            <li><a class="navcurrent" href="<?= base_url() ?>index.php/index/instruction/7/7">互动交流</a></li>
		            <li><a href="<?= base_url() ?>index.php/index/contact">联系我们</a></li>
		        </ul>
		    </nav>
		    <!-----导航内容结束----->
		</header>
		<!-----头部内容结束----->

<!--互动交流-->
<div class="newsbox">
	<div class="nowpagebox">
    	<img src="<?= base_url() ?>images/newspage1.png" />
        <p>当前位置：<a href="<?= base_url() ?>">首页</a>&nbsp;>&nbsp;<span>互动交流</span></p>
    </div>
    <div class="news">
    	<div class="noanswerbox">
        	<div class="noanswertitle">未回复贴子</div>
             <?php for($i=0;$i<count($luntan1);$i++):?>
            <div class="answerto">
            	发帖人：<?=$luntan1[$i]->stuName?>&nbsp;&nbsp;&nbsp;&nbsp;
            	发帖时间：<?=$luntan1[$i]->time1?>
            </div>
            <div class="answerto1">
           		 <?=$luntan1[$i]->theme?><br>
           		 <div style="width:400px; word-wrap:break-word; margin-left: 20px; line-height: 25px;">
           		 <?=$luntan1[$i]->content?>
           		 </div>
            </div>
            <div class="answerfrom">
            	<p class="answerfrom1"></p>
            	<p class="answerfrom1"></p>
            	<p class="answer"></p>
            	<p class="answertime"></p>
            	<p class="answertime"></p>
           </div>  
           <?php endfor;?>  
        </div>
        
        <div class="answerbox">
            <div class="answertitle">已回复贴子</div>
            <?php for($i=0;$i<count($luntan2);$i++):?>
            <div class="answerto">
            	发帖人：<?=$luntan2[$i]->stuName?>&nbsp;&nbsp;&nbsp;&nbsp;发帖时间：<?=$luntan2[$i]->time1?>
            </div>
            <div class="answerto1" >
           		 <?=$luntan2[$i]->theme?><br>
           		 <div style="width:400px; word-wrap:break-word; margin-left: 20px; line-height: 25px;">
           		 <?=$luntan2[$i]->content?>
           		 </div>
            </div>
            <div class="answerfrom">
            	<p class="answerfrom1">回复：</p>
            	<p class="answerfrom1"></p>
            	<p class="answer" style="width:390px; word-wrap:break-word; margin-left: 40px; line-height: 25px;"><?=$luntan2[$i]->reply?></p>
            	<p class="answertime"><?=$luntan2[$i]->time2?></p>
            	<p class="answertime"><?=$luntan2[$i]->teaName?></p>
           </div>  
           <?php endfor;?>      
        </div>  
    </div>
</div>

		
		