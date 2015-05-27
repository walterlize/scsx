<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>查看报名结果信息</h3>
    <span style="font-size: 18px; font-weight: bold;color: red;  <?=$show1?>">
    <?=$msg?>
    </span>

    <table cellpadding="0" cellspacing="1" class="tablist2" style="<?=$show2?>">
    
    	<tr>
            <td class="td1" colspan="2">实习项目信息</td>
            
        </tr>
    <tr>
            <td class="td1" style="width: 111px">实习课程号</td>
            <td class="td2" ><?= $variable->courseId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课序号</td>
            <td class="td2" ><?= $variable->courseNum ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程名</td>
            <td class="td2" ><?= $variable->courseName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程英文名</td>
            <td class="td2" ><?= $variable->courseNameEn ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程学分</td>
            <td class="td2" ><?= $course->courseCredit ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程学时</td>
            <td class="td2" ><?= $course->courseTime ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程上课周次</td>
            <td class="td2" ><?= $course->courseWeekly ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导教师姓名</td>
            <td class="td2" ><?= $course->courseTeaName ?>&nbsp;</td>
        </tr>
        
        <tr>
            <td class="td1" style="width: 111px">实习课程模式</td>
            <td class="td2" ><?= $variable->pattern ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习课程模式简介</td>
            <td class="td2" ><?= $variable->content ?>&nbsp;</td>
        </tr>
        
        
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
                
    </table>
</div>