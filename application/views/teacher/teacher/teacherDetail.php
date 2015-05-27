<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>教师个人信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">  
        <input type="hidden" value="<?= $this->session->userdata('u_id') ?>" name="u_id" id="u_id" />  
        <tr>
            <td class="td1" style="width: 111px">教师工号</td>
            <td class="td2" ><?= $teaId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">教师姓名</td>
            <td class="td2" ><?= $teaName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">教师权限</td>
            <td class="td2" ><?= $teaRole ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">教师职称</td>
            <td class="td2" ><?= $teaTitle ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学院</td>
            <td class="td2" ><?= $college ?>&nbsp;</td>
        </tr>
        
    </table>
</div>