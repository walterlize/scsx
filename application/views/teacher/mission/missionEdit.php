<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习总结任务信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/mission/save" id="form1">
        <input type="hidden" value="<?= $mission->miss_id ?>" name="miss_id" id="miss_id" />

        <table cellpadding="0" cellspacing="1" class="tablist2"> 
        	<tr>
                <td class="td1" style="width: 111px">课程名</td>
            	<td class="td2">
            		<select name="miss_cour_id">
            		<?php if(is_array($cour)) foreach ($cour as $r):?>
            			<option value="<?=$r['cour_id']?>" <?php if($mission->miss_cour_id == $r['cour_id']) echo "selected";?>><?=$r['cour_name']?>(<?=$r['cour_no']?>-<?=$r['cour_num']?>)</option>
            		<?php endforeach;?>
            		</select>
            	</td>    
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习总结任务标题</td>
                <td class="td2" ><input name="miss_title" type="text" id="miss_title" value="<?= $mission->miss_title ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="miss_titleMsg" class="MsgHide">实习总结任务标题不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">截止时间</td>
            	<td class="td2">
            		<input name="miss_end_time" type="text" id="miss_end_time" value="<?=$mission->miss_end_time?>" size="50"   onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate"/>
                     <font color="red">若未失效不需填写</font>
            	</td>    
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习总结任务内容</td>
                <td class="td2" >
                    <script type="text/javascript">
						KindEditor.ready(function(K) {
						var editor1 = K.create('textarea[name="miss_content"]', {
							cssPath : '<?=base_url()?>kindeditor/plugins/code/prettify.css',
							uploadJson : '<?=base_url()?>kindeditor/php/upload_json.php',
							fileManagerJson : '<?=base_url()?>kindeditor/php/file_manager_json.php',
							allowFileManager : true,
							afterCreate : function() {
								var self = this;
								K.ctrl(document, 13, function() {
									self.sync();
									K('form[name=content]')[0].submit();
								});
								K.ctrl(self.edit.doc, 13, function() {
									self.sync();
									K('form[name=content]')[0].submit();
								});
							}
						});
						prettyPrint();
					});
					</script>
                    <textarea name="miss_content" id="miss_content" style="visibility:hidden; width:80%; height:400px;"><?=$mission->miss_content?></textarea>
                </td>
            </tr>  
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/mission/missionList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/teacher/mission/missionDetail/<?= $mission->miss_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>