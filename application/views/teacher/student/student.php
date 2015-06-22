<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">已发布课程列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col" class="td1">序号</th>
            <th scope="col" class="td3">学号</th>
            <th scope="col" class="td1">姓名</th>
            <th scope="col" class="td3">班级</th>
            <th scope="col" class="td1">基地</th>
            <th scope="col" class="td3">状态</th>
            <th scope="col" class="td1">详细情况</th>
        </tr>
        <?php if (is_array($audit)) foreach ($audit as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $key+1 ?></td>
                    <td class="td3"><?= $r['stu_num'] ?></td>
                    <td class="td1"><?= $r['stu_name'] ?></td>
                    <td class="td3"><?= $r['stu_class'] ?></td>
                    <td class="td1">
                    <?php if($r['elco_id']!=0){?>
                        <?= $r['elco_name'] ?>
                    <?php }else{?>
                    	<?= $r['elco_name'] ?>
                    <?php }?>
                    </td>
                    
                    
                    <td  class="td3"><?= $r['elco_state'] ?></td>
                    <td  class="td1"style="width: 200px;">
                   <a id="" title="查看学生信息以及基地详情" href="<?= base_url() ?>index.php/teacher/student/studentDetail/<?=$cour_id?>/<?= $r['elco_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <div align="right"><?= $num ?></div>
    <div align="center"><?= $page ?></div>
</div>

