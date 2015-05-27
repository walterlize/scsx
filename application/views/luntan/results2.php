<div style="margin-left:20px; margin-right:20px">
    <br />
    <h1><font size=4>回帖列表</font></h1>
    <form action="<?=  base_url()?>index.php/luntan/results2" method="post">
        查询类型：
        <select name="searchtype">
            <option value="type">发帖类别</option>
            <option value="theme">发帖主题</option>
        </select>
        查询内容：
        <input name="searchterm" type="text" size="30"/>
        <input type="submit" name="submit" value="查询"/>
        <br/><br/>
    </form>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col"><font size=3><center>学生发帖编号</center></font></th><th scope="col"><font size=3><center>发帖时间</center></font></th><th scope="col"><font size=3><center>发帖类别</center></font></th><th scope="col"><font size=3><center>发帖主题</center></font></th><th scope="col"><font size=3><center>教师姓名</center></font></th><th scope="col"><font size=3><center>回帖时间</center></font></th><th scope="col"><font size=3><center>操作</center></font></th>
        </tr>
        <?php if (is_array($jieguo)) foreach ($jieguo as $r): ?>
                <tr class="RowStyle" align="center">
                    <td><font size=3><?= $r['l_id'] ?></font></td>    
                    <td><font size=3><?= $r['time1'] ?></font></td>
                    <td><font size=3><?= $r['type'] ?></font></td> 
                    <td><font size=3><?= $r['theme'] ?></font></td>  
                    <td><font size=3><?= $r['trealname'] ?></font></td>
                    <td><font size=3><?= $r['time2'] ?></font></td>
                    <td><font size=3>
                        <a id="" href="<?= base_url() ?>index.php/luntan/luntan/luntanDetail2/<?= $r['l_id'] ?>">详细</a>
                    </font></td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>