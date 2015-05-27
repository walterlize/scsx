
<table width="962" border="0" align="center" cellpadding="0" cellspacing="0" height="8">
    <tbody><tr>
            <td></td>
        </tr>
    </tbody></table>


<table width="962" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody><tr>
            <td width="255" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#d5d5d5 solid 1px; margin-bottom:10px;">
                    <tbody>
                        <tr>
                            <td valign="top" bgcolor="#f6f4f4" style="padding:8px;"><table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                                    <tbody>
                                        <tr>

                                            <td height="50" ><a target="_blank" href="<?= base_url() ?>index.php/index/instruction/9/9"><img src="<?= base_url() ?>images/coe/661.gif" border="0"></a></td>
                                        </tr>
                                        <tr>
                                            <td height="8"></td>
                                        </tr>
                                        <tr>
                                            <!--<td height="50" background="<?= base_url() ?>images/coe/662.gif" width="237" align="center" style="background-repeat: no-repeat; background-position: center 50%"><a target="_blank" style="color: #42a5c4; font-size: 16px; font-weight: bold" href="<?= base_url() ?>index.php/index/instruction1/2/2"></a></td>-->

                                            <td height="50" ><a target="_blank" href="<?= base_url() ?>index.php/index/instruction/10/10"><img src="<?= base_url() ?>images/coe/663.gif" border="0"></a></td>
                                        </tr>
                                        <tr>
                                            <td height="8"></td>
                                        </tr>
                                        <tr>

                                            <td height="50" ><a target="_blank" href="<?= base_url() ?>index.php/index/instruction/8/8"><img src="<?= base_url() ?>images/coe/662.gif" border="0"></a></td>
                                        </tr>
                                        <tr>
                                            <td height="8"></td>
                                        </tr>
                                        <tr>
                                    </tbody>
                                </table></td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#d5d5d5 solid 1px; margin-bottom:10px;">
                    <tbody>
                        <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" height="27" background="<?= base_url() ?>images/coe/gxy_29.jpg">
                                    <tbody>
                                        <tr>
                                            <td width="2%" valign="top"><img src="<?= base_url() ?>images/coe/gxy_37.jpg" width="26" height="27" alt="" /></td>
                                            <td style="padding-left:5px; font-weight:bold; color:#003333; padding-top:3px">友情链接 </td>
                                            <td></td>
                                            <td align="right" style="padding-right:10px"><div style="margin-top:2px;"></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td valign="top" style="padding:8px; background-color:#fcfcfc" background="<?= base_url() ?>images/coe/gxy_62.jpg">
                                                <div align="left" height="27">
                                                   <!-- <select name="select1" style="font:9pt;width:120" onchange="javascript:window.open(this.options[this.selectedIndex].value);">
                                                        <option selected="selected">------友情链接------</option>
                                                        <option value="http://coe.cau.edu.cn/">中国农业大学工学院</option>
                                                    </select>-->
                                                    <a href="http://www.moe.gov.cn/" target="_blank"> 教育部</a>
                                                    <br> <a href="http://cau.edu.cn" target="_blank"> 中国农业大学</a>
                                                    <br>   <a href="http://spxy.cau.edu.cn/" target="_blank"> 中国农业大学食品科学与营养工程学院</a>
                                                    <br>  <a href="http://www.ciee.cn/" target="_blank"> 中国农业大学信息与电气工程学院</a>

                                                </div></td>
                                        </tr>
                                    </tbody>
                                </table></td>
                        </tr>
                    </tbody>
                </table></td>






            <td width="10"> </td>
            <td valign="top">
                 <table width="100%" border="0" cellspacing="0" cellpadding="0" height="29" background="<?= base_url() ?>images/coe/gxy_25.jpg">
                    <tbody><tr>
                            <td width="4%" align="center" style="padding-left:5px;"><img src="<?= base_url() ?>images/coe/gxy_32.jpg" width="4" height="13" alt=""></td>
                            <td style=" font-weight:bold; color:#222222; padding-top:3px">通知公告 </td>
                            <td align="right" style="padding-right:10px"><div style="margin-top:2px;">
                                    <a style="font-family:&#39;宋体&#39;" href="<?= base_url() ?>index.php/admin/notice/noticeLists">更多&gt;&gt;</a></div> </td>
                        </tr>
                    </tbody></table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
                    <tbody><tr>

                            <td valign="top" style="padding:8px; ">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                        <?php if (is_array($notice)) foreach ($notice as $r): ?>
                                                <tr>
                                                    <td><a title="<?= $r->title ?>" href="<?= base_url() ?>index.php/admin/notice/noticeDetails/<?= $r->n_id ?>" target="_blank">
                                                            <b>.
                                                                <?
                                                                if (strLength($r->title, $charset = 'utf-8') > 24) {
                                                                    echo utf8Substr($r->title, $from = 0, 24);
                                                                    echo "...";
                                                                } else {
                                                                    echo $r->title;
                                                                }
                                                                ?>
                                                            </b>         

                                                        </a></td><td align="right"><?= $r->sendTime ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                    </tbody></table></td>
                        </tr>
                    </tbody></table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" height="29" background="<?= base_url() ?>images/coe/gxy_25.jpg">
                    <tbody><tr>
                            <td width="4%" align="center" style="padding-left:5px;"><img src="<?= base_url() ?>images/coe/gxy_32.jpg" width="4" height="13" alt=""></td>
                            <td style=" font-weight:bold; color:#222222; padding-top:3px">实习新闻 </td>
                            <td align="right" style="padding-right:10px"><div style="margin-top:2px;">
                                    <a style="font-family:&#39;宋体&#39;" href="<?= base_url() ?>index.php/admin/news/newsLists">更多&gt;&gt;</a></div> </td>
                        </tr>
                    </tbody></table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
                    <tbody><tr>
                            <td valign="top" style="padding:8px; ">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody> 
                                        <?php if (is_array($news)) foreach ($news as $r): ?>
                                                <tr>
                                                    <td><a title="<?= $r->title ?>" href="<?= base_url() ?>index.php/admin/news/newsDetails/<?= $r->newsId ?>" target="_blank">
                                                            <b>.
                                                                <?
                                                                if (strLength($r->title, $charset = 'utf-8') > 24) {
                                                                    echo utf8Substr($r->title, $from = 0, 24);
                                                                    echo "...";
                                                                } else {
                                                                    echo $r->title;
                                                                }
                                                                ?>
                                                            </b>         

                                                        </a></td><td align="right"><?= $r->sendTime ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                    </tbody></table></td>
                        </tr>
                    </tbody></table>   
                </td>
            <td width="10"> </td>



            <td width="255" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#d5d5d5 solid 1px">
                    <tbody><tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" height="27" background="<?= base_url() ?>images/coe/gxy_29.jpg">
                                    <tbody><tr>
                                            <td width="2%"><img src="<?= base_url() ?>images/coe/gxy_37.jpg" width="26" height="27" alt=""></td>
                                            <td style="padding-left:5px; font-weight:bold; color:#003333; padding-top:3px">用户登录</td>
                                            <td></td>
                                            <td align="right" style="padding-right:10px"><div style="margin-top:2px;">

                                                </div></td>
                                        </tr>
                                    </tbody></table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr style="<?= $form ?>">
                                            <td valign="top" style="padding:8px; background-color:#fcfcfc"><div style="height:50px;">

                                                    <form method="post" action="<?= base_url() ?>index.php/index/login" id="login-form"> 
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody><tr>
                                                                    <td>用户名：</td>
                                                                    <td>

                                                                        <input type="text" name="u_id" id="u_id" style="width:100px;">
                                                                    </td>
                                                                    <td rowspan="2"><input type="submit" value="提交" class="input"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>密&nbsp;&nbsp;码：</td>
                                                                    <td><input type="password" name="password" id="password" style="width:100px;"></td>
                                                                    <!--<td><input type="reset" name="ok2" id="ok2" value="重置" onclick="window.location.href='<?= base_url() ?>index.php/user/password';" ></td>-->
                                                                </tr>
                                                            </tbody></table>
                                                    </form>
                                                </div></td>
                                        </tr>
                                        <tr style="<?= $welcome ?>">
                                            <td valign="top" style="padding:8px; background-color:#fcfcfc"><div style="height:50px;">

                                                    <form method="post" action="<?= base_url() ?>index.php/index/login" id="login-form"> 
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>                                                    
                                                            <td>欢迎您，<?php if (isset($coe_username)) echo $coe_username; ?></td>  <br/>
                                                            <td> <a href="<?= base_url() ?>index.php/index/getin/<?= $userid ?>">
                                                                    <b> 进入</b>
                                                                </a>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                                <a class="titleLink" href="<?= base_url() ?>index.php/index/logout">
                                                                    退出
                                                                </a></td>

                                                            </tbody></table>
                                                    </form>
                                                </div></td>
                                        </tr>
                                        <tr style="<?= $welcome1 ?>">
                                            <td valign="top" style="padding:8px; background-color:#fcfcfc"><div style="height:50px;">

                                                    <form method="post" action="<?= base_url() ?>index.php/index/login" id="login-form"> 
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>                                                    
                                                            <td>欢迎您，<?php if (isset($coe_username)) echo $coe_username; ?></td>  <br/>
                                                            <td> 
                                                                &nbsp; &nbsp;<a href="<?= base_url() ?>index.php/user/password"  target="_blank"><b>重置密码</b></a>
                                                                &nbsp; &nbsp;
                                                                <a class="titleLink" href="<?= base_url() ?>index.php/index/logout">
                                                                    退出
                                                                </a></td>

                                                            </tbody></table>
                                                    </form>
                                                </div></td>
                                        </tr>
                                    </tbody></table></td>
                        </tr>
                    </tbody></table></br>
               <!-- <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td height="8px"></td></tr>
                        <tr>
                            <td align="center"><a href="http://coe.cau.edu.cn/col/col5352/index.html"><img border="0" alt="" width="257" height="65" src="<?= base_url() ?>images/coe/sys_10.gif"></a></td>
                        </tr><tr><td height="8px"></td></tr>
                        <tr><td align="center"><a href="http://coe.cau.edu.cn/col/col5854/index.html" target="_blank"><img border="0" alt="" width="257" height="65" src="<?= base_url() ?>images/coe/sys_13.gif"></a>      </td></tr><tr><td height="8px"></td></tr>
                        <tr><td align="center"><a href="http://coe.cau.edu.cn/module/messagebook/que_messagebook.jsp?ColumnID=261" target="_blank"><img border="0" alt="" width="257" height="65" src="<?= base_url() ?>images/coe/sys_15.gif"></a></td>
                        </tr><tr><td height="8px"></td></tr>
                    </tbody></table>-->
                <table width="100%" border="0" cellspacing="0" cellpadding="0" height="29" background="<?= base_url() ?>images/coe/gxy_25.jpg">
                    <tbody><tr>
                            <td width="4%" align="center" style="padding-left:5px;"><img src="<?= base_url() ?>images/coe/gxy_32.jpg" width="4" height="13" alt=""></td>
                            <td style=" font-weight:bold; color:#222222; padding-top:3px">实习基地材料 </td>
                            <td align="right" style="padding-right:10px"><div style="margin-top:2px;">
                                    <a style="font-family:&#39;宋体&#39;" href="<?= base_url() ?>index.php/admin/company/companyLists">更多&gt;&gt;</a></div> </td>
                        </tr>
                    </tbody></table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody><tr>

                            <td valign="top" style="padding:8px; ">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                        <?php if (is_array($company)) foreach ($company as $r): ?>
                                                <tr>
                                                    <td><a title="<?= $r->comName ?>" href="<?= base_url() ?>index.php/admin/company/companyDetails/<?= $r->comId ?>" target="_blank">
                                                            <b>.
                                                                <?
                                                                if (strLength($r->comName, $charset = 'utf-8') > 24) {
                                                                    echo utf8Substr($r->comName, $from = 0, 24);
                                                                    echo "...";
                                                                } else {
                                                                    echo $r->comName;
                                                                }
                                                                ?>
                                                            </b>         
                                                        </a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                    </tbody></table></td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#d5d5d5 solid 1px">
                    <tbody><tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" height="27" background="<?= base_url() ?>images/coe/gxy_29.jpg">
                                    <tbody><tr>
                                            <td width="2%"><img src="<?= base_url() ?>images/coe/gxy_37.jpg" width="26" height="27" alt=""></td>
                                            <td style="padding-left:5px; font-weight:bold; color:#003333; padding-top:3px">联系我们
                                            </td>
                                            <td> </td>
                                            <td align="right" style="padding-right:10px"><div style="margin-top:2px;">
                                                </div> </td>
                                        </tr>
                                    </tbody></table></td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                                <td valign="top" style="padding:8px; background-color:#fcfcfc">电话：010-62736553<br>E-mail：6553@cau.edu.cn<br>地址：北京市海淀区清华东路十七号
                                </td>
                            </tr>
                        </tbody></table></td>
        </tr>
    </tbody></table></td>





</tr>
</tbody></table>
