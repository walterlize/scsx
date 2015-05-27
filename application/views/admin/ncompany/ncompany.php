
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<style>
<!--
td{
	text-align: left;
	padding-left: 10px;
}
-->
</style>
	<div class="enterright">
    	<div class="enterrighttitle"><p>实习基地信息列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line2" >实习基地名称</td>
                	<td class="line2" >负责人</td>
                	<td class="line2" >上传人角色</td>
                	<td class="line2" >操作</td>
                </tr>  
                <?php if (is_array($company)) foreach ($company as $r): ?>
                <tr class="tablecontent">
                    <td class="line2"><?= $r['comName'] ?></td>
                    <td class="line2"><?= $r['u_name'] ?></td>
                    <td class="line2"><?php if($r['addType']==2)echo"管理员";if($r['addType']==5)echo"学生"; ?></td>
                    <td class="line2" >
                        <a id="" href="<?= base_url() ?>index.php/admin/ncompany/ncompanyDetail/<?= $r['comId'] ?>">详细</a>
                    </td>        
                </tr>
            <?php endforeach; ?>
            <tr>
            <td colspan="5" style="text-align: center;">
            <input type="button" name="btnSave" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncompany/ncompanyNew';" id="btnSave" class="input" />
            </td>
            </tr>
            </table>
      </div>
        <div class="pagenumber" align="center"><?=$page?></div>       
    </div>
