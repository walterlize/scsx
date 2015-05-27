<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>查看回帖列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">发帖类别</th><th scope="col">发帖主题（请注明实习基地）</th><th scope="col">发帖时间</th><th scope="col">回帖时间</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($luntan)) foreach ($luntan as $r): ?>
                <tr class="RowStyle" align="center">   
                    <td><?= $r['type'] ?></td> 
                    <td><?= $r['theme'] ?></td>
                    <td><?= $r['time1'] ?></td>
                    
                    <td><?= $r['time2'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/student/luntan/luntanDetails/<?= $r['l_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>