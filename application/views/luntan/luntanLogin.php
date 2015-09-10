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



<meta charset="UTF-8">
<div class="newsbox">
    
    <div class="news">
    	<div style="height: 400px; text-align: center; font-size: 20px;">
    		<span style="color: red">您未登录，请先登录!</span><br><br>
    		系统将在 <span id="time">5</span> 秒钟后自动跳转至首页，如果未能跳转，<a href="<?=base_url()?>" title="点击访问" style="color: blue">请点击</a>
    	</div>
    </div>
    
    <script type="text/javascript">  
     delayURL();   
     function delayURL() {
	    var delay = document.getElementById("time").innerHTML;
	    var t = setTimeout("delayURL()", 1000);
	        if (delay > 0) {
	            delay--;
	            document.getElementById("time").innerHTML = delay;
	        } else {
	     		clearTimeout(t); 
	            window.location.href = "<?= base_url()?>";
	        }       
	 }
	</script>

   
</div>

