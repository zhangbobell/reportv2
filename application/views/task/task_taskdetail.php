
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>任务详情</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="task/my_task">任务概要</a>
                        </li>
                        <li>
                            <a href="task/task_list">任务列表</a>
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
<!--                                            <a href="#" class="btn btn-white btn-xs pull-right">编辑任务</a>-->
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
                                                        change...
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
                        <h5>追灿咨询</h5>

                        <p class="small">
<!--                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                            <strong>致力于数据应用推动企业效益提升</strong>-->
<!--                            ---杭州追灿科技有限公司是杭州市重点扶持的科技创新企业，国内首家数据战略咨询服务公司。追灿主要以大数据应用为核心，为企业提供7大解决方案，覆盖企业市场空间、投入产出比、重复购买和产品溢价四大核心提升点，推动企业在互联经济时代核心能力提升。-->
<!--                            <br>-->
<!--                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                            如果您在使用过程中，发现任何问题，或者有任何建议，欢迎随时联系我们。请您勾选一下方面问题，帮助我们更加快速给您回复及调整优化:
                            <br>
                            <ul>
                                <li><a href="javascript:;">1.操作不够简便，使用体验不好</a></li>
                                <li><a href="javascript:;">2.页面打开速度慢，等待时间长</a></li>
                                <li><a href="javascript:;">3.功能偏少，需要再增添</a></li>
                                <li><a href="javascript:;">4.其他</a></li>
                            </ul>
                        <h5>联系我们</h5>
                            <ul>
                                <li>邮箱：mhx@e-corp.cn</li>
                                <li>电话：0571- 85784363</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>