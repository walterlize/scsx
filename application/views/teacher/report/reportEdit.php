<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="lz_title">实习汇报编辑</h3>
    <form name="form1" method="post" action="<?=base_url()?>index.php/teacher/report/save" id="form1">
        <input type="hidden" value="<?= $repo->repo_id ?>" name="repo_id" id="repo_id" />

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
	        
	        <tr>
	            <td class="td1" style="width: 111px">审核结果</td>
	            <td class="td2" >
	            <select name="repo_audit1">
	            <option value="4">审核通过</option>
	            <option value="3">审核失败</option>
	            </select>
	            </td>
	        </tr>
	        <tr>
	            <td class="td1" style="width: 111px" >审核意见</td>
	            <td class="td2" >
	            <textarea rows="5" cols="100" name="repo_audit1_content"><?=$repo->repo_audit1_content?></textarea>
	            </td>
	        </tr>
        
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/teacher/report/reportList';" id="btnReturn" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/teacher/report/reportDetail/<?= $repo->repo_id ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>