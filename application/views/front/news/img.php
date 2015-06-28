<meta charset="UTF-8">
<div class="newsbox">
    <div class="nowpagebox">
        <img src="<?= base_url() ?>images/newspage1.png" />
        <p>当前位置：首页&nbsp;>&nbsp;<span><?=$title?></span></p>
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
                        <span class="practice"><?=$title?></span>
                    </div>
                    <div class="practicenewsright">
                        <p class="newsenglish"></p>
                    </div>
                </div>
            </div> 


            <div class="practicenewslist">
               
                <ul>
                <?php if (is_array($news)) foreach ($news as $r): ?>
                    <li>
                        <tr>
                            <td class="date"><span><img src="<?= base_url() ?>images/newspage7.png"/></span><span class="date"><?= $r['news_time'] ?></span></td>
                            <td><a title="<?= $r['news_title'] ?>" href="<?= base_url() ?>index.php/front/imgnews/imgDetail/<?= $r['news_id'] ?>" target="_blank">
                                    <b>
                                        <?php
                                        if (strLength($r['news_title'], $charset = 'utf-8') > 24) {
                                            echo utf8Substr($r['news_title'], $from = 0, 24);
                                            echo "...";
                                        } else {
                                            echo $r['news_title'];
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

