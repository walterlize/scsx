<style>
<!--
td{
text-align: left;
}
-->
</style>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

<div class="enterright" style="background-color: #F8F8F8;" >
    	<div class="enterrighttitle" ><p>实习基地用户管理</p></div>
        <div class="enterrightlist" >
     
        	<table width="99%" cellpadding="0" cellspacing="0">
        		<tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px;">用户id</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $compuser->u_id ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">用户登陆名</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $compuser->u_name ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">用户姓名</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $compuser->realname ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">用户密码</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $compuser->password ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">性别</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $compuser->sex ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">电话</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $compuser->phone ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">邮箱</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $compuser->email ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">地址</td>
		            <td class="tablecontent" style="padding-left: 15px" ><?= $compuser->address ?>&nbsp;</td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">用户状态</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <?php if($compuser->ustateId == '1')echo "有效用户"; else echo "状态异常" ?>&nbsp;
		            </td>
		        </tr>
		        
		        <tr>
		            <td colspan="2" class="td3" style="text-align: center;">
		                <input type="button" name="btnSave" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncompanyuser/ncompanyuserEdit/<?= $compuser->u_id ?>';" id="btnSave" class="input" />
                        <input type="button" name="btnSave" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/admin/ncompanyuser/ncompanyuserDelete/<?= $compuser->u_id ?>')" id="btnSave" class="input">
		                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncompanyuser/ncompanyuserList';" id="btnReturn" class="input" />      </td>
		        </tr>
            </table>
        </div>     
</div>
