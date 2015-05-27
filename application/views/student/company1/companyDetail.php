<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>提交实习项目基地信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习基地名称</td>
            <td class="td2" ><?= $free->comName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地方负责人</td>
            <td class="td2" ><?= $free->realname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地方负责人性别</td>
            <td class="td2" ><?= $free->sex ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地负责人电话</td>
            <td class="td2" ><?= $free->phone ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地负责人邮箱</td>
            <td class="td2" ><?= $free->email ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">基地负责人地址</td>
            <td class="td2" ><?= $free->address ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地简介</td>
            <td class="td2" ><?= $free->content ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地计划</td>
            <td class="td2" ><?= $free->plan ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/student/company/companyEdit';" id="btnEdit" class="input" />
            </td>
        </tr>
        
    </table>
    <br>
    <span style="color:red; font-weight: bold;">
    <?php 
    if($free->comName) {
    	echo $free->state;
    	if($free->state=="审核失败"){
    		echo "<br>";
    		echo "请修改实习基地信息重新提交！";
    	}
    }
    	?>
    </span>
</div>