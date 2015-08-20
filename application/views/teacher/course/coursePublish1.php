<!-- 自选式 -->
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3  class="lz_title">发布课程</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">课程号</td>
            <td class="td2" ><?= $course->KCH ?>&nbsp;</td>
        </tr>  
        <tr>
            <td class="td1" style="width: 111px">课序号</td>
            <td class="td2" ><?= $course->KXH ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程名</td>
            <td class="td2" ><?= $course->KCM ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程英文名</td>
            <td class="td2" ><?= $course->YWKCM ?>&nbsp;</td>
        </tr>  
        <tr>
            <td class="td1" style="width: 111px">学分</td>
            <td class="td2" ><?= $course->XF ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学时</td>
            <td class="td2" ><?= $course->XS ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程模式</td>
            <td class="td2" >
            <?php
                if($coursep->patt_type=="")echo "未设置";
                else echo $coursep->patt_type;
            ?>&nbsp;
            </td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">是否发布</td>
            <td class="td2" >
            <?php 
            	if($coursep->cour_publish==1) echo "已发布";
            	else echo "未发布";
            	
            ?>&nbsp;
            </td>
        </tr>
        <tr>
            <td class="td1" colspan="2">
            <span style="color: red">课程为分散式，可直接发布或添加基地</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span style="color: blue">
            <a href="<?=base_url()?>index.php/teacher/course/changeMode/<?=$coursep->cour_id?>">
            [修改模式]
            </a>
            </span>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" class="td3" align="center">
            	<input type="button" name="btnReturn" value="添加基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companyList/<?=$coursep->cour_id?>';" id="btnReturn" class="input" />
            <?php if($coursep->cour_publish==0){?>
            	<input type="button" name="btnReturn" value="发布课程" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/coursePublish1/<?=$coursep->cour_id?>';" id="btnReturn" class="input" />
            <?php }?>   
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>