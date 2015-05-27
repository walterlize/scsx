<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>已提交评价实习结果列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">学生学号</th><th scope="col">学生姓名</th><th scope="col">分数</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($mscore)) foreach ($mscore as $r): ?>
                <tr class="RowStyle" align="center"> 
                    <td><?= $r['stuId'] ?></td>
                    <td><?= $r['stuName'] ?></td>
                    <td><?= $r['score'] ?></td>                  
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/master/mscore/mscoreDetails/<?= $r['s_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>