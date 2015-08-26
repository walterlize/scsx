<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习预算列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">序号</th>
	        <th scope="col" class="td3">实习名称</th>
	        <th scope="col" class="td1">实习编号</th>
	        <th scope="col" class="td3">审核状态</th>
            <th scope="col" class="td1">操作</th>
            
        </tr>
        <?php if (is_array($yusuan)) foreach ($yusuan as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $key+1 ?></td>
                    <td class="td3"><?= $r['ys_name'] ?></td>
                    <td class="td1"><?= $r['ys_no'] ?></td>
                    <td class="td3">
                    <?php 
            	    if($r['ys_state'] == 0) echo"未提交";
            	    if($r['ys_state'] == 1) echo"已提交等待审核";
            	    if($r['ys_state'] == 2) echo"院级管理员审核成功";
            	    if($r['ys_state']  == 3) echo"院级管理员审核失败";
            	    if($r['ys_state']  == 4) echo"校级管理员审核成功";
            	    if($r['ys_state']  == 5) echo"校级管理员审核失败";
            	
            	?>
                    </td>
                   
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/superadmin/yusuan/yusuanDetail/<?= $r['ys_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
        </tr>
    </table>
    <div align="right"><?= $num ?></div>
    <div align="center"><?= $page ?></div>
</div>