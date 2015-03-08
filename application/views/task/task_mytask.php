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
                                        <div class="ibox-tools">
                                            <a href="task/summary" class="btn btn-primary btn-xs">Management</a>
                                        </div>
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
                                                            <?php
                                                                if (time()>strtotime($item['due_date'])) {
                                                                    $class = 'label-default';
                                                                    $caption = 'Unactive';
                                                                } else {
                                                                    $class = 'label-primary';
                                                                    $caption = 'Active';
                                                                }
                                                            ?>
                                                            <span class="label <?php echo $class;?>"><?php echo $caption;?></span>
                                                        </td>
                                                        <td class="project-title">
                                                            <a href="task/detail/db_jiuyang/<?php echo $item['task_id'];?>">任务代号<?php echo $item['task_id'];?></a>
                                                            <br/>
                                                            <small>创建时间 <?php echo $item['createtime'];?></small>
                                                        </td>
                                                        <td class="project-completion">
                                                            <small>备注：无</small>
                                                        </td>
                                                        <td class="project-people">
                                                            <?php echo $item['creator']?>
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
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Management</a>
                                        </div>
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
                                                    <?php if('1' == $item['task_cat']) { ?>
                                                        <tr>
                                                        <td class="project-status">
                                                        <?php
                                                        if (time()>strtotime($item['due_date'])) {
                                                            $class = 'label-default';
                                                            $caption = 'Unactive';
                                                        } else {
                                                            $class = 'label-primary';
                                                            $caption = 'Active';
                                                        }
                                                        ?>
                                                        <span class="label <?php echo $class;?>"><?php echo $caption;?></span>
                                                        </td>
                                                        <td class="project-title">
                                                            <a href="task/detail/db_jiuyang/<?php echo $item['task_id'];?>">任务---<?php echo $item['task_id'];?></a>
                                                            <br/>
                                                            <small>创建时间 <?php echo $item['createtime'];?></small>
                                                        </td>
                                                            <td class="project-completion">
                                                                <small>备注：无</small>
                                                            </td>
                                                            <td class="project-people">
                                                                <?php echo $item['creator']?>
                                                            </td>
                                                        <td class="project-actions">
                                                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                        </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php endforeach;?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-2" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Management</a>
                                        </div>
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
                                                    <?php if('2' == $item['task_cat']) { ?>
                                                        <tr>
                                                            <td class="project-status">
                                                                <?php
                                                                if (time()>strtotime($item['due_date'])) {
                                                                    $class = 'label-default';
                                                                    $caption = 'Unactive';
                                                                } else {
                                                                    $class = 'label-primary';
                                                                    $caption = 'Active';
                                                                }
                                                                ?>
                                                                <span class="label <?php echo $class;?>"><?php echo $caption;?></span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="task/detail/db_jiuyang/<?php echo $item['task_id'];?>">任务---<?php echo $item['task_id'];?></a>
                                                                <br/>
                                                                <small>创建时间 <?php echo $item['createtime'];?></small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>备注：无</small>
                                                            </td>
                                                            <td class="project-people">
                                                                <?php echo $item['creator']?>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-3" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Management</a>
                                        </div>
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
                                                    <?php if('3' == $item['task_cat']) { ?>
                                                        <tr>
                                                            <td class="project-status">
                                                                <?php
                                                                if (time()>strtotime($item['due_date'])) {
                                                                    $class = 'label-default';
                                                                    $caption = 'Unactive';
                                                                } else {
                                                                    $class = 'label-primary';
                                                                    $caption = 'Active';
                                                                }
                                                                ?>
                                                                <span class="label <?php echo $class;?>"><?php echo $caption;?></span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="task/detail/db_jiuyang/<?php echo $item['task_id'];?>">任务---<?php echo $item['task_id'];?></a>
                                                                <br/>
                                                                <small>创建时间 <?php echo $item['createtime'];?></small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>备注：无</small>
                                                            </td>
                                                            <td class="project-people">
                                                                <?php echo $item['creator']?>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-4" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Management</a>
                                        </div>
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
                                                    <?php if('4' == $item['task_cat']) { ?>
                                                        <tr>
                                                            <td class="project-status">
                                                                <?php
                                                                if (time()>strtotime($item['due_date'])) {
                                                                    $class = 'label-default';
                                                                    $caption = 'Unactive';
                                                                } else {
                                                                    $class = 'label-primary';
                                                                    $caption = 'Active';
                                                                }
                                                                ?>
                                                                <span class="label <?php echo $class;?>"><?php echo $caption;?></span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="task/detail/db_jiuyang/<?php echo $item['task_id'];?>">任务---<?php echo $item['task_id'];?></a>
                                                                <br/>
                                                                <small>创建时间 <?php echo $item['createtime'];?></small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>备注：无</small>
                                                            </td>
                                                            <td class="project-people">
                                                                <?php echo $item['creator']?>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php endforeach;?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-5" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Management</a>
                                        </div>
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
                                                    <?php if('5' == $item['task_cat']) { ?>
                                                        <tr>
                                                            <td class="project-status">
                                                                <?php
                                                                if (time()>strtotime($item['due_date'])) {
                                                                    $class = 'label-default';
                                                                    $caption = 'Unactive';
                                                                } else {
                                                                    $class = 'label-primary';
                                                                    $caption = 'Active';
                                                                }
                                                                ?>
                                                                <span class="label <?php echo $class;?>"><?php echo $caption;?></span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="task/detail/db_jiuyang/<?php echo $item['task_id'];?>">任务---<?php echo $item['task_id'];?></a>
                                                                <br/>
                                                                <small>创建时间 <?php echo $item['createtime'];?></small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>备注：无</small>
                                                            </td>
                                                            <td class="project-people">
                                                                <?php echo $item['creator']?>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-6" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Management</a>
                                        </div>
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
                                                    <?php if('6' == $item['task_cat']) { ?>
                                                        <tr>
                                                            <td class="project-status">
                                                                <?php
                                                                if (time()>strtotime($item['due_date'])) {
                                                                    $class = 'label-default';
                                                                    $caption = 'Unactive';
                                                                } else {
                                                                    $class = 'label-primary';
                                                                    $caption = 'Active';
                                                                }
                                                                ?>
                                                                <span class="label <?php echo $class;?>"><?php echo $caption;?></span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="task/detail/db_jiuyang/<?php echo $item['task_id'];?>">任务---<?php echo $item['task_id'];?></a>
                                                                <br/>
                                                                <small>创建时间 <?php echo $item['createtime'];?></small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>备注：无</small>
                                                            </td>
                                                            <td class="project-people">
                                                                <?php echo $item['creator']?>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php endforeach;?>
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