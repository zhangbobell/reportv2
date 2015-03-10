<div class="wrapper wrapper-content animated fadeInRight">
    <h2>任务概要</h2>
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a class="label label-success pull-right" href="task/task_list">查看任务列表</a>
                    <h5>客户运营</h5>
                </div>
                <div class="ibox-content">
                    <p class="no-margins">完成任务数 <strong>/</strong> 所有任务</p>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a class="label label-success pull-right" href="task/task_list">查看任务列表</a>
                    <h5>营销管理</h5>
                </div>
                <div class="ibox-content">
                    <p class="no-margins">完成任务数 <strong>/</strong> 所有任务</p>
                    <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a class="label label-success pull-right" href="task/task_list">查看任务列表</a>
                    <h5>供应管理</h5>
                </div>
                <div class="ibox-content">
                    <p class="no-margins">完成任务数 <strong>/</strong> 所有任务</p>
                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a class="label label-success pull-right" href="task/task_list">查看任务列表</a>
                    <h5>跨界营销</h5>
                </div>
                <div class="ibox-content">
                    <p class="no-margins">完成任务数 <strong>/</strong> 所有任务</p>
                    <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a class="label label-success pull-right" href="task/task_list">查看任务列表</a>
                    <h5>渠道运营</h5>
                </div>
                <div class="ibox-content">
                    <p class="no-margins">完成任务数 <strong>/</strong> 所有任务</p>
                    <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a class="label label-success pull-right" href="task/task_list">查看任务列表</a>
                    <h5>品牌管理</h5>
                </div>
                <div class="ibox-content">
                    <p class="no-margins">完成任务数 <strong>/</strong> 所有任务</p>
                    <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>任务指标概图 </h5>

                    <div ibox-tools></div>
                </div>
                <div class="ibox-content">
                    <div>
                        <canvas id="doughnutChart" height="100" width="200" ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox float-e-margins animated fadeInRight">
        <div class="ibox-content">
            <div class="panel-heading">
                <div class="panel-options">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">客户运营</a></li>
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
                    <div id="tab-1" class="tab-pane active">
                        <div class="col-lg-6">
                            <div class="ibox-title">
                                <h5>指标数值  </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data</th>
                                        <th>target</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><span class="pie">0.52,1.041</span></td>
                                        <td>客户重复购买率</td>
                                        <td class="text-navy">   </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><span class="pie">226,134</span></td>
                                        <td>老客户销售额占比</td>
                                        <td class="text-warning">   </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><span class="pie">0.52/1.561</span></td>
                                        <td>客户流失率</td>
                                        <td class="text-navy">  </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div id="tab-2" class="tab-pane">
                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Value Table </h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>User</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>投入产出比</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-warning"><i class="fa fa-level-down"></i></td>
                                            <td>转化率</td>
                                            <td class="text-warning">  </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab-3" class="tab-pane">
                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Value Table </h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>User</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>库存占比</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-warning"><i class="fa fa-level-down"></i></td>
                                            <td>断货率</td>
                                            <td class="text-warning">  </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>0销量产品占比</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-warning"><i class="fa fa-level-down"></i></td>
                                            <td>产销率</td>
                                            <td class="text-warning">  </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab-4" class="tab-pane">
                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Value Table </h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>User</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>销售额</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-warning"><i class="fa fa-level-down"></i></td>
                                            <td>连带销售占比</td>
                                            <td class="text-warning">  </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>投入产出比</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab-5" class="tab-pane">
                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Value Table </h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>User</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>渠道销售额</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-warning"><i class="fa fa-level-down"></i></td>
                                            <td>渠道流失率</td>
                                            <td class="text-warning">  </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>渠道成长率</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab-6" class="tab-pane">
                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Value Table </h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>User</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>乱价率</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-warning"><i class="fa fa-level-down"></i></td>
                                            <td>窜货率</td>
                                            <td class="text-warning">  </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>可控销售额占比</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>好评率</td>
                                            <td class="text-navy">   </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-navy"><i class="fa fa-level-up"></i></td>
                                            <td>客单价</td>
                                            <td class="text-navy">   </td>
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

