
<div id="left_wrap">
    <div class="left_top">
        <span class="">超级管理员</span>
    </div>
    <div class="menu_wrap">
        <div class="menu">
            <ul id="nav">
                <li><a href="#"><span>信息管理</span></a>
                    <ul>
                        <li><a href="<?= base_url(); ?>index.php/superadmin/college/collegeList" target="mainFrame"><span>学院名称管理</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/superadmin/user/userList" target="mainFrame"><span>院级管理员信息管理</span></a></li>
                    </ul></li>
            </ul>
        </div>
    </div>
</div>
<div id="sidebar">
    <a onclick="changeFrame()" href="#">
        <img src="<?= base_url(); ?>images1/admin/menu_hide.gif" />
    </a>
</div>
