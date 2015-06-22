<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>填写实习总结列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">教师姓名</th><th scope="col">下达时间</th><th scope="col">实习总结任务内容</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($summary1)) foreach ($summary1 as $r): ?>
                <tr class="RowStyle" align="center">               
                    <td><?= $r['trealname'] ?></td> 
                    <td><?= $r['workTime'] ?></td>
                    <td><?= $r['content'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/student/summary/summaryDetail1/<?= $r['m_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
         <?php if (is_array($summary2)) foreach ($summary2 as $r): ?>
                <tr class="RowStyle" align="center">               
                    <td><?= $r['trealname'] ?></td> 
                    <td><?= $r['workTime'] ?></td>
                    <td><?= $r['content'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/student/summary/summaryDetail2/<?= $r['m_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>