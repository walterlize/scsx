<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>用户信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/user/save" id="form1">
        <input type="hidden" value="<?= $user->u_id ?>" name="u_id" id="u_id" />
        <input type="hidden" value="<?= $user->collegeId ?>" name="collegeId" id="collegeId"/>

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">用户身份</td>
                <td class="td2" ><select id="roleId" name="roleId" >
                        <?php 
                        foreach ($roles as $r): 
                        if($r->roleId != 1 && $r->roleId != 2){
                        ?>
                            <option value="<?= $r->roleId ?>"
                            <?php
                            if (isset($user->roleId) && $r->roleId == $user->roleId)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    >
                            <?= $r->roleName ?>
                            </option>
							<?php } endforeach; ?>
                    </select>       </td>
            </tr>
            
            <tr>
                <td class="td1" style="width: 111px">用户名</td>
                <td class="td2" ><input name="u_name" type="text" id="u_name" value="<?= $user->u_name ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="u_nameMsg" class="MsgHide">用户名不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">密码</td>
                <td class="td2" ><input name="password" type="text" id="password" value="<?= $user->password ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="passwordMsg" class="MsgHide">密码不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">姓名</td>
                <td class="td2" ><input name="realname" type="text" id="realname" value="<?= $user->realname ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="realnameMsg" class="MsgHide">性别不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">性别</td>
                <td class="td2" >
                    <select name="sex" type="text" id="sex" />
	                    <option value="男" <?php if($user->sex=="男") echo "selected"?>>男</option>
	                    <option vaule="女" <?php if($user->sex=="女") echo "selected"?> >女</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">电话</td>
                <td class="td2" ><input name="phone" type="text" id="phone" value="<?= $user->phone ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="phoneMsg" class="MsgHide">电话不能为空！</span></td>    
            </tr>
            <tr>
                <td class="td1" style="width: 111px">邮箱</td>
                <td class="td2" ><input name="email" type="text" id="email" value="<?= $user->email ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="emailMsg" class="MsgHide">邮箱不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">地址</td>
                <td class="td2" ><input name="address" type="text" id="address" value="<?= $user->address ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="addressMsg" class="MsgHide">地址不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">班级</td>
                <td class="td2" >
                <select name="classId">
                	<?php 
                		foreach ($class as $r):
                			echo "<option value='";
                		    echo $r->classId;
                		    echo "'";
                		    if($user->classId == $r->classId){
                		    	echo "selected";
                		    }
                		    echo ">";
                		    echo $r->class;
                		    echo "</option>";
                		endforeach;
                	?>
                </select>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userDetail/<?= $user->u_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>