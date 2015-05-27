<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>实习报名列表</h3>
    <?php 
    	for($i=0;$i<count($variable);$i++):
    		echo '<div style="font-size: 18px;font-weight: bold; margin-top:20px;color:blue">';
    		echo $variable[$i]['courseName'];
    		echo "-";
    		echo $variable[$i]['courseNameEn'];
    		echo "(";
    		echo $variable[$i]['courseId'];
    		echo "-";
    		echo $variable[$i]['courseNum'];
    		echo ")";
    		echo "<br />";
    		echo "</div>";
    ?>
    <hr>
    
    
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">实习项目基地名</th>
            <th scope="col">基地地址</th>
            <th scope="col">基地负责人</th>
            <th scope="col">基地负责电话</th>
            <th scope="col">操作</th>
        </tr>
        <?php foreach ($var_com[$i] as $r):?>
        <tr>
        	
        	<td><?=$r->comName?></td>
        	<td><?=$r->address?></td>
        	<td><?=$r->realname?></td>
        	<td><?=$r->phone?></td>
        	<td>
        		<a id="" href="<?= base_url() ?>index.php/student/baoming/baomingDetail/<?= $r->id ?>">详细</a>
        	</td>
        </tr>
        <?php endforeach;?>
        
        
    </table>
    <br><br>
    <?php endfor;?>
    
</div>