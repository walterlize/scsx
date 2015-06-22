<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">本学期实习课程列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">序号</th>
            <th scope="col" class="td3">课程编号</th>
            <th scope="col" class="td1">课程名称</th>
            <th scope="col" class="td3">实习模式</th>
            <th scope="col" class="td1">是否发布</th>
            <th scope="col" class="td3">操作</th>
        </tr>
        <?php if (is_array($course)) foreach ($course as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['courseNum'] ?></td>
                    <td class="td3"><?= $r['courseId'] ?></td>
                    <td class="td1"><?= $r['courseName'] ?></td>
                    <td class="td3"><?= $r['coursePattern'] ?></td>
                    <td class="td1"><?php if($r['coursePublish']==1) echo "已发布";elseif ($r['coursePublish']==0)echo "未发布";else echo $r['coursePublish']; ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/teacher/course/courseDetail/<?= $r['id'] ?>">查看详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <div align="center"><?= $page ?></div>
</div>