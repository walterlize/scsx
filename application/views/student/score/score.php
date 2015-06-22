<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">成绩</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">课程号</th>
            <th scope="col" class="td3">课序号</th>
            <th scope="col" class="td1">课程名</th>
            <th scope="col" class="td3">分数</th>
            
            <th scope="col" class="td1">操作</th>
        </tr>
        <?php if (is_array($score)) foreach ($score as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['cour_no'] ?></td>
                    <td class="td3"><?= $r['cour_num'] ?></td>
                    <td class="td1"><?= $r['cour_name'] ?></td>
                    <td class="td3"><?= $r['scor_teac_score'] ?></td>
                    
                    <td class="td1">
                   		<a id="" href="<?= base_url() ?>index.php/student/scoreteac/scoreDetail/<?= $r['scor_id']?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>

    <div align="center"></div>
</div>


