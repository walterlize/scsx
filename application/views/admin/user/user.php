<link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
<style>
<!--
td{
text-align: left;
padding-left: 10px;
}
-->
</style>
<div class="enterright" style="background-color: #F8F8F8">
    	<div class="enterrighttitle">
    		<p style="float: left;">用户列表</p>
    		<div style="float: right; height: 100%; margin-top: 10px; margin-right: 10px;">
	    		<form action="<?=  base_url()?>index.php/admin/news/results" method="post">
				        查询类型：
				        <select name="searchtype">
				            <option value="kind">类型</option>
				            <option value="title">标题</option>
				        </select>
				        查询内容：
				        <input name="searchterm" type="text" size="30"/>
				        <input type="submit" name="submit" value="查询"/>
				        <br/><br/>
				    </form>
    		</div>
    	</div>
        <div class="enterrightlist" style="margin-top: 10px;">
        
        
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="tabletitle">
            		
                	
                	<td class="line2" style="width: 18%">用户ID</td>
           	 		<td class="line2" style="width: 18%">登录名</td>
            		<td class="line2" style="width: 18%">真实姓名</td>
            		<td class="line2" style="width: 18%">密码</td>
            		<td class="line2" style="width: 18%">身份</td>
            		<td class="line2" style="width: 10%">操作</td>
                </tr>
                
                 <?php if (is_array($user)) foreach ($user as $r): ?>
                <tr class="tablecontent">
               		
                	
                	<td class="line2" style="width: 18%"><?= $r['u_id'] ?></td>
                    <td class="line2" style="width: 18%"><?= $r['u_name'] ?></td>
                    <td class="line2" style="width: 18%" ><?= $r['realname'] ?></td>
                    <td class="line2" style="width: 18%"><?= $r['password'] ?></td>
                    <td class="line2" style="width: 18%"><?= $r['roleName'] ?></td>
                    <td class="line2" style="width: 10%">
                        <a id="" href="<?= base_url() ?>index.php/admin/user/userDetail/<?= $r['u_id'] ?>">详细</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                <td colspan="5" align="center" style="text-align: center">
                 <input type="button" name="btnNew" value="单条记录新增" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userNew';" id="btnNew" class="input" />
                <input type="button" name="btnDownload" value="模板下载" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/download';" id="btnDownload" class="input"  />
                <input type="button" name="btnUpload" value="导入文件" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/upload';" id="btnUpload" class="input"  />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userList';" id="btnReturn" class="input"  style="display:none"/>
                            </td>
            </tr>
          
                
            </table>
            <div align="center"><?= $page ?></div>
        </div>
        
</div>

























