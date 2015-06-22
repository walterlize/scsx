<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>查看实习总结列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习任务标题</th><th scope="col">学生学号</th><th scope="col">学生姓名</th><th scope="col">提交时间</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($tsummary)) foreach ($tsummary as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['title'] ?></td>
                    <td><?= $r['stuId'] ?></td>
                    <td><?= $r['realname'] ?></td>
                    <td><?= $r['sendTime'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/teacher/tsummary/tsummaryDetails/<?= $r['sumId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>