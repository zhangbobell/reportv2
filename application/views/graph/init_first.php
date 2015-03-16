<!---->
<!--<div id="container1" class="col-md-12">追灿招募最近7天成交额（分销商评级）正在加载...</div>-->
<!--<div id="container2" class="col-md-12">追灿招募商家数量（分销商评级）正在加载...</div>-->
<!--<div id="container3" class="col-md-12">追灿招募订单关闭率、订单退款率正在加载...</div>-->
<!--<div id="container4" class="col-md-12">追灿招募流失商家数正在加载...</div>-->
<!--<div id="container5" class="col-md-12">追灿招募最近7天成交额（合作状态）正在加载...</div>-->
<!--<div id="container6" class="col-md-12">追灿招募商家数量（合作状态）正在加载...</div>-->
<!---->


<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>任务列表</h2>
        <ol class="breadcrumb">
            <li>
                <a href="task/my_task">任务概要</a>
            </li>
            <li class="active">
                <strong>任务列表</strong>
            </li>
        </ol>
    </div>
</div>
<br>
<div class="ibox float-e-margins">
<div class="ibox-content">
<div class="panel-heading">
    <div class="panel-options">
        <ul class="nav nav-tabs">
            <li class="active"><a href="graph/init_first">第一时间</a></li>
            <li class=""><a href="graph/init_tendency">趋势</a></li>
            <li class=""><a href="graph/init_target">目标管理</a></li>
            <li class=""><a href="graph/init_product">产品渠道分布</a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
<div class="tab-content">
<div id="tab-0" class="tab-pane active">
    <div class="ibox">


        <div class="ibox-content">
<!--            <p class="alert alert-danger" id="info"></p>-->
<!--            <div class="col-md-12 fix"><button type="button" class="btn btn-primary r" onclick="$.jStorage.flush(); window.location.reload(true);">刷新数据</button></div>-->

            <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
            <?php $this->load->view('widget/db_picker')?>
            <div id="container1"></div>
            <div id="container2"></div>
        </div>
    </div>
</div>

<div id="tab-1" class="tab-pane">
    <div class="ibox">
        <div class="ibox-title">
        </div>

        <div class="ibox-content">
        </div>
    </div>
</div>

<div id="tab-2" class="tab-pane">
    <div class="ibox">
        <div class="ibox-title">
        </div>

        <div class="ibox-content">
        </div>
    </div>
</div>

<div id="tab-3" class="tab-pane">
    <div class="ibox">
        <div class="ibox-title">
        </div>

        <div class="ibox-content">
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