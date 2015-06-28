<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>实习报名信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">课程号</td>
            <td class="td2" ><?= $variable->KCH ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课序号</td>
            <td class="td2" ><?= $variable->KXH ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程名</td>
            <td class="td2" ><?= $variable->KCM ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程英文名</td>
            <td class="td2" ><?= $course->YWKCM ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程学分</td>
            <td class="td2" ><?= $course->XF ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程学时</td>
            <td class="td2" ><?= $course->XS ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程上课周次</td>
            <td class="td2" ><?= $course->ZCSM ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导教师姓名</td>
            <td class="td2" ><?= $course->JSM ?>&nbsp;</td>
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
            <?php 
            	if($elecom->elco_state != 6 ){
            		if($elecom->comp_add_num == $stu_num){
            ?>
            <input type="button" name="btnReturn" value="修 改" onclick="window.location.href='<?= base_url() ?>index.php/student/company/companyEdit/<?=$coursep->cour_id?>/<?=$elecom->elco_comp_id?>/<?=$elecom->elco_id?>';" id="btnReturn" class="input" />
            <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/student/variablebm/variableDeleteALL/<?=$coursep->cour_id?>/<?=$elecom->elco_comp_id?>/<?=$elecom->elco_id?>';" id="btnReturn" class="input" />
            <?php 
            		}else{
            ?>
            <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/student/variablebm/variableDelete/<?=$elecom->elco_id?>';" id="btnReturn" class="input" />
            <?php 
            		}
            	}
            ?>
            	
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
    <br><br><br>
</div>