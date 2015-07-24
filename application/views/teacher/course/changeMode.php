<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">更改模式确认</h3>


        <table cellpadding="0" cellspacing="1" class="tablist2">
	        <tr>
	            <td class="td1" >
	            <br>
	            	本课程有基地：<?=$compnum?>&nbsp;&nbsp;; 已提交基地学生：<?=$stunum?>&nbsp;&nbsp;; 
	            	<br><br>
	            	更改模式将删除所有数据，是否确定更改？
	            <br><br>
	            </td>
	            
	            
	        </tr>  
	        
	        
	        
	        <tr>
	            <td colspan="3" class="td3" align="center">
	            <br>
	            	<input type="submit" name="btnReturn" value="确 认" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/modeConfirm/<?=$cour_id?>';" id="btnReturn" class="input" />
	                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/course/courseList';" id="btnReturn" class="input" />      
	            <br><br>
	            </td>
	        </tr>
	    </table>
    </form>
</div>