


<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
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
    	<div class="enterrighttitle"><p>管理员信息编辑</p></div>
        <div class="enterrightlist">
        <form name="form1" method="post" action="<?= base_url() ?>index.php/superadmin/admin/adminSet" id="form1">
        <input type="hidden" value="<?= $admin->admin_id ?>" name="admin_id" id="admin_id" />
        <input type="hidden" value="2" name="admin_roleId" id="admin_roleId" />
                	
        	<table width="99%" cellpadding="0" cellspacing="0">
        	
            
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">用户名</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <input name="admin_num" id="admin_num" value="<?= $admin->admin_num ?>" isRequired="true" />
                    <font color="red">*</font><span id="admin_numMsg" class="MsgHide">用户名不能为空！</span> 
                </td>
            </tr>
        	<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">姓名</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <input name="admin_name" value="<?= $admin->admin_name ?>" />  
                </td>
            </tr>
            
            
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">密码</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <input name="admin_password" id="admin_password" value="<?= $admin->admin_password ?>" isRequired="true" />
                    <font color="red">*</font><span id="admin_passwordMsg" class="MsgHide">密码不能为空！</span>                
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">权限</td>
                <td class="tablecontent" style="padding-left: 15px" >院级管理员
                <!--  
                <select name="admin_roleId" onchange="selectCol()" id="admin_roleId">
                <option value="1" <?php if($admin->admin_roleId == 1) echo "selected";?> >校级管理员</option>
                <option value="2" <?php if($admin->admin_roleId == 2) echo "selected";?> >院级管理员</option>
                </select>
                -->    
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">学院</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <select name="admin_coll_name" id="admin_coll_name">
                <?php foreach ($college as $r):?>
                <option value="<?=$r->college?>" <?php if($admin->admin_coll_name == $r->college) echo "selected"; ?> ><?=$r->college?></option>
                <?php endforeach;?>
                </select>
                    </td>
            </tr>
            
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">电话</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <input name="admin_phone" value="<?=$admin->admin_phone ?>" />                 
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">邮箱</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    <input name="admin_email" value="<?=$admin->admin_email?>" />                
                    </td>
            </tr>
            <tr>
                <td class="tabletitle" style="padding-left: 15px; width: 160px">状态</td>
                <td class="tablecontent" style="padding-left: 15px" >
                    
                <select name="admin_stat_id">
                <option value="1" <?php if($admin->admin_stat_id == 1) echo "selected";?> >正常</option>
                <option value="2" <?php if($admin->admin_stat_id == 2) echo "selected";?> >停用</option>
                </select>
                </td>
            </tr>
            
            <tr>
                <td colspan="2" class="td3" align="center" style="text-align: center;">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/admin/adminList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/admin/adminDetail/<?= $admin->admin_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
            </table>
        </form>
        </div>    
        
        <script type="text/javascript">
        
        //通过Ajax获得二级指标值
        function selectCol(){
            //获取所选一级指标值
            var role = document.getElementById("admin_roleId").value;  
            
            var college = document.getElementById("admin_coll_name");
            //alert(role);
	        if(role){
	        	
	        	var urla = '<?=base_url();?>index.php/superadmin/admin/getAjaxCol/'+role;
	    		//通过Ajax获取数据
	            $.ajax({
	                type: "get",               
	                url: urla,
	                dataType: "json", //返回数据形式为json	
	                              
	                success: function (data) {
		                if(data){	     
		                	        	
		                	//为下拉框获取选项
		                	college.options.length = 0;
		                	if(role == 1){
		                		for(var i=0;i<data.col.length;i++){    
		                			college.options.add(new Option(data.col[i]['college'], data.col[i]['id']));
		                		}
		                	}else{
		                	//indi2.options.add(new Option("--请选择二级指标--", ""));
		                	for(var i=0;i<data.col.length;i++){    
		                		college.options.add(new Option(data.col[i]['college'], data.col[i]['college']));
		                	}
		                	}
		                }
	
	               },
	                error: function(XMLHttpRequest, textStatus, errorThrown) {
		                //以下代码供测试
	                    //alert(XMLHttpRequest.status);
	                    //alert(XMLHttpRequest.readyState);
	                    //alert(textStatus);
	                    alert("数据加载失败");
	                }
	            }); 
            }else{
            	//为下拉框获取选项
            	indi2.options.length = 0;
            	indi2.options.add(new Option("校级管理员", "0"));
            }
        }
        </script> 
</div>




