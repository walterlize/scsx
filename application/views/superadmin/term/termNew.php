<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<div class="enterright" style="background-color: #F8F8F8">
    	<div class="enterrighttitle"><p>设置当前学期</p></div>
        <div class="enterrightlist">
  
        	<form name="form1" method="post" action="<?= base_url() ?>index.php/superadmin/term/termSet" id="form1">
            <input type="hidden" value="<?= $term->id ?>" name="id" id="id" />
        	
        	<table width="99%" cellpadding="0" cellspacing="0">
        		<tr>
                <td class="tabletitle" style="padding-left: 15px; width: 30%">新增学期</td>
                <td class="tablecontent" style="padding-left: 15px" >
                <input type="text" value="" name="y1" />&nbsp;-&nbsp;
                <input type="text" value="" name="y2" />&nbsp;学年夏（三学期）
                </td>
            </tr>
            
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/superadmin/term/termList';" id="btnReturn" class="input" />
            </tr>
            </table>
        </form>
        </div>     
</div>




