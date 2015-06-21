<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习总结任务信息列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
	        <th scope="col">课程号</th>
	        <th scope="col">课序号</th>
	        <th scope="col">课程名</th>
            <th scope="col">标题</th>
            <th scope="col">发布时间</th>
            <th scope="col">结束时间</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($mission)) foreach ($mission as $r): ?>
                <tr class="RowStyle" align="center">        
                    <td><?= $r['miss_cour_no'] ?></td>  
                    <td><?= $r['miss_cour_num'] ?></td>  
                    <td><?= $r['miss_cour_name'] ?></td>  
                    <td><?= $r['miss_title'] ?></td>
                    <td><?= $r['miss_start_time'] ?></td>  
                    <td><?= $r['miss_end_time'] ?></td>  
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/teacher/mission/missionDetail/<?= $r['miss_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="7" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/teacher/mission/missionNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/teacher/mission/missionList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>