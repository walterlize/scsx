<div style="margin-left:20px; margin-right:20px;width:900px;">
    <br />
    <h3 class="lz_title">实习基地信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/student/company/save/<?=$coursep->cour_id?>" id="form1">
        <input type="hidden" value="<?= $comp->comp_id ?>" name="comp_id" id="comp_id" />
        <input type="hidden" value="<?= $user->user_id ?>" name="user_id" id="user_id" />
        <input type="hidden" value="<?= $coco->coco_id ?>" name="coco_id" id="coco_id" />
        <input type="hidden" value="<?= $elco->elco_id ?>" name="elco_id" id="elco_id" />
        

        <table cellpadding="0" cellspacing="1" class="tablist2">
        	<tr>
                <td class="td1" colspan=2>课程信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课程号 课序号</td>
                <td class="td2" ><?=$coursep->cour_no?> -- <?=$coursep->cour_num?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课程名</td>
                <td class="td2" ><?=$coursep->cour_name?></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课程教师</td>
                <td class="td2" ><?=$coursep->cour_teac_name?></td>
            </tr>
            <tr>
                <td class="td1" colspan=2>基地信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地名称</td>
                <td class="td2" ><input name="comp_name" type="text" id="comp_name" value="<?= $comp->comp_name ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="comp_nameMsg" class="MsgHide">实习基地名称不能为空！</span></td>
            </tr>
            
            <tr>
                <td class="td1" style="width: 111px">基地地址</td>
                <td class="td2" >
                	<input name="comp_address" type="text" id="comp_address" value="<?= $comp->comp_address ?>" size="100"    />
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地主页</td>
                <td class="td2" ><input name="comp_url" type="text" id="comp_url" value="<?= $comp->comp_url ?>" size="100" /></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地简介</td>
                <td class="td2" >
                    <script type="text/javascript">
						KindEditor.ready(function(K) {
						var editor1 = K.create('textarea[name="comp_content"]', {
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
                    <textarea name="comp_content" id="comp_content" style="visibility:hidden; width:95%; height:400px;"><?=$comp->comp_content?></textarea>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">实习基地计划</td>
                <td class="td2" >
                    <script type="text/javascript">
						KindEditor.ready(function(K) {
						var editor1 = K.create('textarea[name="comp_plan"]', {
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
                    <textarea name="comp_plan" id="comp_plan" style="visibility:hidden; width:95%; height:400px;"><?=$comp->comp_plan?></textarea>
                </td>
            </tr>
            <tr>
                <td class="td1" colspan=2>基地负责人信息</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人姓名</td>
                <td class="td2" ><input name="user_name" type="text" id="user_name" value="<?= $user->user_name ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="user_nameMsg" class="MsgHide">基地负责人不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人电话</td>
                <td class="td2" ><input name="user_phone" type="text" id="user_phone" value="<?= $user->user_phone ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="user_phoneMsg" class="MsgHide">基地负责人电话不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人邮箱</td>
                <td class="td2" ><input name="user_email" type="text" id="user_email" value="<?= $user->user_email ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="user_emailMsg" class="MsgHide">基地负责人邮箱不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">基地负责人地址</td>
                <td class="td2" >
                	<input name="user_address" type="text" id="user_address" value="<?= $user->user_address ?>" size="50"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/company/companyList/<?=$coursep->cour_id?>';" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
</div>