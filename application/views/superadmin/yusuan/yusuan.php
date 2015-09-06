<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

<div class="enterright" style="background-color: #F8F8F8">
    	<div class="enterrighttitle">
    		<p style="float: left;">实习预算列表</p>
    		
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="99%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	
                	<th scope="col" >序号</th>
			        <th scope="col" >实习名称</th>
			        <th scope="col" >实习编号</th>
			        <th scope="col" >审核状态</th>
		            <th scope="col" >操作</th>
                </tr>
                <?php if (is_array($yusuan)) foreach ($yusuan as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td ><?= $key+1 ?></td>
                    <td ><?= $r['ys_name'] ?></td>
                    <td ><?= $r['ys_no'] ?></td>
                    <td >
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
	        <tr></tr>
               
                
            </table>
            <div align="right"><?= $num ?></div>
    		<div align="center"><?= $page ?></div>
        </div>
        
</div>



