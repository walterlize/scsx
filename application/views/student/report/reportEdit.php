<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习汇报编辑</h3>
    <form name="form1" method="post" action="<?=base_url()?>index.php/student/report/save" id="form1">
        <input type="hidden" value="<?= $repo->repo_id ?>" name="repo_id" id="repo_id" />

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">课程</td>
                <td class="td2" >
                	
                	<select name="cour">
                        <?php if(is_array($cour))foreach ($cour as $r): ?>
                            <option value="<?= $r['cour_no'] ?>__<?= $r['cour_num'] ?>__<?= $r['cour_name'] ?>__<?= $r['cour_teac_num']?>" >
                           		<?= $r['cour_name'] ?>(<?= $r['cour_no'] ?>--<?= $r['cour_num'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>       
                    </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">标题</td>
                <td class="td2" ><input name="repo_title" type="text" id="repo_title" value="<?= $repo->repo_title ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="repo_titleMsg" class="MsgHide">标题不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">内容</td>
                <td class="td2" >
                    <script type="text/javascript">
						KindEditor.ready(function(K) {
						var editor1 = K.create('textarea[name="repo_content"]', {
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
                    <textarea name="repo_content" id="repo_content" style="visibility:hidden; width:80%; height:400px;"><?=$repo->repo_content?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/report/reportList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/student/report/reportDetail/<?= $repo->repo_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>