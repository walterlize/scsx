<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>实习报名查看信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">实习项目模式</td>
            <td class="td2" >志愿式</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目课程号</td>
            <td class="td2" ><?= $comcou->courseId ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目课序号</td>
            <td class="td2" ><?= $comcou->courseNum ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目课程名</td>
            <td class="td2" ><?= $comcou->courseName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习项目英文名</td>
            <td class="td2" ><?= $comcou->courseNameEn ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">指导教师姓名</td>
            <td class="td2" ><?= $course->courseTeaName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地名称</td>
            <td class="td2" ><?= $company->comName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地地址</td>
            <td class="td2" ><?= $company->address ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地主页</td>
            <td class="td2" ><?= $company->url ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地简介</td>
            <td class="td2" ><?= $company->content ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地计划</td>
            <td class="td2" ><?= $company->plan ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">实习基地负责人</td>
            <td class="td2" ><?= $comuser->realname ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责人电话</td>
            <td class="td2" ><?= $comuser->phone ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责人邮箱</td>
            <td class="td2" ><?= $comuser->email ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责人地址</td>
            <td class="td2" ><?= $comuser->address ?>&nbsp;</td>
        </tr>
        
        <tr>
            <td class="td1" style="width: 111px">实习报名状态</td>
            <td class="td2" ><?= $baoming->state ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/student/chakan/chakanList';" id="btnReturn" class="input" />      
            </td>
        </tr>
    </table>
</div>