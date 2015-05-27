<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>回帖内容编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/luntan/save" id="form1">
        <input type="hidden" value="<?= $luntan->l_id ?>" name="l_id" id="l_id" />
        <input type="hidden" value="<?= $luntan->stuId ?>" name="stuId" id="stuId" />
        <input type="hidden" value="<?= $luntan->time1 ?>" name="time1" id="time1" />
        <input type="hidden" value="<?= $luntan->content ?>" name="content" id="content" />
        <input type="hidden" value="<?= $luntan->typeId ?>" name="typeId" id="typeId" />
        <input type="hidden" value="<?= $luntan->theme ?>" name="theme" id="theme" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">学号</td>
                <td class="td2" ><?= $luntan->stuId ?>&nbsp;</td>
            </tr>
            
            <tr>
                <td class="td1" style="width: 111px">发帖时间</td>
                <td class="td2" ><?= $luntan->time1 ?>&nbsp;</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">发帖类别</td>
                <td class="td2" ><?= $luntan->type ?>&nbsp;</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">发帖主题</td>
                <td class="td2" ><?= $luntan->theme ?>&nbsp;</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">发帖内容</td>
                <td class="td2" ><textarea rows="4" cols="60"><?= $luntan->content ?>&nbsp;</textarea></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">回帖内容</td>
                <td class="td5" >
                    <script type="text/javascript">
			KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="reply"]', {
				cssPath : '<?=base_url()?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?=base_url()?>kindeditor/php/upload_json.php',
				fileManagerJson : '<?=base_url()?>kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=reply]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=reply]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		</script>
                    <textarea name="reply" id="reply" style="visibility:hidden; width:80%; height:100px;"><?=$luntan->reply?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/luntan/luntanList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/teacher/luntan/luntanDetail/<?= $luntan->l_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>