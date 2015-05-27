
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
    	<div class="enterrighttitle"><p>实习基地用户列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line2" >用户id</td>
                	<td class="line2" >登录名</td>
                	<td class="line2" >真实姓名</td>
                	<td class="line2" >密码</td>
                	<td class="line2" >操作</td>
                </tr>  
                <?php if (is_array($compuser)) foreach ($compuser as $r): ?>
                <tr class="tablecontent">
                    <td class="line2"><?= $r['u_id'] ?></td>
                    <td class="line2"><?= $r['u_name'] ?></td>
                    <td class="line2"><?= $r['realname'] ?></td>
                    <td class="line2"><?= $r['password'] ?></td>
                    <td class="line2" >
                        <a id="" href="<?= base_url() ?>index.php/admin/ncompanyuser/ncompanyUserDetail/<?= $r['u_id'] ?>">详细</a>
                    </td>        
                </tr>
            <?php endforeach; ?>
            <tr>
            <td colspan="5" style="text-align: center;">
            <input type="button" name="btnSave" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncompanyuser/ncompanyuserNew';" id="btnSave" class="input" />
            </td>
            </tr>
            </table>
      </div>
        <div class="pagenumber" align="center"><?=$page?></div>       
    </div>
