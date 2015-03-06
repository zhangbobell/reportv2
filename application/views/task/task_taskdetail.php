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
            <h2>任务---<?php echo $task_detail[0]['task_id'];?></h2>
        </div>
        <dl class="dl-horizontal">
            <dt>状态:</dt> <dd><span class="label label-primary">Active</span></dd>
        </dl>
    </div>
</div>
<div class="row">
    <div class="col-lg-5">
        <dl class="dl-horizontal">

            <dt>操作ID:</dt> <dd>  <?php echo $task_detail[0]['target_type'];?></dd>

            <dt>目标对象:</dt> <dd><?php echo $task_detail[0]['target'];?></dd>

            <dt>截止日期:</dt> <dd>04/03/2015</dd>
        </dl>
    </div>
    <div class="col-lg-7" id="cluster_info">
        <dl class="dl-horizontal" >

            <dt>更新时间:</dt> <dd><?php echo $task_detail[0]['updatetime'];?></dd>
            <dt>创建时间:</dt> <dd> 	<?php echo $task_detail[0]['createtime'];?> </dd>
            <dt>参与人员:</dt>
            <dd class="project-people">
                <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a3.jpg"></a>
                <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a1.jpg"></a>
                <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a2.jpg"></a>
                <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a4.jpg"></a>
                <a href=""><img alt="image" class="img-circle" src="<?php echo base_url().IMG_DIR;?>/a5.jpg"></a>
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
            <th>商品ID</th>
            <th>标题</th>
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
                    <?php echo $item['action_id'];?>
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
        <h4>Project description</h4>
        <img src="<?php echo base_url().IMG_DIR;?>/zender_logo.png" class="img-responsive">
        <p class="small">
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look
            even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
        </p>
        <p class="small font-bold">
            <span><i class="fa fa-circle text-warning"></i> High priority</span>
        </p>
        <h5>Project tag</h5>
        <ul class="tag-list" style="padding: 0">
            <li><a href=""><i class="fa fa-tag"></i> Zender</a></li>
            <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
            <li><a href=""><i class="fa fa-tag"></i> Passages</a></li>
            <li><a href=""><i class="fa fa-tag"></i> Variations</a></li>
        </ul>
        <h5>Project files</h5>
        <ul class="list-unstyled project-files">
            <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
            <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
            <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
            <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
        </ul>
        <div class="text-center m-t-md">
            <a href="#" class="btn btn-xs btn-primary">Add files</a>
            <a href="#" class="btn btn-xs btn-primary">Report contact</a>

        </div>
    </div>
</div>
</div>

</div>
</div>

</div>