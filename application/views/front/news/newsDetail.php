<div class="newsbox" style="width:1100px">
	<div class="nowpagebox" style="width:1100px">
    	<img src="<?=base_url()?>images/newspage1.png" />
        <p>当前位置：首页&nbsp;>&nbsp;<span><?=$title?></span></p>
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
                	<div class="practicenewsleft">
                		<span class="practice"><?=$title?></span>
                    </div>
                    <div class="practicenewsright">
                    	<p class="newsenglish"></p>
                    </div>
                </div>
                <p class="bigtitle"><?=$news->news_title?></p>
                <p class="time">时间:<?=$news->news_time ?> </p>
            </div>
            <div class="newss">
            	<p class="part1"><?=$news->news_content?></p>
            </div>
        	<div class="backbox"><p align="center"><input type="button" value="关闭窗口" id="close" class="input" onclick="window.close()"></p></div>      
        </div>     
    </div>
</div>
