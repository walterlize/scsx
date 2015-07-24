<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习汇报列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col"class="td1">课程</th>
            <th scope="col"class="td3">标题</th>
            <th scope="col"class="td1">时间</th>
            <th scope="col"class="td3">状态</th>
            <th scope="col"class="td1">操作</th>
        </tr>
        <?php if (is_array($repo)) foreach ($repo as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $r['repo_cour_name'] ?>(<?= $r['repo_cour_no'] ?>-<?= $r['repo_cour_num'] ?>)</td>
                    <td class="td3"><?= $r['repo_title'] ?></td>  
                    <td class="td1"><?= $r['repo_time'] ?></td> 
                    <td class="td3">
                    <?php 
                    	if($r['repo_state']==1) echo "草稿"; 
                    	if($r['repo_state']==2) echo "待审核";
                    	if($r['repo_state']==3) echo "教师审核失败";
                    	if($r['repo_state']==4) echo "教师审核成功";
                    	if($r['repo_state']==5) echo "管理员审核失败";
                    	if($r['repo_state']==6) echo "管理员审核成功";
                    	
                    ?>
                    
                    </td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/student/report/reportDetail/<?= $r['repo_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="5" align="center" class="td3">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/student/report/reportNew';" id="btnDelete" class="input" />
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>