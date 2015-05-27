<div class="zhuti2">
    <div align="center"  style="font-family:宋体;font-size:14pt;line-height:20pt;color:#000" class="zhuti21"><B>实习基地材料</B></div>
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
        <tbody><tr>
                <td valign="top" style="padding:8px; ">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody> 
                            <?php if (is_array($choose_teacher)) foreach ($choose_teacher as $r): ?>
                                    <tr>
                                        <td><a title="<?= $r['comName'] ?>" href="<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherDetails/<?= $r['c_id'] ?>" target="_blank">
                                                <b>.
                                                    <?
                                                    if (strLength($r['comName'], $charset = 'utf-8') > 24) {
                                                        echo utf8Substr($r['comName'], $from = 0, 24);
                                                        echo "...";
                                                    } else {
                                                        echo $r['comName'];
                                                    }
                                                    ?>
                                                </b>         
                                            </a></td>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody></table></td>
            </tr>
        </tbody></table>
    <div align="center"><?= $page ?></div>
</div>

