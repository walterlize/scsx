<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>教师信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/teacher/teacher/save" id="form1">
        <input type="hidden" value="<?= $teacher->u_id ?>" name="u_id" id="u_id" />
        <input type="hidden" value="<?= $teacher->classId ?>" name="classId" id="classId" />
        <input type="hidden" value="<?= $teacher->ustateId ?>" name="ustateId" id="ustateId" />
        <input type="hidden" value="<?= $teacher->collegeId ?>" name="collegeId" id="collegeId" />

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">姓名</td>
                <td class="td2" ><input name="realname" type="text" id="realname" value="<?= $teacher->realname ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="realnameMsg" class="MsgHide">姓名不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">电话</td>
                <td class="td2" ><input name="phone" type="text" id="phone" value="<?= $teacher->phone ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="phoneMsg" class="MsgHide">电话不能为空！</span></td>    
            </tr>
            <tr>
                <td class="td1" style="width: 111px">邮箱</td>
                <td class="td2" ><input name="email" type="text" id="email" value="<?= $teacher->email ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="emailMsg" class="MsgHide">邮箱不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">地址</td>
                <td class="td2" ><input name="address" type="text" id="address" value="<?= $teacher->address ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="addressMsg" class="MsgHide">地址不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">性别</td>
                <td class="td2" ><input name="sex" type="text" id="sex" value="<?= $teacher->sex ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="sexMsg" class="MsgHide">性别不能为空！</span></td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/teacher/teacherDetail';" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
</div>