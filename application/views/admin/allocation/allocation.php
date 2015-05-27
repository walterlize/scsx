
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?= base_url(); ?>css/css1.css" type="text/css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>right</title>
    </head>
    <body>
        <div class="enterright">
            <div class="enterrighttitle"><p>班级分配基地信息列表</p></div>
            <div class="enterrightlist">
            <?php 
            for($i=0;$i<count($course);$i++):
            	echo $course[$i]['courseName'];
            	echo "--(";
	            echo $course[$i]['courseId'];
	            echo "-";
	            echo $course[$i]['courseNum'];
	            echo ")";
            	echo "<br>";
            ?>
            
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="tabletitle">
                        <td class="line2">班级</td>
                        <td class="line2">实习基地名称</td>
                        <td>操作</td>
                    </tr>  
                    <?php foreach ($allo[$i] as $r):?>
                    <tr>
                    	<td class="line2"><?=$r['class']?></td>
                        <td class="line2"><?=$r['comName']?></td>
                        <td class="line2">
                        	<a href="#" onclick="deleteInfo('<?= base_url() ?>index.php/admin/allocation/allocationDelete/<?=$r['c_id']?>');" >删除</a>  
                        </td>
                        </tr>
                    <?php endforeach;?>
                    <tr>
                    <?php $courseId = $course[$i]['courseId'];$courseNum = $course[$i]['courseNum'];?>
                        <td class="tablecontent" colspan="7" align="center">
                        <form action="<?= base_url() ?>index.php/admin/allocation/allocationNew" method="post">
                        <input type="hidden" value="<?=$courseId?>" name="courseId" />
                        <input type="hidden" value="<?=$courseNum?>" name="courseNum" />
                        <input type="submit" value="分配"/>
                                   
                            </form>                  
                        </td>
                    </tr>
                </table>
                <?php endfor;?>
            </div>
            <div class="pagenumber" align="center"><?= $page ?></div>       
        </div>
        
    </body>
</html>
