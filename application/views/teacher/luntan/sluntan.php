<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">查看回帖列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">发帖类别</th>
            <th scope="col" class="td3">发帖主题</th>
            <th scope="col" class="td1">发帖时间</th>
            <th scope="col" class="td3">回帖时间</th>
            <th scope="col" class="td1">操作</th>
        </tr>
        <?php if (is_array($luntan)) foreach ($luntan as $r): ?>
                <tr class="RowStyle" align="center">     
                    <td class="td1"><?= $r['type'] ?></td> 
                    <td class="td3"><?= $r['theme'] ?></td>
                    <td class="td1"><?= $r['time1'] ?></td>
                    
                    <td class="td3"><?= $r['time2'] ?></td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/teacher/luntan/luntanDetails/<?= $r['l_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>