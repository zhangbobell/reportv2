
<!--head结束-->
</head>

<!--body开始-->
<body>

<!--整个界面开始-->
<div id="wrapper">

    <!--侧边栏开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
							<span>
								<img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/user.jpg" />
                            </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span class="clear">
									<span class="block m-t-xs">
										<strong class="font-bold"><?php echo $username ?></strong>
									</span>
										<span class="text-muted text-xs block">账号信息 <b class="caret"></b></span>
								</span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="mailbox.html">邮件:<?php echo $email;?></a></li>
                            <li class="divider"></li>
                            <li><a href="login/logout">退出</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        E+
                    </div>
                </li>
                <li>
                    <a href="home/index"><i class="fa fa-th-large"></i>
                        <span class="nav-label">首页</span>
                        <span class="label label-warning pull-right"></span>
                    </a>
                </li>
                <li>
                    <a href="advisory/index"><i class="fa fa-globe"></i>
                        <span class="nav-label">全案咨询</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="advisory/index">简介</a></li>
                    </ul>
                </li>
                <li>
                    <a href="graph/index"><i class="fa fa-bar-chart-o"></i>
                        <span class="nav-label">商业智能定制</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <?php if($this->session->userdata('groupID') > -1):?>
                        <li><a href="http://office.e-corp.cn:888/data/">新建查询(预览)</a></li>
                        <li><a href="graph/init_first">报表管理(预览)</a></li>
                        <li><a href="./public/third-party/raw/index.html">报表定制(预览)</a></li>
                        <li><a href="haw">报表定制(Haw)</a></li>
                        <?php endif;?>
                        <!--                        <li ><a href="task/my_task">RAW</a></li>-->

                        <li><a href="graph/index">更多功能</a></li>
                    </ul>
                </li>
                <li>
                    <a href="task/index"><i class="fa fa-diamond"></i>
                        <span class="nav-label">业务流程管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <?php if($this->session->userdata('groupID') > -1):?>
                            <li ><a href="price/control">乱价系统(可用)</a></li>
                            <li ><a href="task/my_task">任务管理(预览)</a></li>
                        <?php endif;?>

                        <li><a href="task/index">更多功能</a></li>
                    </ul>
                </li>
                <li>
                    <a href="process/index"><i class="fa fa-edit"></i>
                        <span class="nav-label">专家系统集成</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <?php if($this->session->userdata('groupID') > -1):?>
                            <li ><a href="javascript:;">知识管理(预览)</a></li>
                            <li ><a href="http://www.e-corp.cn:8989/rules/task_list">规则模块(预览)</a></li>
                        <?php endif;?>
                        <li><a href="process/index">更多功能</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>   <!--侧边栏结束-->