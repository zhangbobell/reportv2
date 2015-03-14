
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
<!--                            <li><a href="profile.html">个人</a></li>-->
                            <li><a href="javascript:;">邮件：<?php echo $email;?></a></li>
                            <li class="divider"></li>
                            <li><a href="login/logout ">退出</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="task/home"><i class="fa fa-th-large"></i>
                        <span class="nav-label">首页</span>
                        <span class="label label-warning pull-right"></span>
                    </a>
                </li>
                <li>
                    <a href="task/advisory"><i class="fa fa-globe"></i>
                        <span class="nav-label">全案咨询</span>
                        <span class="label label-warning pull-right"></span>
                    </a>
                </li>
                <li class="active">
                    <a href="task/decision"><i class="fa fa-bar-chart-o"></i>
                        <span class="nav-label">商业智能定制</span>
                        <span class="label label-warning pull-right"></span>
                    </a>
                </li>
                <li>
                    <a href="task/my_task"><i class="fa fa-diamond"></i>
                        <span class="nav-label">专家系统集成</span>
                        <span class="label label-primary pull-right">NEW</span>
                    </a>
                </li>
                <li>
                    <a href="task/process"><i class="fa fa-edit"></i>
                        <span class="nav-label">业务流程管理 </span>
                        <span class="label label-warning pull-right"></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>   <!--侧边栏结束-->