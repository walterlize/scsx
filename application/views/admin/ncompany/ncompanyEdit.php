<style>
<!--
td{
text-align: left;
}
-->
</style>
<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />

<div class="enterright" style="background-color: #F8F8F8;" >
    	<div class="enterrighttitle" ><p>实习基地编辑</p></div>
        <div class="enterrightlist" >
        <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/ncompany/save" id="form1">
            <input type="hidden" value="<?= $company->comId?>" name="comId" id="comId" />
            <input type="hidden" value="<?= $company->addType?>" name="addType" id="addType" />
            <input type="hidden" value="5" name="stateId" id="stateId" />
     
        	<table width="99%" cellpadding="0" cellspacing="0">

		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地名</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<input name="comName" type="text" id="comName" value="<?= $company->comName ?>" size="50"   isRequired="true" />
                    	<font color="red">*</font><span id="comNameMsg" class="MsgHide">实习基地名不能为空！</span>
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地负责人</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<select name="u_id" id="u_id" onchange="selectname()">
		            	<option value="">--请选择基地用户--</option>
		            	<?php 
		            		foreach ($comuser as $r){
		            			echo "<option value=";
		            			echo $r['u_id'];
		            			echo " ";
		            			if($r['u_id'] == $company->u_id)
		            				echo "selected";
		            			echo ">";
		            			echo $r['u_name'];
		            			echo "</option>";
		            		}
		            	?>
		            	</select>
		            	
		            	<input type="hidden" value="<?= $company->u_name?>" name="u_name" id="u_name" >
		            	<script type="text/javascript">
			            	function selectname(){
				            	var id = document.getElementById("u_id");
				            	var name = document.getElementById("u_name");
				            	name.value = id.options[id.selectedIndex].text;
			            	}
		            	</script>
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地地址</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            	<input name="address" type="text" id="address" value="<?= $company->address ?>" size="50" />
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地主页</td>
		            <td class="tablecontent" style="padding-left: 15px" >
		            <input name="url" type="text" id="url" value="<?=$company->url?>" size="50"   />
		            </td>
		        </tr>
		        <tr>
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地简介</td>
		            <td class="tablecontent" style="padding-left: 15px" >
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
		            <td class="tabletitle" style="padding-left: 15px; width: 160px">实习基地计划</td>
		            <td class="tablecontent" style="padding-left: 15px" >
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
		            <td colspan="2" class="td3" style="text-align: center;">
		                <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
		                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/ncompany/ncompanyDetail/<?= $company->comId ?>';" id="btnReturn" class="input" style="<?=$show?>" />      </td>
		        </tr>
            </table>
        </div>     
</div>
