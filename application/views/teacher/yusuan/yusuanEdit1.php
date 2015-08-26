<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习预算明细</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/yusuan/save" id="form1">
        <input type="hidden" value="<?= $yusuan->ys_id ?>" name="ys_id" id="ys_id" />
        <input type="hidden" value="<?= $yusuan->ys_teac_num ?>" name="ys_teac_num" id="ys_teac_num" />
         <input type="hidden" value="<?= $yusuan->ys_term ?>" name="ys_term"  />
         <input type="hidden" value="<?= $yusuan->ys_time ?>" name="ys_time"  />
         <input type="hidden" value="" name="ys_coll_idea"  />
           <input type="hidden" value="" name="ys_idea"  />

        <table cellpadding="0" cellspacing="1" class="tablist2"> 
        	<tr>
                <td class="td1" style="width: 111px">学院</td>
            		<td class="td2" ><input name="ys_college" type="text" id="ys_college" value="<?= $yusuan->ys_college ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="ys_collegeMsg" class="MsgHide">学院不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习名称</td>
                <td class="td2" ><input name="ys_name" type="text" id="ys_name" value="<?= $yusuan->ys_name ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="ys_nameMsg" class="MsgHide">实习名称不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">带队教师</td>
            	<td class="td2">
            		<input name="ys_teac_name" type="text" id="ys_teac_name" value="<?=$yusuan->ys_teac_name?>" size="50"   size="50"   isRequired="true" />
                    <font color="red">*</font><span id="ys_teac_nameMsg" class="MsgHide">带队教师不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习编号</td>
            	<td class="td2">
            		<input name="ys_no" type="text" id="ys_no" value="<?=$yusuan->ys_no?>" size="50"   size="50"   isRequired="true" />
                    <font color="red">*</font><span id="ys_noMsg" class="MsgHide">实习编号不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习内容</td>
            	<td class="td2">
            		<input name="ys_content" type="text" id="ys_content" value="<?=$yusuan->ys_content?>" size="50"   size="50"   isRequired="true" />
                    <font color="red">*</font><span id="ys_contentMsg" class="MsgHide">实习内容不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习班级</td>
            	<td class="td2">
            		<input name="ys_class" type="text" id="ys_class" value="<?=$yusuan->ys_class?>" size="50"   size="50"   isRequired="true" />
                    <font color="red">*</font><span id="ys_classMsg" class="MsgHide">带实习班级不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习地点</td>
            	<td class="td2">
            		<input name="ys_address" type="text" id="ys_address" value="<?=$yusuan->ys_address?>" size="50"   size="50"   isRequired="true" />
                    <font color="red">*</font><span id="ys_addressMsg" class="MsgHide">实习地点不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">学生人数</td>
            	<td class="td2">
            		<input name="ys_stu_num" type="text" id="ys_stu_num" value="<?=$yusuan->ys_stu_num?>" size="50"   size="50"   isRequired="true" />
                    <font color="red">*</font><span id="ys_stu_numMsg" class="MsgHide">学生人数不能为空！</span></td>
            </tr>
           
            <tr>
                <td class="td1" style="width: 111px">实习天数</td>
            	<td class="td2">
            		<input name="ys_days" type="text" id="ys_days" value="<?=$yusuan->ys_days?>" size="50"   size="50"   isRequired="true" />
                    <font color="red">*</font><span id="ys_daysMsg" class="MsgHide">实习天数不能为空！</span></td>
            </tr>
            
            
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="下一步" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/yusuanList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/teacher/yusuan/yusuanDetail/<?= $yusuan->ys_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>