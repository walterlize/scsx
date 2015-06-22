<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>已提交评价实习结果列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">课程名</th>
            <th scope="col">学生学号</th>
            <th scope="col">学生姓名</th>
            <th scope="col">分数</th>
            <th scope="col">操作</th>
        </tr>
        <?php $i=0?>
        <?php if (is_array($score)) foreach ($score as $r): ?>
                <tr class="RowStyle" align="center"> 
               		<td><?= $course[$i]->courseName ?></td>
                	<td><?= $r['stuId'] ?></td>  
                    <td><?= $stu[$i]->stuName ?></td>
                    <td><?= $r['score'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/teacher/score/scoreDetails/<?= $r['s_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php $i++;endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>