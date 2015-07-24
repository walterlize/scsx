<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">填写实习总结</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/student/summary/save/<?= $mission->miss_id ?>" id="form1">
        <input type="hidden" value="<?= $summary->summ_id ?>" name="summ_id" id="summ_id" />
        <input type="hidden" value="<?= $mission->miss_id ?>" name="summ_miss_id" id="summ_miss_id" />
        <input type="hidden" value="<?= $summary->summ_stu_num ?>" name="summ_stu_num" id="summ_stu_num" />
        <input type="hidden" value="<?= $summary->summ_stu_name ?>" name="summ_stu_name" id="summ_stu_name" />
        <input type="hidden" value="<?= $summary->summ_appr_id ?>" name="summ_appr_id" id="summ_appr_id" />
        <input type="hidden" value="<?= $summary->summ_appr_time ?>" name="summ_appr_time" id="summ_appr_time" />
        <input type="hidden" value="<?= $summary->summ_time?>" name="summ_time" id="summ_time" />
        <input type="hidden" value="<?= $summary->summ_result?>" name="summ_result" id="summ_result" />

        <table cellpadding="0" cellspacing="1" class="tablist2">  
	        <tr>
	            <td class="td1" style="width: 111px" colspan="2">
	            	<?= $mission->cour_name ?>(<?= $mission->cour_no ?>-<?= $mission->cour_num ?>)&nbsp;
	            </td>
	        </tr> 
	        
	        <tr>
	            <td class="td1" style="width: 111px">教师姓名</td>
	            <td class="td2" ><?= $mission->cour_teac_name ?>&nbsp;</td>
	        </tr> 
	        <tr>
	            <td class="td1" style="width: 111px">实习总结任务标题</td>
	            <td class="td2" ><?= $mission->miss_title ?>&nbsp;</td>
	        </tr>
	        <tr>
	            <td class="td1" style="width: 111px">下达时间</td>
	            <td class="td2" ><?= $mission->miss_start_time ?>&nbsp;</td>
	        </tr> 
	        <tr>
	            <td class="td1" style="width: 111px">截止时间</td>
	            <td class="td2" ><?= $mission->miss_end_time ?>&nbsp;</td>
	        </tr> 
	        <tr>
	            <td class="td1" style="width: 111px">实习总结任务内容</td>
	            <td class="td2" ><?= $mission->miss_content ?>&nbsp;</td>
	        </tr>      
            
            <tr>
                <td class="td1" style="width: 111px">实习总结内容</td>
                <td class="td2" >
                    <script type="text/javascript">
						KindEditor.ready(function(K) {
						var editor1 = K.create('textarea[name="summ_content"]', {
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
                    <textarea name="summ_content" id="summ_content" style="visibility:hidden; width:80%; height:300px;"><?=$summary->summ_content?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/summary/summaryList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/student/summary/summaryDetail/<?= $summary->summ_miss_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>