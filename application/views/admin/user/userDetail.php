<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>用户信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">  
        <tr>
            <td class="td1" style="width: 111px">用户ID</td>
            <td class="td2" ><?= $u_id ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">用户身份</td>
            <td class="td2" ><?= $roleName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">用户名</td>
            <td class="td2" ><?= $u_name ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">密码</td>
            <td class="td2" ><?= $password ?>&nbsp;</td>
        </tr>   
        <tr>
            <td class="td1" style="width: 111px">姓名</td>
            <td class="td2" ><?= $realname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">性别</td>
            <td class="td2" ><?= $sex ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">电话</td>
            <td class="td2" ><?= $phone ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">邮箱</td>
            <td class="td2" ><?= $email ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">地址</td>
            <td class="td2" ><?= $address ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">班级</td>
            <td class="td2" ><?= $class ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userEdit/<?= $u_id ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/admin/user/userDelete/<?= $u_id ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userList';" id="btnReturn" class="input" />      </td>
        </tr>
    </table>
</div>