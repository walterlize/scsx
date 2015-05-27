
<table width="962" border="0" align="center" cellpadding="0" cellspacing="0" height="8">
    <tbody><tr>
            <td></td>
        </tr>
    </tbody></table>


<table width="962" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody><tr>                          
            <td width="255" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" height="27" background="<?= base_url() ?>images/coe/gxy_29.jpg">
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

                                                        <input type="text" name="u_name" id="u_name" style="width:100px;">
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
                    </tbody>
            </td>
        </tr>
    </tbody>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" height="29" background="<?= base_url() ?>images/coe/gxy_25.jpg">
    <tbody><tr>
            <td width="4%" align="center" style="padding-left:5px;"><img src="<?= base_url() ?>images/coe/gxy_32.jpg" width="4" height="13" alt=""></td>
            <td style=" font-weight:bold; color:#222222; padding-top:3px">实习规定 </td>
            <td align="right" style="padding-right:10px"><div style="margin-top:2px;">
                    <a style="font-family:&#39;宋体&#39;" href="<?= base_url() ?>index.php/admin/guiding/guidingLists">更多&gt;&gt;</a></div> </td>
        </tr>
    </tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
    <tbody><tr>

            <td valign="top" style="padding:8px; ">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <?php if (is_array($guiding)) foreach ($guiding as $r): ?>
                                <tr>
                                    <td><a title="<?= $r->title ?>" href="<?= base_url() ?>index.php/admin/guiding/guidingDetails/<?= $r->guidingId ?>" target="_blank">
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

                                    <a href="http://www.moe.gov.cn/" target="_blank"> 教育部</a>
                                    <br> <a href="http://cau.edu.cn" target="_blank"> 中国农业大学</a>                                                  
                                    <br>  <a href="http://spxy.cau.edu.cn/" target="_blank">食品科学与营养工程学院</a>

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
                    <td style=" font-weight:bold; color:#222222; padding-top:3px">实习基地信息 </td>
                    <td align="right" style="padding-right:10px"><div style="margin-top:2px;">
                            <a style="font-family:&#39;宋体&#39;" href="<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherLists">更多&gt;&gt;</a></div> </td>
                </tr>
            </tbody></table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tbody><tr>

                    <td valign="top" style="padding:8px; ">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <?php if (is_array($company)) foreach ($company as $r): ?>
                                        <tr>
                                            <td><a title="<?= $r->comName ?>" href="<?= base_url() ?>index.php/admin/choose_teacher/choose_teacherDetails/<?= $r->c_id ?>" target="_blank">
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
                        <td valign="top" style="padding:8px; background-color:#fcfcfc">电话：010-62737959<br>E-mail：fanqin@cau.edu.cn<br>地址：北京市海淀区清华东路17号

                        </td>
                    </tr>
                </tbody></table></td>
            </tr>
            </tbody></table></td>





</tr>
</tbody></table>

</br>    

<table width="962" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody><tr>
            <td valign="top" style=" padding:10px; padding-top:0px;">
                <div id="demoa" style="OVERFLOW: hidden; WIDTH: 950px;" align="center"><table cellspacing="0" cellpadding="0" align="center" border="0"><tbody><tr>
                                <td id="marquePic1" valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody><tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.dylsc.com/"><img src="<?= base_url() ?>images/gundong/01.png" border="0" width="178" height="110">北京大洋路农副产品批发市场<br/>有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.daoxiangcun.com/PC/index.html"><img src="<?= base_url() ?>images/gundong/02.jpg" border="0" width="178" height="110">北京稻香村食品有限责任公司<br/>食品厂</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.huajiafood.com/"><img src="<?= base_url() ?>images/gundong/03.jpeg" border="0" width="178" height="133">北京港龙华佳食品有限公司</br></a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.greenyard.cn/"><img src="<?= base_url() ?>images/gundong/04.jpg" border="0" width="178" height="133">北京归原生态农业有限公司</br></a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.maidangao.com/?comId=beijing"><img src="<?= base_url() ?>images/gundong/05.jpg" border="0" width="178" height="133">北京好利来工贸有限公司</br></a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.4009009009.cn/"><img src="<?= base_url() ?>images/gundong/06.jpg" border="0" width="178" height="133">北京和合谷餐饮管理有限公司</br>    </a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.huiyuan.com.cn/"><img src="<?= base_url() ?>images/gundong/07.jpg" border="0" width="178" height="133">北京汇源食品饮料有限公司 </br>     </a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.bjlacc.com/"><img src="<?= base_url() ?>images/gundong/08.png" border="0" width="178" height="133">北京老才臣食品有限公司</br></a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.zhangyu-wine.com/"><img src="<?= base_url() ?>images/gundong/09.jpg" border="0" width="178" height="133">北京张裕爱斐堡国际酒庄</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                  <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.bjtsb.gov.cn/"><img src="<?= base_url() ?>images/gundong/10.png" border="0" width="178" height="133">北京海淀区产品质量监督检验所</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.yihaikerry.net.cn/cn/index.aspx"><img src="<?= base_url() ?>images/gundong/11.jpg" border="0" width="178" height="133">嘉里粮油（天津）有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.xl178.cn/Html/index.Html"><img src="<?= base_url() ?>images/gundong/12.jpg" border="0" width="178" height="133">新乡新良粮油加工有限责任公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.meizileyuan.com/"><img src="<?= base_url() ?>images/gundong/13.jpg" border="0" width="178" height="133">北京美滋乐源食品有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://szsyz.cau.edu.cn/"><img src="<?= base_url() ?>images/gundong/14.png" border="0" width="178" height="133">中国农业大学上庄试验站</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.wasdonfood.com/default.asp"><img src="<?= base_url() ?>images/gundong/15.png" border="0" width="178" height="133">山东万思顿农业产业园有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.andre.com.cn/"><img src="<?= base_url() ?>images/gundong/16.jpg" border="0" width="178" height="110">烟台北方安德利果汁股份<br/>有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.haoxiangni.cn/"><img src="<?= base_url() ?>images/gundong/17.jpg" border="0" width="178" height="133">好想你枣业股份有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://wusjt.foodmate.net/"><img src="<?= base_url() ?>images/gundong/18.jpg" border="0" width="178" height="133">泉州市伍氏企业美食有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.feidagroup.com/"><img src="<?= base_url() ?>images/gundong/19.png" border="0" width="178" height="133">山东飞达集团有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.dyheyuan.com/"><img src="<?= base_url() ?>images/gundong/20.jpg" border="0" width="178" height="133">山东鹤园食品有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://3837952.czvv.com/"><img src="<?= base_url() ?>images/gundong/21.jpg" border="0" width="178" height="133">山东天博食品配料有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.tempus.cn/"><img src="<?= base_url() ?>images/gundong/22.jpg" border="0" width="178" height="133">深圳腾邦酒业有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.dfa3999.com/sc/index.php"><img src="<?= base_url() ?>images/gundong/23.jpg" border="0" width="178" height="133">大成食品有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td><td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.xiwangfoods.com/"><img src="<?= base_url() ?>images/gundong/24.jpg" border="0" width="178" height="133">烟台市喜旺食品有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.zjkhl.gov.cn/article/20110818/402103424-2011-00042.html"><img src="<?= base_url() ?>images/gundong/25.jpg" border="0" width="178" height="133">中法葡萄庄园</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.mengniu.com.cn/"><img src="<?= base_url() ?>images/gundong/26.jpg" border="0" width="178" height="133">蒙牛乳业（集团）股份有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-right:8px">
                                                        <tbody><tr>
                                                                <td width="178" style="border:#D2D2D2 solid 1px;padding:3px;background-color:#FFFFFF;"><a target="_blank" href="http://www.wissun.com/"><img src="<?= base_url() ?>images/gundong/27.jpg" border="0" width="178" height="133">明一国际营养品集团有限公司</a></td>

                                                            </tr>

                                                        </tbody></table>
                                                </td>
                                            </tr></tbody></table></td><td id="marquePic2" valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody><tr>
                                              
                                            </tr></tbody></table></td></tr></tbody></table></div><script language="javascript" type="text/javascript">var speed=10;marquePic2.innerHTML=marquePic1.innerHTML; function Marquee(){ if(demoa.scrollLeft>=marquePic1.scrollWidth){ demoa.scrollLeft=0; }else{ demoa.scrollLeft++; }}; var MyMar=setInterval(Marquee,speed); demoa.onmouseover=function() {clearInterval(MyMar)}; demoa.onmouseout=function() {MyMar=setInterval(Marquee,speed)};</script></td>
        </tr>
    </tbody></table>

