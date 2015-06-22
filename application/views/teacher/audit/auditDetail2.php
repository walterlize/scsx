<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>课程详细信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
    	<!--
    	<tr>
            <td class="td1" colspan=2>课程信息</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程号</td>
            <td class="td2" ><?= $elco->elco_cour_no ?>&nbsp;</td>
        </tr> 
          
        <tr>
            <td class="td1" style="width: 111px">课序号</td>
            <td class="td2" ><?= $elco->elco_cour_num ?>&nbsp;</td>
        </tr>
        --> 
        <tr>
            <td class="td1" colspan=2>状态信息</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">状态</td>
            <td class="td2" ><span style="color: red; font-size: 14ps;"><?= $elco->usta_type ?></span></td>
        </tr>
        <tr>
            <td class="td1" colspan=2>学生信息</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学生学号</td>
            <td class="td2" ><?= $elco->elco_stu_num ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学生姓名</td>
            <td class="td2" ><?= $elco->elco_stu_name ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学生班级</td>
            <td class="td2" ><?= $elco->elco_stu_class ?></td>
        </tr>  
        <tr>
            <td class="td1" colspan=2>基地信息</td>
        </tr>      
        <tr>
            <td class="td1" style="width: 111px">基地名</td>
            <td class="td2" ><?= $elco->comp_name?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地地址</td>
            <td class="td2" ><?= $elco->comp_address?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地主页</td>
            <td class="td2" ><?= $elco->comp_url?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习内容</td>
            <td class="td2" ><?= $elco->comp_content?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习计划</td>
            <td class="td2" ><?= $elco->comp_plan?></td>
        </tr>
        <tr>
            <td class="td1" colspan=2>基地用户信息</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地用户姓名</td>
            <td class="td2" ><?= $elco->user_name?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地用户电话</td>
            <td class="td2" ><?= $elco->user_phone?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地用户邮箱</td>
            <td class="td2" ><?= $elco->user_email?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地用户地址</td>
            <td class="td2" ><?= $elco->user_phone?></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地用户电话</td>
            <td class="td2" ><?= $elco->user_phone?></td>
        </tr>
   
        <tr>
            <td colspan="2" class="td3" align="center">
            	<input type="button" name="btnReturn" value="审核通过" onclick="window.location.href='<?= base_url() ?>index.php/teacher/audit/auditPass2/<?= $cour_id ?>/<?= $elco->elco_id?>';" id="btnReturn" class="input" /> 
            	<input type="button" name="btnReturn" value="审核失败" onclick="window.location.href='<?= base_url() ?>index.php/teacher/audit/auditFail2/<?= $cour_id ?>/<?= $elco->elco_id?>';" id="btnReturn" class="input" /> 
            	<input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/audit/auditList/<?= $cour_id ?>';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
    <br><br><br>
</div>