<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>实习报名信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">课程号</td>
            <td class="td2" ><?= $variable->courseId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课序号</td>
            <td class="td2" ><?= $variable->courseNum ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程名</td>
            <td class="td2" ><?= $variable->courseName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程英文名</td>
            <td class="td2" ><?= $course->courseNameEn ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程学分</td>
            <td class="td2" ><?= $course->courseCredit ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程学时</td>
            <td class="td2" ><?= $course->courseTime ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程上课周次</td>
            <td class="td2" ><?= $course->courseWeekly ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导教师姓名</td>
            <td class="td2" ><?= $course->courseTeaName ?>&nbsp;</td>
        </tr>
        
        <tr>
            <td class="td1" style="width: 111px">实习课程模式</td>
            <td class="td2" ><?= $coursep->patt_type ?>&nbsp;</td>
        </tr>
        
        <?php if(isset($elecom) && $elecom){ ?>
        <tr>
            <td class="td1" colspan="2">
            <span style="color: red">
            	基地已提交。状态为——<?=$elecom->usta_type?>
            </span>
            </td>
        </tr>
	        <tr>
                <td class="td1" colspan=2>所提交基地信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地名称</td>
                <td class="td2" ><?= $elecom->comp_name ?></td>
            </tr>
            
            <tr>
                <td class="td1" style="width: 111px">基地地址</td>
                <td class="td2" >
                	<?= $elecom->comp_address ?>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地主页</td>
                <td class="td2" ><?= $elecom->comp_url ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地简介</td>
                <td class="td2" >
                    <?=$elecom->comp_content?>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地计划</td>
                <td class="td2" >
                    <?=$elecom->comp_plan?>
                </td>
            </tr>
            <tr>
                <td class="td1" colspan=2>基地负责人信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人姓名</td>
                <td class="td2" ><?= $elecom->user_name ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人电话</td>
                <td class="td2" ><?= $elecom->user_phone ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人邮箱</td>
                <td class="td2" ><?= $elecom->user_email ?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人地址</td>
                <td class="td2" >
                	<?= $elecom->user_address ?>
                </td>
            </tr>
            <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/variablebm/variableList';" id="btnReturn" class="input" />      
            </td>
        </tr>
        <?php }else{ ?>
        <tr>
            <td class="td1" colspan="2">
            <span style="color: red">
            	课程为自选式，请选择已有基地或提交新基地信息
            </span>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
            	<input type="button" name="btnReturn" value="提 交 基 地" onclick="window.location.href='<?= base_url() ?>index.php/student/company/companyList/<?= $coursep->cour_id ?>';" id="btnReturn" class="input" />   
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/variablebm/variableList';" id="btnReturn" class="input" />      
            </td>
        </tr>
        <?php }?>
    </table>
</div>