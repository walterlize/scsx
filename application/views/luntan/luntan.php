<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>中国农业大学食品科学与营养工程学院生产实习信息化系统--交流互动</title>       
        </style>
        <script language="JavaScript" type="text/JavaScript">
            <!--
            function MM_swapImgRestore() { //v3.0
            var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
            }

            function MM_preloadImages() { //v3.0
            var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
            var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
            if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
            }

            function MM_findObj(n, d) { //v4.01
            var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
            d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
            if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
            for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
            if(!x && d.getElementById) x=d.getElementById(n); return x;
            }

            function MM_swapImage() { //v3.0
            var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
            if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
            }
            //-->
            if(window.name != "bencalie"){
            location.reload();
            window.name = "bencalie";
            }
            else{
            window.name = "";
            }

            function showLay(divId,odivId){
            var objDiv = eval(divId);
            var objDiv1 = eval(odivId);
            if (objDiv.style.display=="none"){
            //eval("sp"+divId+".innerHTML='<img src=images/plus_1.gif>点击收拢'");
            objDiv.style.display="";
            objDiv1.style.display="none";

            }else{
            //eval("sp"+divId+".innerHTML='<img src=images/plus.gif>点击展开'");
            objDiv.style.display="none";
            objDiv1.style.display="";


            }}



            function checkdate()
            {
            thisform = document.dateform;
            if ( thisform.send.value == "" ) {
            alert ("日期不能为空，请重新输入。 ");
            thisform.send.focus();
            return;
            }

            thisform.submit();
            }
            function checkcontent()
            {
            thisform = document.contentform;
            if ( thisform.search.value == "" ) {
            alert ("内容不能为空，请重新输入。 ");
            thisform.search.focus();
            return;
            }

            thisform.submit();
            }
            function checkdepartment()
            {
            thisform = document.departmentform;
            if ( thisform.bname.value == "" ) {
            alert ("部门名称不能为空，请重新输入。 ");
            thisform.bname.focus();
            return;
            }

            thisform.submit();
            }
            function checksender()
            {
            thisform = document.senderform;
            if ( thisform.sendername.value == "" ) {
            alert ("姓名不能为空，请重新输入。 ");
            thisform.sendername.focus();
            return;
            }

            thisform.submit();
            }
            function checkpageno1()
            {
            thisform = document.pageform1;
            if ( thisform.pageno.value == "" ) {
            alert ("页数不能为空，请重新输入。 ");
            thisform.pageno.focus();
            return;
            }

            thisform.submit();
            }
            function checkpageno2()
            {
            thisform = document.pageform2;
            if ( thisform.pageno.value == "" ) {
            alert ("页数不能为空，请重新输入。 ");
            thisform.pageno.focus();
            return;
            }

            thisform.submit();
            }



        </script>
       <!-- <link href="<?= base_url(); ?>css/new.css" rel="stylesheet" type="text/css">
        <style type="text/css">-->
            <!--
            .songhui12 {
                font-family: "宋体", Arial;
                font-size: 12px;
                color: 757575;
                line-height: 20px;
                font-weight: normal;
            }
            .style1 {
                color: #FF0000;
                font-weight: bold;
            }
            -->
        </style>
    </head>

    <body onload="MM_preloadImages('images/l7b.gif', 'images/l4b.gif', 'images/l5b.gif')">
        <!--
        <div align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="962">
                <tbody><tr>
                        <th scope="row" width="20"><div align="center"></div></th>
                        <td width="962"><div align="center">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="963">
                                                    <tbody><tr>
                                                            <th scope="row" height="8" width="15"></th>
                                                            <td height="8"></td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">&nbsp;</th>
                                                            <td>
                                                                </th>
                                                                        </tr>

                                                                        <tr>
                                                                            <th scope="row" height="18" valign="top" width="446"><img src="<?= base_url(); ?>images/luntan/l21.gif" height="24" width="446"></th>
                                                                            <th scope="row" height="18" valign="top">&nbsp;</th>
                                                                            <th scope="row" height="18" valign="top" width="446"><img src="<?= base_url(); ?>images/luntan/l20.gif" height="24" width="446"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row" valign="top" width="446"><table valign="top" height="766" bgcolor="#C3C3C3" border="0" cellpadding="0" cellspacing="1" width="100%">
                                                                                    <tbody><?php if (is_array($luntan1)) foreach ($luntan1 as $r): ?>

                                                                                        <tr bgcolor="#FFFFFF">
                                                                                              <td class="song12" align="left" bgcolor="#FFFFFF" valign="top">
                                                                                                <table valign="top" background="<?= base_url(); ?>images/luntan/l18.gif" border="0" cellpadding="0" cellspacing="6" width="100%">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <th class="song12" scope="row" align="left" width="80"><a name="85451">发帖人：<?= $r->srealname ?></a></th>
                                                                                                            <th class="song12" scope="row" align="left" width="124">发帖时间：<?= $r->time1 ?></th>
                                                                                                        </tr>
                                                                                                    </tbody></table>
                                                                                            </td>
                                                                                        </tr> <tr bgcolor="#FFFFFF">
                                                                                            <td class="song12" align="left" bgcolor="#FFFFFF" valign="top"><table valign="top" border="0" cellpadding="0" cellspacing="6" width="100%">
                                                                                                    <tbody><tr>
                                                                                                            <th class="song12" scope="row" align="left" valign="top"><a name="umd1" id="a"></a><div id="oULayer1"><font color="#339900"><?= $r->content ?></font></div></th>
                                                                                                        </tr>
                                                                                                    </tbody></table></td>
                                                                                        </tr> 
                                                                                            <?php endforeach; ?>


                                                                                    </tbody>
                                                                                </table></th>
                                                                            <th scope="row" valign="top" width="71"></th>
                                                                            <th scope="row" valign="top" width="446"><table bgcolor="#C3C3C3" border="0" cellpadding="0" cellspacing="1" width="100%"><tbody>                                                  
                                                                                        <tr>
                                                                                            <th bordercolor="#FFFFFF" scope="row" height="5" bgcolor="#FFFFFF"><?= $page2 ?></th>
                                                                                        </tr>
                                                                                        <tr bgcolor="#FFFFFF">
                                                                                            <td align="left" bgcolor="#FFFFFF">
                                                                                                <table background="<?= base_url(); ?>images/luntan/l15.gif" border="0" cellpadding="0" cellspacing="6" width="100%">
                                                                                                    <tbody><?php if (is_array($luntan2)) foreach ($luntan2 as $r): ?>

                                                                                                                <tr bgcolor="#FFFFFF">
                                                                                                                    <td align="left" bgcolor="#FFFFFF"><table background="<?= base_url(); ?>images/luntan/l15.gif" border="0" cellpadding="0" cellspacing="6" width="100%">
                                                                                                                            <tbody><tr>
                                                                                                                                    <th class="song12" scope="row" align="left" width="94">发帖人：<?= $r->srealname ?></th>
                                                                                                                                    <th class="song12" scope="row" align="left" width="210">发帖时间：<?= $r->time1 ?></th>

                                                                                                                                </tr>
                                                                                                                            </tbody></table></td>
                                                                                                                </tr>    <tr bgcolor="#FFFFFF">
                                                                                                                    <td class="song12" align="left"><table border="0" cellpadding="0" cellspacing="6" width="100%">
                                                                                                                            <tbody><tr>
                                                                                                                                    <th class="song12" scope="row" align="left"><a name="md1" id="a"></a><div id="oLayer1"><?= $r->content ?></div></th>
                                                                                                                                </tr>
                                                                                                                            </tbody></table></td>
                                                                                                                </tr>
                                                                                                                <tr bgcolor="#FFFFFF">
                                                                                                                    <td class="song12bule" align="left" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="6" width="100%">
                                                                                                                            <tbody><tr>
                                                                                                                                    <th class="song12bule" scope="row" align="left" width="30">&nbsp;</th>
                                                                                                                                    <th class="zikang" scope="row" align="left" valign="middle">回复：<p><?= $r->srealname ?>：<br>
                                                                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;<?= $r->reply ?></p>
                                                                                                                                        <p align="right"><?= $r->time2 ?><br>
                                                                                                                                            <?= $r->trealname ?></p></th></tr>                          
                                                                                                                            </tbody></table></td>
                                                                                                                </tr>
                                                                                                            <?php endforeach; ?>

                                                                                                    </tbody></table></th>
                                                                                        </tr>
                                                                                    </tbody></table></td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">&nbsp;</th>
                                                                            <td>&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                    </tbody></table></th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">&nbsp;</th>
                                                        </tr>
                                                    </tbody></table>
                                                </div></td>
                                            <td width="20"><div align="center"></div></td>
                                        </tr>

                                    </tbody></table>
                            </div>-->
    <div class="newsbox">
	<div class="nowpagebox">
    	<img src="<?= base_url(); ?>images/newspage1.png" />
        <p>当前位置：首页&nbsp;>&nbsp;<span>互动交流</span></p>
    </div>
    <div class="news">
    
    	<div class="noanswerbox">
        	<div class="noanswertitle">未回复贴子</div>
             <?php for($i=0;$i<count($luntan1);$i++):?>
            <div class="answerto">
            	发帖人：<?=$stu1[$i]->stuName?>&nbsp;&nbsp;&nbsp;&nbsp;发帖时间：<?=$luntan1[$i]->time1?>
            </div>
            <div class="answerto1">
           		 <?=$luntan1[$i]->theme?>
            </div>
            <div class="answerfrom">
            	<p class="answerfrom1"></p>
            	<p class="answerfrom1"></p>
            	<p class="answer"></p>
            	<p class="answertime"></p>
            	<p class="answertime"></p>
           </div>  
           <?php endfor;?>  
        </div>
        
        
        
        <div class="answerbox">
            <div class="answertitle">已回复贴子</div>
            <?php for($i=0;$i<count($luntan2);$i++):?>
            <div class="answerto">
            	发帖人：<?=$stu2[$i]->stuName?>&nbsp;&nbsp;&nbsp;&nbsp;发帖时间：<?=$luntan2[$i]->time1?>
            </div>
            <div class="answerto1">
           		 <?=$luntan2[$i]->theme?>
            </div>
            <div class="answerfrom">
            	<p class="answerfrom1">回复：</p>
            	<p class="answerfrom1"></p>
            	<p class="answer"><?=$luntan2[$i]->reply?></p>
            	<p class="answertime"><?=$luntan2[$i]->time2?></p>
            	<p class="answertime"><?=@$tea2[$i]->teaName?></p>
           </div>  
           <?php endfor;?>      
        </div>     
    </div>
</div>                    


                            </body></html>