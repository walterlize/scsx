
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
    	<div class="enterrighttitle"><p>院级管理员用户列表</p></div>
        <div class="enterrightlist">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
                	<td class="line2" style="width: 30%">管理员学院</td>
                	<td class="line2" style="width: 15%">登录名</td>
                	<td class="line2" style="width: 15%">真实姓名</td>
                	<td class="line2" style="width: 15%">密码</td>
                	<td class="line2" style="width: 15%">用户类型</td>
                </tr>  
                <?php if (is_array($user)) foreach ($user as $r): ?>
                <tr class="tablecontent">
                    <td class="line2" style="width: 30%"><?= $r['college'] ?></td>
                    <td class="line2" style="width: 15%"><?= $r['teaId'] ?></td>
                    <td class="line2" style="width: 15%"><?= $r['teaName'] ?></td>
                    <td class="line2" style="width: 15%"><?= $r['password'] ?></td>
                     <td class="line2" style="width: 15%"><?= $r['teaRole'] ?></td> 
                </tr>
            <?php endforeach; ?>
                <tr>
            <td class="tablecontent" colspan="6" align="center">
                <!--  <a href="#" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/user/userNew';">新增</a>-->
                <!--<input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/college/collegeNew';" id="btnDelete" class="input" />               
           -->
            </td>
        </tr>
            </table>
      </div>
        <div class="pagenumber" align="center"><?= $page ?></div>       
    </div>
