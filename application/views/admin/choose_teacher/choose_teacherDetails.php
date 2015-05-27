<!--
<div style="margin-left:20px; margin-right:20px;">
    <br />
    <TD align="center" style="font-family:宋体;font-size:14pt;line-height:20pt;color:#000"><B><font size=4><center>实习基地信息</center></font></B></TD>
    <center>
    <table cellpadding="0" cellspacing="1"  border="2" border-color="black" width="1000" >
        <tr>
            <td class="td1" style="width: 111px"><font size=3>实习基地名称</font></td>
            <td class="td2" ><font size=3><?= $comName ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>地址</font></td>
            <td class="td2" ><font size=3><?= $caddress ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>基地方负责人</font></td>
            <td class="td2" ><font size=3><?= $yrealname ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>指导老师</font></td>
            <td class="td2" ><font size=3><?= $ttrealname ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>带队老师</font></td>
            <td class="td2" ><font size=3><?= $realname ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>实习基地简介</font></td>
            <td class="td2" ><font size=3><?= $content ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px"><font size=3>实习指导书</font></td>
            <td class="td2" ><font size=3><?= $plan ?>&nbsp;</font></td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" value="关闭窗口" id="close" class="input" onclick="window.close()">
            </td>
        </tr>
    </table></center>
</div>
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>right</title>
    </head>
    <body>
        <div class="enterright">
            <div class="enterrighttitle"><p>实习基地信息</p></div>
            <div class="enterrightlist">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="tablecontent">
                        <td class="line1">实习基地名称</td>
                        <td class="line2" ><?= $comName ?>&nbsp;</td>
                    </tr>
                    <tr class="tablecontent">
                        <td class="line1">地址</td>
                        <td class="line2" ><?= $caddress ?>&nbsp;</td>
                    </tr>
                    <tr class="tablecontent">
                        <td class="line1">实习基地负责人</td>
                        <td class="line2" ><?= $yrealname ?>&nbsp;</td>
                    </tr>  
                    <tr class="tablecontent">
                        <td class="line1">指导教师</td>
                        <td class="line2" ><?= $ttrealname ?>&nbsp;</td>
                    </tr>                     
                    <tr class="tablecontent">
                        <td class="line1">带队教师</td>
                        <td class="line2" ><?= $realname ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">实习基地简介</td>
                        <td class="line2" ><?= $content ?>&nbsp;</td>
                    </tr> 
                    <tr class="tablecontent">
                        <td class="line1">实习指导书</td>
                        <td class="line2" ><?= $plan ?>&nbsp;</td>
                    </tr> 
                             
                    <tr class="tablecontent">
                        <td colspan="2" class="line1" align="center">
                            <a href="#" onclick="window.close()">关闭窗口</a>                              
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>