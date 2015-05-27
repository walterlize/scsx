<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习基地信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/student/company/save" id="form1">
    <input name="comId" type="hidden" id="comId" value="<?= $company->comId ?>" size="50" />
    <input name="u_id" type="hidden" id="u_id" value="<?= $compuser->u_id ?>" size="50" />
    <input name="course_id" type="hidden" id="course_id" value="<?= $course->cid ?>">
    <input name="courseId" type="hidden" id="courseId" value="<?= $course->courseId ?>">
    <input name="courseNum" type="hidden" id="courseNum" value="<?= $course->courseNum ?>">
    <input name="comcou_id" type="hidden" id="comcou_id" value="<?= $comcou->id ?>">
    <input name="b_id" type="hidden" id="b_id" value="<?= $b_id ?>">
    <input name="stateId" type="hidden" id="stateId" value="7">
    <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
            <td class="td1" colspan="2">实习基地信息</td>
        </tr>
        	<td class="td1" style="padding-left: 15px; width: 160px">实习基地名称</td>
		            <td class="td2" style="padding-left: 15px" >
		            	<input name="comName" type="text" id="comName" value="<?= $company->comName ?>" size="50" />
		            </td>
		        </tr>
        	 <td class="td1" style="padding-left: 15px; width: 160px">实习基地地址</td>
		            <td class="td2" style="padding-left: 15px" >
		            	<input name="address" type="text" id="address" value="<?= $company->address ?>" size="50" />
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">实习基地主页</td>
		            <td class="td2" style="padding-left: 15px" >
		            <input name="url" type="text" id="url" value="<?=$company->url?>" size="50"   />
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">实习基地简介</td>
		            <td class="td2" style="padding-left: 15px" >
		            		<script type="text/javascript">
                                KindEditor.ready(function(K) {
                                    var editor1 = K.create('textarea[name="content"]', {
                                        cssPath : '<?= base_url() ?>kindeditor/plugins/code/prettify.css',
                                        uploadJson : '<?= base_url() ?>kindeditor/php/upload_json.php',
                                        fileManagerJson : '<?= base_url() ?>kindeditor/php/file_manager_json.php',
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
                                <textarea name="content" id="content" style="visibility:hidden; width:99%; height:30px;"><?= $company->content ?></textarea>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">实习基地计划</td>
		            <td class="td2" style="padding-left: 15px" >
		            		<script type="text/javascript">
                                KindEditor.ready(function(K) {
                                    var editor1 = K.create('textarea[name="plan"]', {
                                        cssPath : '<?= base_url() ?>kindeditor/plugins/code/prettify.css',
                                        uploadJson : '<?= base_url() ?>kindeditor/php/upload_json.php',
                                        fileManagerJson : '<?= base_url() ?>kindeditor/php/file_manager_json.php',
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
                                <textarea name="plan" id="plan" style="visibility:hidden; width:99%; height:30px;"><?= $company->plan ?></textarea>
		            </td>
		        </tr>
        
        
        <tr>
            <td class="td1" colspan="2">基地负责人信息</td>
        </tr>
        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">用户登陆名</td>
		            <td class="td2" style="padding-left: 15px" >
		            	<input name="u_name" type="text" id="u_name" value="<?= $compuser->u_name ?>" size="50"   isRequired="true" />
                    	<font color="red">*</font><span id="u_nameMsg" class="MsgHide">登陆名不能为空！</span>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">用户姓名</td>
		            <td class="td2" style="padding-left: 15px" >
		            	<input name="realname" type="text" id="realname" value="<?= $compuser->realname ?>" size="50" />
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">用户密码</td>
		            <td class="td2" style="padding-left: 15px" >
		            	<input name="password" type="text" id="password" value="<?= $compuser->password ?>" size="50"   isRequired="true" />
                    	<font color="red">*</font><span id="passwordMsg" class="MsgHide">密码不能为空！</span>
		            
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">性别</td>
		            <td class="td2" style="padding-left: 15px" >
		            <select name="sex">
		            	<option value="男" <?php if($compuser->sex =="男") echo "selected"?>>男</option>
		         	   <option value="女" <?php if($compuser->sex =="女") echo "selected"?>>女</option>
		            </select>
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">电话</td>
		            <td class="td2" style="padding-left: 15px" >
		            <input name="phone" type="text" id="phone" value="<?= $compuser->phone ?>" size="50" />
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">邮箱</td>
		            <td class="td2" style="padding-left: 15px" >
		            <input name="email" type="text" id="email" value="<?= $compuser->email ?>" size="50" />
		            </td>
		        </tr>
		        <tr>
		            <td class="td1" style="padding-left: 15px; width: 160px">地址</td>
		            <td class="td2" style="padding-left: 15px" >
		            <input name="uaddress" type="text" id="uaddress" value="<?= $compuser->address ?>" size="50" />
		            </td>
		        </tr>
		        
		         	   <input name="ustateId" type="hidden" id="ustateId" value="<?= $compuser->ustateId ?>" size="50" />

            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/company/companyDetail';" id="btnReturn" class="input" />
                </td>
            </tr>
        </table>
    </form>
</div>