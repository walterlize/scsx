<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">已评价学生</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">学号</th>
            <th scope="col" class="td3">姓名</th>
            <th scope="col" class="td1">班级</th>
            <th scope="col" class="td1">分数</th>
            
            <th scope="col" class="td3">操作</th>
        </tr>
        <?php if (is_array($stuscore)) foreach ($stuscore as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['stu_num'] ?></td>
                    <td class="td3"><?= $r['stu_name'] ?></td>
                    <td class="td1"><?= $r['stu_class'] ?></td>
                    <td class="td1"><?= $r['scor_teac_score'] ?></td>
                    
                    
                    <td class="td3">
                   		<a id="" href="<?= base_url() ?>index.php/teacher/scoreappr/scoreDetail/<?= $r['scor_id']?>/<?=$cour_id?>">详情</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>

    <div align="center"><?= $page ?></div>
</div>


