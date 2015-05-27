<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>已提交实习总结列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习总结标题</th><th scope="col">提交时间</th><th scope="col">实习总结状态</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($summary)) foreach ($summary as $r): ?>
                <tr class="RowStyle" align="center">               
                    <td><?= $r['title'] ?></td>
                    <td><?= $r['sendTime'] ?></td>
                    <td><?= $r['s_state'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/student/summary/summaryDetails/<?= $r['sumId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>