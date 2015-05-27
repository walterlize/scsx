
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>right</title>
        
    </head>
    <body>
        <div class="enterright">
            <div class="enterrighttitle"><p>班级分配基地信息编辑</p></div>
            <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/allocation/save" id="form1">
                <input type="hidden" value="<?= $allocation->b_id ?>" name="b_id" id="b_id" />
                <input type="hidden" value="" name="major" id="major" />
                <input type="hidden" value="<?=$courseId?>" name="courseId" id="courseId" />
                <input type="hidden" value="<?=$courseNum?>" name="courseNum" id="courseNum" />
                <div class="enterrightlist">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr class="tablecontent">
                            <td class="line1">实习基地名称</td>
                            <td class="line2" >
                                <select id="c_id" name="c_id" >
                                    <?php foreach ($company as $r): ?>
                                        <option value="<?= $r['id'] ?>">
                                            <?= $r['comName'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                
                            </td>
                        </tr> 
                        <tr class="tablecontent">
                            <td class="line1">班级名称</td>
                            <td class="line2" >
                                <select id="class" name="class" onchange="selectclass()">
                                    <?php foreach ($class as $r): ?>
                                        <option value="<?=$r['class']?>">
                                           <?=$r['class']?>-<?=$r['major']?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <script type="text/javascript">
                                function selectclass(){
    				            	//获取所选一级指标值
    				                var semaj = document.getElementById("major");
    				                var secla = document.getElementById("class");
    				                var str = secla.options[secla.selectedIndex].text;
    				                var arr = str.split("-");
    				                semaj.value = arr[1];
    				                
                                }

                                </script>
                            </td>
                        </tr>                        
                        <tr class="tablecontent">
                            <td colspan="2" class="line1" align="center">
                                <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/allocation/allocationList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/allocation/allocationDetail/<?= $allocation->b_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
                                                        </td>
                        </tr>
                    </table>
                </div>
            </form>          
        </div>
        
    </body>
</html>