

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
    	<div class="enterrighttitle"><p>管理员详情</p></div>
        <div class="enterrightlist">
   	
        	<table width="950px;" cellpadding="0" cellspacing="0">


            
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">用户名</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <?= $admin->admin_num ?>&nbsp;
                </td>
            </tr>
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">姓名</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <?= $admin->admin_name ?>&nbsp;
                </td>
            </tr>
            
            
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">密码</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?= $admin->admin_password ?>&nbsp;               
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">权限</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?=$admin->admin_roleId?>        
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">学院</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?=$admin->admin_coll_name?>        
                    </td>
            </tr>
            
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">电话</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?=$admin->admin_phone ?>&nbsp;               
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">邮箱</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?=$admin->admin_email?>&nbsp;               
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">状态</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?=$admin->admin_stat_id?>        
                    </td>
            </tr>
            
            </table>
            <br><br>
            <div style="text-align: center;">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/admin/adminEdit/<?= $admin->admin_id ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/superadmin/admin/adminDelete/<?= $admin->admin_id ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/admin/adminList';" id="btnReturn" class="input" />  
            </div>
        </div>     
</div>




