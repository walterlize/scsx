<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>评价实习结果</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/score/save/<?= $score->stuId ?>" id="form1">
        <input type="hidden" value="<?= $score->s_id ?>" name="s_id" id="s_id" />
        <input type="hidden" value="<?= $score->stuId ?>" name="stuId" id="stuId" />
        <input type="hidden" value="<?= $score->course_id ?>" name="course_id" id="course_id" />
        <input type="hidden" value="<?= $score->courseId ?>" name="courseId" id="courseId" />
        <input type="hidden" value="<?= $score->courseNum ?>" name="courseNum" id="courseNum" />

        <table cellpadding="0" cellspacing="1" class="tablist2">              
            <tr>
                <td class="td1" style="width: 111px">评价分数</td>
                <td class="td2" ><input name="score" type="text" id="score" value="<?= $score->score ?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="scoreMsg" class="MsgHide">评价分数不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">评语</td>
                <td class="td5" >
                    <script type="text/javascript">
                        KindEditor.ready(function(K) {
                            var editor1 = K.create('textarea[name="comment"]', {
                                cssPath : '<?= base_url() ?>kindeditor/plugins/code/prettify.css',
                                uploadJson : '<?= base_url() ?>kindeditor/php/upload_json.php',
                                fileManagerJson : '<?= base_url() ?>kindeditor/php/file_manager_json.php',
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
                    <textarea name="comment" id="comment" style="visibility:hidden; width:80%; height:200px;"><?= $score->comment ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="提 交" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/score/scoreList';" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
</div>