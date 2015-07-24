

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
    	<div class="enterrighttitle"><p>个人信息详情</p></div>
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
            
            <!--  
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">密码</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?= $admin->admin_password ?>&nbsp;               
                    </td>
            </tr>
            -->
            
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">权限</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    校级管理员      
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">学院</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <?php if($admin->admin_coll_name == 0) echo "无"; else  echo $admin->admin_coll_name;?>        
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
                    <?php if($admin->admin_stat_id == 1)echo "正常"; else echo "停用";?>        
                    </td>
            </tr>
            
            </table>
            <br><br>
            <div style="text-align: center;">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/aself/selfEdit';" id="btnEdit" class="input" />
            </div>
        </div>     
</div>




