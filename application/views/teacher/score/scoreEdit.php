<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>评价实习结果</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/score/save/<?=$cour_id?>" id="form1">
        <input type="hidden" value="<?= $score->scor_id ?>" name="scor_id" id="scor_id" />
        <input type="hidden" value="<?= $score->scor_cour_id ?>" name="scor_cour_id" id="scor_cour_id" />
        <input type="hidden" value="<?= $score->scor_teac_num ?>" name="scor_teac_num" id="scor_teac_num" />
        <input type="hidden" value="<?= $score->scor_teac_name ?>" name="scor_teac_name" id="scor_teac_name" />
        <input type="hidden" value="<?= $score->scor_stu_num ?>" name="scor_stu_num" id="scor_stu_num" />
        <input type="hidden" value="<?= $score->scor_stu_name ?>" name="scor_stu_name" id="scor_stu_name" />
        <input type="hidden" value="<?= $score->scor_stu_class ?>" name="scor_stu_class" id="scor_stu_class" />

        <table cellpadding="0" cellspacing="1" class="tablist2">  
            <tr>
                <td class="td1" style="width: 111px">课程信息</td>
                <td class="td2" ><?= $cour->cour_name ?>(<?= $cour->cour_no ?>-<?= $cour->cour_num ?>)&nbsp;</td>
            </tr>  
            <tr>
                <td class="td1" style="width: 111px">学生学号</td>
                <td class="td2" ><?= $stu->XH?>&nbsp;</td>
            </tr>   
            <tr>
                <td class="td1" style="width: 111px">学生姓名</td>
                <td class="td2" ><?= $stu->XM ?>&nbsp;</td>
            </tr>      
            <tr>
                <td class="td1" style="width: 111px">学生院系</td>
                <td class="td2" ><?= $stu->ZYM ?>&nbsp;</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">学生班级</td>
                <td class="td2" ><?= $stu->BM ?>&nbsp;</td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">学生基地</td>
                <td class="td2" ><?php if(isset($elco->comp_name))echo $elco->comp_name ?>&nbsp;</td>
            </tr>
              
            <tr>
                <td class="td1" style="width: 111px">评价分数</td>
                <td class="td2" ><input name="scor_teac_score" type="text" id="scor_teac_score" value="<?= $score->scor_teac_score?>" size="50"   isRequired="true" />
                    <font color="red">*</font><span id="scor_teac_scoreMsg" class="MsgHide">评价分数不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">评语</td>
                <td class="td5" >
                    <script type="text/javascript">
                        KindEditor.ready(function(K) {
                            var editor1 = K.create('textarea[name="scor_teac_comment"]', {
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
                    <textarea name="scor_teac_comment" id="scor_teac_comment" style="visibility:hidden; width:80%; height:200px;"><?= $score->scor_teac_comment ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="提 交" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/score/scoreList/<?=$cour_id?>';" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
</div>