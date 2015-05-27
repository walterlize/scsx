<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习基地信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/student/company/save" id="form1">
        <input type="hidden" value="<?= $free->fb_id ?>" name="fb_id" id="fb_id" />

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">实习基地名称</td>
                <td class="td2" ><input name="comName" type="text" id="comName" value="<?= $free->comName ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="comNameMsg" class="MsgHide">实习基地名称不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地方负责人</td>
                <td class="td2" ><input name="realname" type="text" id="realname" value="<?= $free->realname ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="realnameMsg" class="MsgHide">基地方负责人不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人性别</td>
                <td class="td2" ><input name="sex" type="text" id="sex" value="<?= $free->sex ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="sexMsg" class="MsgHide">基地负责人性别不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人电话</td>
                <td class="td2" ><input name="phone" type="text" id="phone" value="<?= $free->phone ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="phoneMsg" class="MsgHide">基地负责人电话不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人邮箱</td>
                <td class="td2" ><input name="email" type="text" id="email" value="<?= $free->email ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="emailMsg" class="MsgHide">基地负责人邮箱不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人地址</td>
                <td class="td2" ><input name="address" type="text" id="address" value="<?= $free->address ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="addressMsg" class="MsgHide">基地负责人地址不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地简介</td>
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
                    <textarea name="content" id="content" style="visibility:hidden; width:80%; height:400px;"><?=$free->content?></textarea>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地计划</td>
                <td class="td2" >
                    <script type="text/javascript">
			KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="plan"]', {
				cssPath : '<?=base_url()?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?=base_url()?>kindeditor/php/upload_json.php',
				fileManagerJson : '<?=base_url()?>kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=plan]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=plan]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		</script>
                    <textarea name="plan" id="plan" style="visibility:hidden; width:80%; height:400px;"><?=$free->plan?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/company/companyDetail';" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
</div>