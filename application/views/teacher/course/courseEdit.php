<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>课程模式设置</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/course/courseSet/<?= $course->id ?>" id="form1">
        <input type="hidden" value="<?= $coursep->cour_id ?>" name="cour_id" id="cour_id" />
        <input type="hidden" value="<?= $course->courseId ?>" name="cour_no" id="cour_no" />
        <input type="hidden" value="<?= $course->courseNum ?>" name="cour_num" id="cour_num" />
        <input type="hidden" value="<?= $course->term ?>" name="cour_term" id="cour_term" />
        <input type="hidden" value="" name="cour_coll_id" id="cour_coll_id" />
        <input type="hidden" value="<?= $course->college ?>" name="cour_coll_name" id="cour_coll_name" />
        <input type="hidden" value="<?= $course->courseName ?>" name="cour_name" id="cour_name" />
        <input type="hidden" value="<?= $course->courseNameEn ?>" name="cour_name_en" id="cour_name_en" />
        <input type="hidden" value="<?= $course->courseCredit ?>" name="cour_cerdit" id="cour_cerdit" />
        <input type="hidden" value="<?= $course->courseHour ?>" name="cour_hours" id="cour_hours" />
        <input type="hidden" value="<?= $course->courseClass ?>" name="cour_class" id="cour_class" />
        <input type="hidden" value="<?= $course->courseTeaId ?>" name="cour_teac_num" id="cour_teac_num" />
        <input type="hidden" value="<?= $course->courseTeaName ?>" name="cour_teac_name" id="cour_teac_name" />
        <input type="hidden" value="<?= $course->courseType ?>" name="cour_mode" id="cour_mode" />
        <input type="hidden" value="<?= $course->courseTime ?>" name="cour_time" id="cour_time" />
        <input type="hidden" value="<?= $course->coursePlace ?>" name="cour_place" id="cour_place" />
        <input type="hidden" value="<?= $course->courseWeekly ?>" name="cour_week" id="cour_week" />
        <input type="hidden" value="<?= $coursep->cour_publish ?>" name="cour_publish" id="cour_publish" />


        <table cellpadding="0" cellspacing="1" class="tablist2">
	        <tr>
	            <td class="td1" style="width: 111px">课程号</td>
	            <td class="td2" ><?= $course->courseId ?>&nbsp;</td>
	        </tr>  
	        <tr>
	            <td class="td1" style="width: 111px">课序号</td>
	            <td class="td2" ><?= $course->courseNum ?>&nbsp;</td>
	        </tr>
	        <tr>
	            <td class="td1" style="width: 111px">课程名</td>
	            <td class="td2" ><?= $course->courseName ?>&nbsp;</td>
	        </tr>
	        <tr>
	            <td class="td1" style="width: 111px">课程英文名</td>
	            <td class="td2" ><?= $course->courseNameEn ?>&nbsp;</td>
	        </tr>  
	        <tr>
	            <td class="td1" style="width: 111px">学分</td>
	            <td class="td2" ><?= $course->courseCredit ?>&nbsp;</td>
	        </tr>
	        <tr>
	            <td class="td1" style="width: 111px">学时</td>
	            <td class="td2" ><?= $course->courseHour ?>&nbsp;</td>
	        </tr>
	        <tr>
	            <td class="td1" style="width: 111px">课程模式</td>
	            <td class="td2" >
	            	<select name="cour_pattern_id">
	            		<option value="1">自选式</option>
	            		<option value="2">志愿式</option>
	            		<option value="3">分配式</option>
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
	            <td colspan="2" class="td3" align="center">
	            	<input type="submit" name="btnReturn" value="确 认" onclick="return confirm('确定设置？设置后不可修改')" id="btnReturn" class="input" />
	                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseList';" id="btnReturn" class="input" />      
	            </td>
	        </tr>
	    </table>
    </form>
</div>