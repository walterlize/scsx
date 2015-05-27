<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>评价实习结果</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/master/mscore/save/<?= $baoming->stuId ?>/1/<?= $baoming->b_id ?>" id="form1">
        <input type="hidden" value="<?= $mscore->s_id ?>" name="s_id" id="s_id" />
        <input type="hidden" value="<?= $mscore->course_id ?>" name="course_id" id="course_id" />
        <input type="hidden" value="<?= $mscore->courseId ?>" name="courseId" id="courseId" />
        <input type="hidden" value="<?= $mscore->courseNum ?>" name="courseNum" id="courseNum" />

        <table cellpadding="0" cellspacing="1" class="tablist2">  
            <tr>
                <td class="td1" style="width: 111px">实习项目名称</td>
                <td class="td2" ><?= $baoming->courseName ?>&nbsp;</td>
            </tr>  
            <tr>
                <td class="td1" style="width: 111px">学生姓名</td>
                <td class="td2" ><?= $baoming->stuName ?>&nbsp;</td>
            </tr>      
            <tr>
                <td class="td1" style="width: 111px">学生院系</td>
                <td class="td2" ><?= $baoming->stuMajor ?>&nbsp;</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">学生性别</td>
                <td class="td2" ><?= $baoming->stuSex ?>&nbsp;</td>
            </tr>     
            <tr>
                <td class="td1" style="width: 111px">评价分数</td>
                <td class="td2" ><input name="score" type="text" id="score" value="<?= $mscore->score ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="scoreMsg" class="MsgHide">评价分数不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">评语</td>
                <td class="td5" >
                    <script type="text/javascript">
			KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="comment"]', {
				cssPath : '<?=base_url()?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?=base_url()?>kindeditor/php/upload_json.php',
				fileManagerJson : '<?=base_url()?>kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=comment]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=comment]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		</script>
                    <textarea name="comment" id="comment" style="visibility:hidden; width:80%; height:200px;"><?=$mscore->comment?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="提 交" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/master/mscore/mscoreList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/master/mscore/mscoreDetail/<?= $mscore->s_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>