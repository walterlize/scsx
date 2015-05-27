<!--<div align="center">
  <div class="context">
<div style="width:90%">
<br />
<TABLE width="100%" border="0">
    <TR>
    	<TD align="center" style="font-family:宋体;font-size:14pt;line-height:20pt;color:#000"><B><?=$title?></B></TD>
	</TR>
        <TR>
            <TD align="right"><HR size="1" color="#CC0066"><FONT color="black" style="font-size:10pt">时间:<?= $sendTime ?> &nbsp;&nbsp;</FONT></TD>
        </TR>
</TABLE>
<div>
    <div align="left" style="width:90%"><?=$content?></div>
    <br>
    <p align="center"><input type="button" value="关闭窗口" id="close" class="input" onclick="window.close()"></p>
    <br />
</div>
</div>
</div>
</div>-->
<div class="newsbox">
	<div class="nowpagebox">
    	<img src="<?= base_url() ?>images/newspage1.png" />
        <p>当前位置：首页&nbsp;>&nbsp;<span>通知公告</span></p>
    </div>
    <div class="news">
    	<div class="newsleftbox">
        	<p class="newspage3"><img src="<?= base_url() ?>images/newspage3.png" /></p>
            <p class="newspage4"><img src="<?= base_url() ?>images/newspage4.png" /></p>
            <p class="newspage5"><img src="<?= base_url() ?>images/newspage5.png" /></p>
        </div>
        <div class="newsrightbox">
        	<div class="newrightboxtop">
            	<div class="practicenews">
                	<div class="practicenewsleft">
                		<span class="practice">通知</span><span class="newsfont">公告</span>
                    </div>
                    <div class="practicenewsright">
                    	<p class="newsenglish">The announcement</p>
                    </div>
                </div>
                <p class="bigtitle"><?=$title?></p>
                <p class="time">日期:<?= $sendTime ?></p>
            </div>
            <div class="newss">
            	<p class="part1"><?=$content?></p>                
            </div>
        	<div class="backbox"><input type="button" value="关闭窗口" id="close" class="input" onclick="window.close()"></div>      
        </div>     
    </div>
</div>