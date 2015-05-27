<!--
<div class="zhuti2">
    <div align="center"  style="font-family:宋体;font-size:14pt;line-height:20pt;color:#000" class="zhuti21"><B>实习新闻</B></div>
    <br />
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
            <tbody><tr>
                    <td valign="top" style="padding:8px; ">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody> 
                                <?php if (is_array($news)) foreach ($news as $r): ?>
                                        <tr>
                                            <td><a title="<?= $r['title'] ?>" href="<?= base_url() ?>index.php/admin/news/newsDetails/<?= $r['newsId'] ?>" target="_blank">
                                                    <b>.
                                                        <?php
                                                        if (strLength($r['title'], $charset = 'utf-8') > 24) {
                                                            echo utf8Substr($r['title'], $from = 0, 24);
                                                            echo "...";
                                                        } else {
                                                            echo $r['title'];
                                                        }
                                                        ?>
                                                    </b>         

                                                </a></td><td align="right"><?= $r['sendTime'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody></table></td>
                </tr>
            </tbody></table>
        <div align="center"><?= $page ?></div>
    </div>-->
<div class="newsbox">
    <div class="nowpagebox">
        <img src="<?= base_url() ?>images/newspage1.png" />
        <p>当前位置：首页&nbsp;>&nbsp;<span>实习规定</span></p>
    </div>
    <div class="news">
        <div class="newsleftbox">
            <p class="newspage3"><img src="<?= base_url() ?>images/newspage3.png" /></p>
            <p class="newspage4"><img src="<?= base_url() ?>images/newspage4.png" /></p>
            <p class="newspage5"><img src="<?= base_url() ?>images/newspage5.png" /></p>
        </div>
        <div class="newsrightbox">
            <div class="newrightboxtop1">
                <div class="practicenews">
                    <div class="practicenewsleft">
                        <span class="practice">实习</span><span class="newsfont">规定</span>
                    </div>
                    <div class="practicenewsright">
                        <p class="newsenglish">The practice of rules</p>
                    </div>
                </div>
            </div> 


            <div class="practicenewslist">
                <!--
                <ul>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于召开2013年“生产认识实习”交流总结大会的相关通知</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于征集“本科生实践教学基地”的通知</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">2009级本科生各专业生产实习优秀团队及优秀学生评选结果</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于召开2013年“生产认识实习”交流总结大会的相关通知</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于召开2013年“生产认识实习”交流总结大会的相关通知</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于召开2013年“生产认识实习”交流总结大会的相关通知</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于征集“本科生实践教学基地”的通知 </a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于召开2013年“生产认识实习”交流总结大会的相关通知</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于召开2013年“生产认识实习”交流总结大会的相关通知</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于召开2013年“生产认识实习”交流总结大会的相关通知</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于征集“本科生实践教学基地”的通知</a></li>
                <li><span><img src="images/newspage7.png"/></span><span class="date">2014-03-26</span><a href="#">关于召开2013年“生产认识实习”交流总结大会的相关通知</a></li>
                </ul>-->
                <ul>
                <?php if (is_array($news)) foreach ($news as $r): ?>
                    <li>
                        <tr>
                            <td class="date"><span><img src="<?= base_url() ?>images/newspage7.png"/></span><span class="date"><?= $r['sendTime'] ?></span></td>
                            <td><a title="<?= $r['title'] ?>" href="<?= base_url() ?>index.php/admin/news/newsDetails2/<?= $r['newsId'] ?>" target="_blank">
                                    <b>.
                                        <?php
                                        if (strLength($r['title'], $charset = 'utf-8') > 24) {
                                            echo utf8Substr($r['title'], $from = 0, 24);
                                            echo "...";
                                        } else {
                                            echo $r['title'];
                                        }
                                        ?>
                                    </b>         

                                </a></td>
                        </tr></li>
                    <?php endforeach; ?></ul>
            </div>
            <div class="newspagenumbox">
                <div class="newspagenum">
                    <?= $page ?>
                </div>
            </div>            
        </div>
    </div>
</div>

