<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">审核实习总结列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
        	<th scope="col" class="td1">课程</th>
        
            <th scope="col" class="td3">实习任务标题</th>
            <th scope="col" class="td1">学生学号</th>
            <th scope="col" class="td3">学生姓名</th>
            <th scope="col" class="td1">提交时间</th>
            <th scope="col" class="td3">操作</th>
        </tr>
        <?php if (is_array($tsummary)) foreach ($tsummary as $r): ?>
                <tr class="RowStyle" align="center">
                	<td class="td1"><?= $r['cour_name'] ?>(<?= $r['cour_no'] ?>-<?= $r['cour_num'] ?>)</td>
                    <td class="td3"><?= $r['miss_title'] ?></td>
                    <td class="td1"><?= $r['summ_stu_num'] ?></td>
                    <td class="td3"><?= $r['summ_stu_name'] ?></td>
                    <td class="td1"><?= $r['summ_time'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/teacher/tsummary/tsummaryDetail/<?= $r['summ_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>