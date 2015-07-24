<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">课程模式设置</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/course/courseSet/<?= $course->KCH ?>/<?=$course->KXH?>" id="form1">
        <input type="hidden" value="<?= $coursep->cour_id ?>" name="cour_id" id="cour_id" />
        <input type="hidden" value="<?= $course->KCH ?>" name="cour_no" id="cour_no" />
        <input type="hidden" value="<?= $course->KXH ?>" name="cour_num" id="cour_num" />
        <input type="hidden" value="<?= $course->ZXJXJHH ?>" name="cour_term" id="cour_term" />
        <input type="hidden" value="" name="cour_coll_id" id="cour_coll_id" />
        <input type="hidden" value="<?= $course->KKXSJC ?>" name="cour_coll_name" id="cour_coll_name" />
        <input type="hidden" value="<?= $course->KCM ?>" name="cour_name" id="cour_name" />
        <input type="hidden" value="<?= $course->YWKCM ?>" name="cour_name_en" id="cour_name_en" />
        <input type="hidden" value="<?= $course->XF ?>" name="cour_cerdit" id="cour_cerdit" />
        <input type="hidden" value="<?= $course->XS ?>" name="cour_hours" id="cour_hours" />
        <input type="hidden" value="" name="cour_class" id="cour_class" />
        <input type="hidden" value="<?= $tea_num ?>" name="cour_teac_num" id="cour_teac_num" />
        <input type="hidden" value="<?= $tea_name ?>" name="cour_teac_name" id="cour_teac_name" />
        <input type="hidden" value="<?= $course->XKMSSM ?>" name="cour_mode" id="cour_mode" />
        <input type="hidden" value="" name="cour_time" id="cour_time" />
        <input type="hidden" value="<?= $course->XQM ?>" name="cour_place" id="cour_place" />
        <input type="hidden" value="" name="cour_week" id="cour_week" />
        <input type="hidden" value="<?= $coursep->cour_publish ?>" name="cour_publish" id="cour_publish" />


        <table cellpadding="0" cellspacing="1" class="tablist2">
	        <tr>
	            <td class="td1" style="width: 111px">课程号</td>
	            <td class="td2" ><?= $course->KCH ?>&nbsp;</td>
	            <td class="td2" style="width: 420px;" rowspan="8">
	            	课程模式说明：<br><br>
	            	分散式：学生可自行寻找实习基地；<br><br>
	            	集中式：教师提供实习基地供学生选择，学生可选择多个基地；<br><br>
	            	分配式：教师指派学生至指定的实习基地。<br>
	            </td>
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
	            	<select name="cour_pattern_id">
	            		<option value="1" >分散式</option>
	            		<option value="2" >集中式</option>
	            		<option value="3" >分配式</option>
	            	</select>

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
	            <td colspan="3" class="td3" align="center">
	            	<input type="submit" name="btnReturn" value="确 认"  id="btnReturn" class="input" />
	                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseList';" id="btnReturn" class="input" />      
	            </td>
	        </tr>
	    </table>
    </form>
</div>