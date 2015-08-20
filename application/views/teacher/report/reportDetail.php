<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3 class="lz_title">实习汇报</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
   		<tr>
            <td class="td1" style="width: 111px">课程</td>
            <td class="td2" ><?= $repo->repo_cour_name ?>(<?= $repo->repo_cour_no ?>--<?= $repo->repo_cour_num ?>)&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">提交学生</td>
            <td class="td2" ><?= $repo->repo_auther ?>&nbsp;&nbsp;(<?= $repo->repo_auther_id ?>)&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">标题</td>
            <td class="td2" ><?= $repo->repo_title ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">内容</td>
            <td class="td2" ><?= $repo->repo_title ?>&nbsp;</td>
        </tr>
        
        <tr>
            <td class="td1" style="width: 111px">状态</td>
            <td class="td2" >
            <?php 
		            if($repo->repo_state==1) echo "草稿"; 
		            if($repo->repo_state==2) echo "已提交";
		            if($repo->repo_state==3) echo "教师审核失败";
		            if($repo->repo_state==4) echo "教师审核成功";
		            if($repo->repo_state==5) echo "管理员审核失败";
		            if($repo->repo_state==6) echo "管理员审核成功";
		            
		        ?>
            </td>
        </tr>
        <?php if($repo->repo_state >=3 ){?>
        <tr>
            <td class="td1" style="width: 111px">审核教师</td>
            <td class="td2" ><?= $repo->repo_auditer1 ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">审核意见</td>
            <td class="td2" ><?= $repo->repo_audit1_content ?>&nbsp;</td>
        </tr>
        <?php if($repo->repo_state >=5 ){?>
        <tr>
            <td class="td1" style="width: 111px">审核管理员</td>
            <td class="td2" ><?= $repo->repo_auditer2 ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">审核意见</td>
            <td class="td2" ><?= $repo->repo_audit2_content ?>&nbsp;</td>
        </tr>
        <?php }?>
        <?php }?>
        <tr>
            <td colspan="2" class="td3" align="center">
            <?php if($repo->repo_state < 5){?>
            	<input type="button" name="btnEdit" value="审 核" onclick="window.location.href='<?= base_url() ?>index.php/teacher/report/reportEdit/<?= $repo->repo_id ?>';" id="btnEdit" class="input" />
            <?php }?>
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/report/reportList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>