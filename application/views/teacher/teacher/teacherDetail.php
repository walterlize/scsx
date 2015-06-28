<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3 class="lz_title">教师个人信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <input type="hidden" value="<?= $this->session->userdata('u_id') ?>" name="u_id" id="u_id" />  
        <tr>
            <td class="td1" style="width: 111px">教师工号</td>
            <td class="td2" ><?= $tea->JSH ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">教师姓名</td>
            <td class="td2" ><?= $tea->JSM ?>&nbsp;</td>
        </tr>
        
        <tr>
            <td class="td1" style="width: 111px">教师职称</td>
            <td class="td2" ><?= $tea->ZCSM ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">学院</td>
            <td class="td2" ><?= $tea->XSM ?>&nbsp;</td>
        </tr>
        
    </table>
</div>