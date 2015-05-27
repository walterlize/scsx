<style>
<!--
td{
text-align: left;
}
-->
</style>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

<div class="enterright" style="background-color: #F8F8F8;" >
    	<div class="enterrighttitle" ><p>实习基地用户编辑</p></div>
        <div class="enterrightlist" >
        <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/ncompanyuser/save" id="form1">
            <input type="hidden" value="<?= $compuser->u_id?>" name="u_id" id="u_id" />
     
        	<table width="99%" cellpadding="0" cellspacing="0">

		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">用户登陆名</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<input name="u_name" type="text" id="u_name" value="<?= $compuser->u_name ?>" size="50"   isRequired="true" />
                    	<font color="red">*</font><span id="u_nameMsg" class="MsgHide">登陆名不能为空！</span>
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">用户姓名</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<input name="realname" type="text" id="realname" value="<?= $compuser->realname ?>" size="50" />
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">用户密码</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<input name="password" type="text" id="password" value="<?= $compuser->password ?>" size="50"   isRequired="true" />
                    	<font color="red">*</font><span id="passwordMsg" class="MsgHide">密码不能为空！</span>
		            
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">性别</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <select name="sex">
		            	<option value="男" <?php if($compuser->sex =="男") echo "selected"?>>男</option>
		         	   <option value="女" <?php if($compuser->sex =="女") echo "selected"?>>女</option>
		            </select>
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">电话</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <input name="phone" type="text" id="phone" value="<?= $compuser->phone ?>" size="50" />
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">邮箱</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <input name="email" type="text" id="email" value="<?= $compuser->email ?>" size="50" />
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">地址</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <input name="address" type="text" id="address" value="<?= $compuser->address ?>" size="50" />
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">用户状态</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <select name="ustateId">
		            	<option value="1" <?php if($compuser->ustateId =="1") echo "selected"?>>有效用户</option>
		         	   <option value="0" <?php if($compuser->ustateId =="0") echo "selected"?>>状态异常</option>
		            </select>
		            </td>
		        </tr>
		        
		        <tr>
		            <td colspan="2" class="td3" style="text-align: center;">
		                <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
		                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncompanyuser/ncompanyuserDetail/<?= $compuser->u_id ?>';" id="btnReturn" class="input" style="<?=$show?>" />      </td>
		        </tr>
            </table>
        </div>     
</div>
