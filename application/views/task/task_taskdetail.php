
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>任务详情</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>任务详情</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <div class="wrapper wrapper-content animated fadeInUp">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="m-b-md">
                                            <a href="#" class="btn btn-white btn-xs pull-right">编辑任务</a>
                                            <h3>任务代号<?php echo $task_base[0]['task_id'];?>-产品<?php echo $task_base[0]['task_title'];?>相关</h3>
                                        </div>
                                        <dl class="dl-horizontal">
                                            <?php
                                            if (time()>strtotime($task_base[0]['due_date'])) {
                                                $class = 'label-default';
                                                $caption = 'Unactive';
                                            } else {
                                                $class = 'label-primary';
                                                $caption = 'Active';
                                            }
                                            ?>
                                            <dt>状态:</dt> <dd><span class="label <?php echo $class;?>"><?php echo $caption;?></span></dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <dl class="dl-horizontal">

                                            <dt>操作ID:</dt> <dd>  <?php echo $task_detail[0]['target_type'];?></dd>

                                            <dt>创建人:</dt> <dd>  <?php echo $task_base[0]['creator'];?></dd>

                                            <dt>截止日:</dt> <dd><?php echo $task_base[0]['due_date'];?></dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-7" id="cluster_info">
                                        <dl class="dl-horizontal" >

                                            <dt>更新时间:</dt> <dd><?php echo $task_detail[0]['updatetime'];?></dd>
                                            <dt>创建时间:</dt> <dd> 	<?php echo $task_detail[0]['createtime'];?> </dd>
                                            <dt>参与人员:</dt>
                                            <dd>
                                                <?php echo $task_base[0]['assignee'];?>
                                            </dd>

                                        </dl>
                                    </div>
                                </div>

                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                        <div class="panel blank-panel">
                                            <div class="panel-heading">
                                                <div class="panel-options">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab-1" data-toggle="tab">工单</a></li>
                                                        <li class=""><a href="#tab-2" data-toggle="tab">更改记录</a></li>
                                                        <li class=""><a href="#tab-3" data-toggle="tab">流程</a></li>
                                                        <li class=""><a href="#tab-4" data-toggle="tab">描述</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab-1">
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>状态</th>
                                                                <th>任务ID</th>
                                                                <th>目标对象</th>
                                                                <th>执行</th>
                                                                <th>备注</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($task_detail as $item):?>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $item['target_type'];?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $item['target'];?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $task_base[0]['assignee'];?>
                                                                        </td>
                                                                        <td>
                                                                            <p class="small">
                                                                                尚未添加备注
                                                                            </p>
                                                                        </td>

                                                                    </tr>
                                                                <?php endforeach;?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane" id="tab-3">
                                                        process...
                                                    </div>

                                                    <div class="tab-pane" id="tab-4">
                                                        describe...
                                                    </div>
                                                    <div class="tab-pane" id="tab-2">
                                                        <div class="feed-activity-list">
                                                            <div class="feed-element">
                                                                <a href="#" class="pull-left">
                                                                    <img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-right">2h ago</small>
                                                                    <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                                    <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                                                    <div class="well">
                                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                        Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="#" class="pull-left">
                                                                    <img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-right">2h ago</small>
                                                                    <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                                                    <small class="text-muted">2 days ago at 8:30am</small>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="#" class="pull-left">
                                                                    <img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-right text-navy">5h ago</small>
                                                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                                    <div class="actions">
                                                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                                        <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="#" class="pull-left">
                                                                    <img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-right">2h ago</small>
                                                                    <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                                    <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                                                    <div class="well">
                                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                        Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="#" class="pull-left">
                                                                    <img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/profile.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-right">23h ago</small>
                                                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="#" class="pull-left">
                                                                    <img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a7.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-right">46h ago</small>
                                                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
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
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="wrapper wrapper-content project-manager">
                        <h4>task description</h4>

                        <p class="small">
                            <?php echo $task_base[0]['task_desc']?>
                        </p>

                        <h5>task tag</h5>
                        <ul class="tag-list" style="padding: 0">
                            <li><a href=""><i class="fa fa-tag"></i> Zender</a></li>
                            <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                            <li><a href=""><i class="fa fa-tag"></i> Passages</a></li>
                            <li><a href=""><i class="fa fa-tag"></i> Variations</a></li>
                        </ul>
                        <h5>task files</h5>
                        <ul class="list-unstyled project-files">
                            <li><a href=""><i class="fa fa-file"></i> task_document.docx</a></li>
                            <li><a href=""><i class="fa fa-file-picture-o"></i> description_company.jpg</a></li>
                            <li><a href=""><i class="fa fa-stack-exchange"></i> Email.mln</a></li>
                            <li><a href=""><i class="fa fa-file"></i> Contract_3_3_2015.docx</a></li>
                        </ul>
                        <div class="text-center m-t-md">
                            <a href="#" class="btn btn-xs btn-primary">增加文件</a>
                            <a href="#" class="btn btn-xs btn-primary">反映问题</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>