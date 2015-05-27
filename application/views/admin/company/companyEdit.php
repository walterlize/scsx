
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>right</title>
    </head>
    <body>
        <div class="enterright">
            <div class="enterrighttitle"><p>实习基地信息编辑</p></div>
            <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/company/save" id="form1">
                <input type="hidden" value="<?= $company->comId ?>" name="comId" id="comId" />
                <div class="enterrightlist1">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr class="tablecontent">
                            <td class="line2">实习基地方负责人</td>
                            <td class="line1" >
                                <select id="u_id" name="u_id" >
                                    <?php foreach ($users as $r): ?>
                                        <option value="<?= $r->u_id ?>"
                                        <?php
                                        if (isset($company->u_id) && $r->u_id == $company->u_id && $r->roleId == 4)
                                            echo 'selected';
                                        else
                                            echo '';
                                        ?>
                                                >
                                                    <?= $r->realname ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr> 
                        <tr class="tablecontent">
                            <td class="line2">实习基地状态</td>
                            <td class="line1" >
                                <select id="stateId" name="stateId" >
                                    <?php foreach ($state as $r): ?>
                                        <option value="<?= $r->stateId ?>"
                                        <?php
                                        if (isset($company->stateId) && $r->stateId == $company->stateId)
                                            echo 'selected';
                                        else
                                            echo '';
                                        ?>
                                                >
                                                    <?= $r->state ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr> 
                        <tr class="tablecontent">
                            <td class="line2">实习基地项目</td>
                            <td class="line1" ><select id="p_id" name="p_id" >
                                    <?php foreach ($program as $r): ?>
                                        <option value="<?= $r->p_id ?>"
                                        <?php
                                        if (isset($company->p_id) && $r->p_id == $company->p_id)
                                            echo 'selected';
                                        else
                                            echo '';
                                        ?>
                                                >
                                                    <?= $r->p_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select></td>
                        </tr>
                        <tr class="tablecontent">
                            <td class="line2">实习基地名称</td>
                            <td class="line1" ><input name="comName" type="text" id="comName" value="<?= $company->comName ?>" size="50"    />
                            </td>
                        </tr>
                        <tr class="tablecontent">
                            <td class="line2">实习基地简介</td>
                            <td class="line1" >
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
                                <textarea name="content" id="content" style="visibility:hidden; width:100%; height:30px;"><?= $company->content ?></textarea>
                            </td>
                        </tr>
                        <tr class="tablecontent">
                            <td class="line2">实习基地计划</td>
                            <td class="line1" >
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
                                <textarea name="plan" id="plan" style="visibility:hidden; width:100%; height:30px;"><?= $company->plan ?></textarea>
                            </td>    
                        </tr>
                        <tr class="tablecontent">
                            <td colspan="2" class="line1" align="center">               
                                <input type="submit" value="保存" onclick="return check('form1');"/> 
                                <input type="button" value="返回" onclick="window.location.href='<?= base_url() ?>index.php/admin/company/companyList';"/>
                                <input type="button" value="取消" onclick="window.location.href='<?= base_url() ?>index.php/admin/company/companyDetail/<?= $company->comId ?>';" style="<?php if (isset($show)) echo $show; ?>"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>          
        </div>
    </body>
</html>