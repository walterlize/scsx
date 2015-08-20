<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<style>
<!--
td{
text-align: left;
padding-left: 10px;
}
-->
</style>
<div class="enterright" style="background-color: #F8F8F8">
    	<div class="enterrighttitle">
    		<p style="float: left;">管理员列表</p>
    		
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		
                	<td class="line2"  >用户名</td>
                	<td class="line2"  >姓名</td>
                	
                	<td class="line2"  >权限</th>
                	<td class="line2"  >操作</td>
                </tr>
                
                <?php if (is_array($admin)) foreach ($admin as $r): ?>
                <tr class="tablecontent">
               		 
                	<td class="line2" ><?= $r['admin_num'] ?></td>
                	<td class="line2"><?= $r['admin_name'] ?></td>
                	
                	<td class="line2"><?php if($r['admin_roleId']==1)echo "校级管理员";if($r['admin_roleId']==2)echo "院级管理员";?></td>

                	<td class="line2">
                		<a id="" href="<?= base_url() ?>index.php/superadmin/admin/adminDetail/<?= $r['admin_id'] ?>">详细</a>
                	</td>
                </tr>
                <?php endforeach; ?>
                <tr>
                <td colspan="5" align="center" style="text-align: center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/admin/adminNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/admin/adminList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
            </tr>
          
                
            </table>
            <div align="center"><?= $page ?></div>
        </div>
        
</div>