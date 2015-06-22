<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习总结任务信息列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">序号</th>
	        <th scope="col" class="td3">课程号</th>
	        <th scope="col" class="td1">课序号</th>
	        <th scope="col" class="td3">课程名</th>
            <th scope="col" class="td1">标题</th>
            <th scope="col" class="td3">发布时间</th>
            <th scope="col" class="td1">结束时间</th>
            <th scope="col" class="td3">操作</th>
        </tr>
        <?php if (is_array($mission)) foreach ($mission as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $key+1 ?></td>
                    <td class="td3"><?= $r['miss_cour_no'] ?></td>
                    <td class="td1"><?= $r['miss_cour_num'] ?></td>
                    <td class="td3"><?= $r['miss_cour_name'] ?></td>
                    <td class="td1"><?= $r['miss_title'] ?></td>
                    <td class="td3"><?= $r['miss_start_time'] ?></td>
                    <td class="td1"><?= $r['miss_end_time'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/teacher/mission/missionDetail/<?= $r['miss_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="8" align="center" class="td3">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/teacher/mission/missionNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/teacher/mission/missionList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="right"><?= $num ?></div>
    <div align="center"><?= $page ?></div>
</div>