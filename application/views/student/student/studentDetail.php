<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>学生个人信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">  
        <input type="hidden" value="<?= $this->session->userdata('u_id') ?>" name="u_id" id="u_id" />  
        <tr>
            <td class="td1" style="width: 111px">学生学号</td>
            <td class="td2" ><?= $stuId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学生姓名</td>
            <td class="td2" ><?= $stuName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">密码</td>
            <td class="td2" ><?= $password?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学院</td>
            <td class="td2" ><?= $college ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">专业</td>
            <td class="td2" ><?= $major ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">班级</td>
            <td class="td2" ><?= $class ?>&nbsp;</td>
        </tr>

        
    </table>
</div>