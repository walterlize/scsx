<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>学生发帖内容编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/student/luntan/save" id="form1">
        <input type="hidden" value="<?= $luntan->l_id ?>" name="l_id" id="l_id" />

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">发帖类别</td>
                <td class="td2" ><select id="typeId" name="typeId" >
                        <?php foreach ($type as $r): ?>
                            <option value="<?= $r->typeId ?>"
                            <?php
                            if (isset($luntan->typeId) && $r->typeId == $luntan->typeId)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    >
                                        <?= $r->type ?>
                            </option>
                        <?php endforeach; ?>
                    </select>       </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">发帖主题（请注明实习基地）</td>
                <td class="td2" ><input name="theme" type="text" id="theme" value="<?= $luntan->theme ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="themeMsg" class="MsgHide">发帖主题不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">发帖内容</td>
                <td class="td2" >
                    <script type="text/javascript">
			KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
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
                    <textarea name="content" id="content" style="visibility:hidden; width:80%; height:400px;"><?=$luntan->content?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/luntan/luntanList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/student/luntan/luntanDetail/<?= $luntan->l_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>