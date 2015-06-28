<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3 class="lz_title">
    	<div>课程详细信息</div>
    	<div style="float: left; font-size:12px; <?php if(isset($show3)) echo $show3; ?> ">&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;<a  href="<?= base_url() ?>index.php/teacher/company/companyList/<?=$coursep->cour_id?>" target="_blank">查看基地</a>&nbsp;&nbsp;) <br><br><br><br></div>
    </h3>
    
    <table cellpadding="0" cellspacing="1" class="tablist2">

        <tr>
            <td class="td1" style="width: 111px">序号</td>
            <td class="td2" ><?= $course->KCH ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程编号</td>
            <td class="td2" ><?= $course->KXH ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课程名称</td>
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
            <td class="td1" style="width: 111px">课程实习模式</td>
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
            <td colspan="2" class="td3" align="center">
            	<input type="button" name="btnReturn" value="设置模式" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseNew/<?=$course->KCH?>/<?=$course->KXH?>';" id="btnReturn" class="input" style="<?php if(isset($show1)) echo $show1; ?>" />
            	<!--  <input type="button" name="btnReturn" value="查看基地" onclick="window.location.href='<?= base_url() ?>index.php/teacher/company/companyList/<?=$coursep->cour_id?>';" id="btnReturn" class="input" style="<?php if(isset($show3)) echo $show3; ?>" />-->
            	<input type="button" name="btnReturn" value="发布课程" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/coursePublish/<?=$coursep->cour_id?>';" id="btnReturn" class="input" style="<?php if(isset($show2)) echo $show2?>" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>
