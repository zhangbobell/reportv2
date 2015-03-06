<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="panel-heading">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-0">全部</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-1">客户运营</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2">营销管理</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-3">供应管理</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-4">跨界营销</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-5">渠道运营</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-6">品牌管理</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="tab-0" class="tab-pane active">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>All projects assigned to this account--0</h5>
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Create new project</a>
                                        </div>
                                    </div>

                                    <div class="ibox-content">
                                        <div class="row m-b-sm m-t-sm">
                                            <div class="col-md-1">
                                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                                            </div>
                                            <div class="col-md-11">
                                                <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                            </div>
                                        </div>

                                        <div class="project-list">
                                            <table class="table table-hover">
                                                <tbody>
                                                <?php foreach($task_list as $item):?>
                                                    <tr>
                                                        <td class="project-status">
                                                            <span class="label label-primary">Active</span>
                                                        </td>
                                                        <td class="project-title">
                                                            <a href="task/detail/db_jiuyang/<?php echo $item['task_id'];?>">任务---<?php echo $item['task_id'];?></a>
                                                            <br/>
                                                            <small>创建时间 <?php echo $item['createtime'];?></small>
                                                        </td>
                                                        <td class="project-completion">
                                                            <small>Completion with: 8%</small>
                                                            <div class="progress progress-mini">
                                                                <div style="width: 8%;" class="progress-bar"></div>
                                                            </div>
                                                        </td>
                                                        <td class="project-people">
                                                            <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                            <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        </td>
                                                        <td class="project-actions">
                                                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-1" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>All projects assigned to this account--1</h5>
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Create new project</a>
                                        </div>
                                    </div>

                                    <div class="ibox-content">
                                        <div class="row m-b-sm m-t-sm">
                                            <div class="col-md-1">
                                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                                            </div>
                                            <div class="col-md-11">
                                                <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                            </div>
                                        </div>

                                        <div class="project-list">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-2" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>All projects assigned to this account--2</h5>
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Create new project</a>
                                        </div>
                                    </div>

                                    <div class="ibox-content">
                                        <div class="row m-b-sm m-t-sm">
                                            <div class="col-md-1">
                                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                                            </div>
                                            <div class="col-md-11">
                                                <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                            </div>
                                        </div>

                                        <div class="project-list">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-3" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>All projects assigned to this account--3</h5>
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Create new project</a>
                                        </div>
                                    </div>

                                    <div class="ibox-content">
                                        <div class="row m-b-sm m-t-sm">
                                            <div class="col-md-1">
                                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                                            </div>
                                            <div class="col-md-11">
                                                <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                            </div>
                                        </div>
                                        <div class="project-list">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-4" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>All projects assigned to this account--4</h5>
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Create new project</a>
                                        </div>
                                    </div>

                                    <div class="ibox-content">
                                        <div class="row m-b-sm m-t-sm">
                                            <div class="col-md-1">
                                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                                            </div>
                                            <div class="col-md-11">
                                                <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                            </div>
                                        </div>

                                        <div class="project-list">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-5" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>All projects assigned to this account--5</h5>
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Create new project</a>
                                        </div>
                                    </div>

                                    <div class="ibox-content">
                                        <div class="row m-b-sm m-t-sm">
                                            <div class="col-md-1">
                                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                                            </div>
                                            <div class="col-md-11">
                                                <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                            </div>
                                        </div>

                                        <div class="project-list">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-6" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>All projects assigned to this account--6</h5>
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Create new project</a>
                                        </div>
                                    </div>

                                    <div class="ibox-content">
                                        <div class="row m-b-sm m-t-sm">
                                            <div class="col-md-1">
                                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                                            </div>
                                            <div class="col-md-11">
                                                <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                            </div>
                                        </div>

                                        <div class="project-list">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contract with Zender Company</a>
                                                        <br/>
                                                        <small>Created 14.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 48%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 48%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-default">Unactive</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                        <br/>
                                                        <small>Created 10.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 8%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 8%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Letraset sheets containing</a>
                                                        <br/>
                                                        <small>Created 22.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 83%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 83%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">Contrary to popular belief</a>
                                                        <br/>
                                                        <small>Created 14.07.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 97%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 97%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label label-primary">Active</span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="project_detail.html">There are many variations of passages</a>
                                                        <br/>
                                                        <small>Created 11.08.2014</small>
                                                    </td>
                                                    <td class="project-completion">
                                                        <small>Completion with: 28%</small>
                                                        <div class="progress progress-mini">
                                                            <div style="width: 28%;" class="progress-bar"></div>
                                                        </div>
                                                    </td>
                                                    <td class="project-people">
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a6.jpg"></a>
                                                        <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>