<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>学生信息列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习项目名称</th><th scope="col">学生院系</th><th scope="col">学生学号</th><th scope="col">学生姓名</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($score1)) foreach ($score1 as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['courseName'] ?></td>
                    <td><?= $r['stuMajor'] ?></td>
                    <td><?= $r['stuId'] ?></td>
                    <td><?= $r['stuName'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/teacher/score/scoreDetail1/<?= $r['b_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
         
    </table>
    <div align="center"><?= $page ?></div>
</div>