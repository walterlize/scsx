<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习学生信息及审核</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            
            <th scope="col" class="td1">课程号</th>
            <th scope="col" class="td3">课序号</th>
            <th scope="col" class="td1">课程名称</th>
            <th scope="col" class="td3">实习模式</th>
            <th scope="col" class="td1">查看/查看 报名信息</th>
        </tr>
        <?php if (is_array($course)) foreach ($course as $r): ?>
                <tr class="RowStyle" align="center">
                    
                    <td class="td1"><?= $r['courseId'] ?></td>
                    <td class="td3"><?= $r['courseNum'] ?></td>
                    <td class="td1"><?= $r['courseName'] ?></td>
                    <td class="td3"><?= $r['coursePattern'] ?></td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/teacher/audit/auditList/<?= $r['cour_id'] ?>">操作</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <div align="right"><?=$num?></div>
    <div class="page"><?= $page ?></div>
</div>