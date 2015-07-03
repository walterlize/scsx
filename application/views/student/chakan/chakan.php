<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习报名查看列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">模式</th>
            <th scope="col" class="td3">课程号</th>
            <th scope="col"  class="td1">课序号</th>
            <th scope="col" class="td3">课程名</th>
            <th scope="col" class="td1" >基地名</th>
            <th scope="col" class="td3">指导教师姓名</th>
            <th scope="col"  class="td1">报名状态</th>
            <th scope="col" class="td3">操作</th>
        </tr>
        <?php if (is_array($chakan)) foreach ($chakan as $r): ?>
                <tr class="RowStyle" align="center">
                    <td  class="td1"><?= $r['patt_type'] ?></td>
                    <td class="td3"><?= $r['elco_cour_no'] ?></td>
                    <td  class="td1"><?= $r['elco_cour_num'] ?></td>
                    <td class="td3"><?= $r['cour_name'] ?></td>
                    <td  class="td1"><?= $r['comp_name'] ?></td>
                    <td class="td3"><?= $r['cour_teac_name'] ?></td>
                    <td  class="td1"><?= $r['usta_type'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/student/chakan/chakanDetail/<?= $r['elco_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>