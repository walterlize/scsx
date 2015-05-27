<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>提交实习项目基地信息</h3>

    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" colspan="2">实习基地信息</td>
        </tr>
         <td class="td1" style="padding-left: 15px; width: 160px">实习基地名</td>
		            <td class="td2" style="padding-left: 15px" >
		            	<?= $company->comName ?>
		            </td>
		        </tr>
         <td class="td1" style="padding-left: 15px; width: 160px">实习基地地址</td>
		            <td class="td2" style="padding-left: 15px" >
		            	<?= $company->address ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">实习基地主页</td>
		            <td class="td2" style="padding-left: 15px" >
		            <?=$company->url?>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">实习基地简介</td>
		            <td class="td2" style="padding-left: 15px" >

                                <?= $company->content ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">实习基地计划</td>
		            <td class="td2" style="padding-left: 15px" >
		            		
                                <?= $company->plan ?>
		            </td>
		        </tr>
        
        
        <tr>
            <td class="td1" colspan="2">基地负责人信息</td>
        </tr>
        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">用户登陆名</td>
		            <td class="td2" style="padding-left: 15px" >
		            	<?= $compuser->u_name ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">用户姓名</td>
		            <td class="td2" style="padding-left: 15px" >
		            	<?= $compuser->realname ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">性别</td>
		            <td class="td2" style="padding-left: 15px" >
		            <?php echo $compuser->sex ?>
		         	   
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">电话</td>
		            <td class="td2" style="padding-left: 15px" >
		            <?= $compuser->phone ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">邮箱</td>
		            <td class="td2" style="padding-left: 15px" >
		            <?= $compuser->email ?>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">地址</td>
		            <td class="td2" style="padding-left: 15px" >
		            <?= $compuser->address ?>
		            </td>
		        </tr>

        <?php if($company->stateId != ""){?>
        <tr>
            <td colspan="2" class="td3" align="center">
            <span style="color:red; font-size: 18px; font-weight: bold;">
            <?php 
            	if($company->stateId == "5") echo "审核通过";
            	if($company->stateId == "6") echo "审核失败，请修改后再次提交";
            	if($company->stateId == "7") echo "已提交，等待审核";
            ?>
            </span>
            </td>
        </tr>
        <?php }?>
        
        <tr>
        
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/student/company/companyEdit/<?=$course_id?>';" id="btnEdit" class="input" style="<?=$show?>"/>
            </td>
        </tr>
        
        
    </table>
    <br>
    <span style="color:red; font-weight: bold;">
   
    </span>
</div>