<!--
<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>查看分配结果列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习项目名称</th><th scope="col">实习基地名称</th><th scope="col">班级</th><th scope="col">学生学号</th><th scope="col">学生姓名</th><th scope="col">带队教师</th><th scope="col">指导教师</th><th scope="col">基地负责人</th>
        </tr>
        <?php if (is_array($allocation)) foreach ($allocation as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><?= $r['p_name'] ?></td>
                    <td><?= $r['comName'] ?></td>
                    <td><?= $r['stuclass'] ?></td> 
                    <td><?= $r['stu_name'] ?></td> 
                    <td><?= $r['sturealname'] ?></td>
                    <td><?= $r['trname'] ?></td>
                    <td><?= $r['trealname'] ?></td>
                    <td><?= $r['yrealname'] ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>right</title>
    </head>
    <body>
        <div class="enterright">
            <div class="enterrighttitle"><p>查看分配结果列表</p></div>
            <div class="enterrightlist">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="tabletitle">
                    	<td class="line2" style="width: 10%">实习项目<br />课程号</td>
                        <td class="line2" style="width: 10%">实习项目<br />课序号</td>
                        <td class="line2" style="width: 20%">实习项目<br />名称</td>
                        <td class="line2" style="width: 10%">班级</td>
                        <td class="line2" style="width: 30%">实习基地<br />名称</td>
                        <td class="line2" style="width: 10%">学生<br />学号</td>
                        <td class="line2" style="width: 10%">学生<br />姓名</td>
                    </tr>  
                    <?php if (is_array($allocation)) foreach ($allocation as $r): ?>
                            <tr class="tablecontent" align="center">
                            	<td class="line2" style="width: 10%"><?= $r['courseId'] ?></td>
                                <td class="line2" style="width: 10%"><?= $r['courseNum'] ?></td>
                                <td class="line2" style="width: 20%"><?= $r['courseName'] ?></td>
                                <td class="line2" style="width: 10%"><?= $r['stuClass'] ?></td>
                                <td class="line2" style="width: 30%"><?= $r['comName'] ?></td>  
                                <td class="line2" style="width: 10%"><?= $r['stuId'] ?></td>
                                <td class="line2" style="width: 10%"><?= $r['stuName'] ?></td>                               
                            </tr>
                        <?php endforeach; ?>              
                </table>
            </div>
            <div class="pagenumber" align="center"><?= $page ?></div>       
        </div>
    </body>
</html>