<!--<div class="col-md-12 fix"><button type="button" class="btn btn-primary r" onclick="$.jStorage.flush(); window.location.reload(true);">刷新数据</button></div>-->





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
                            <strong>商业智能定制</strong>
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
                                <li class=""><a href="graph/init_first">第一时间</a></li>
                                <li class=""><a href="graph/init_tendency">趋势</a></li>
                                <li class=""><a href="graph/init_target">目标管理</a></li>
                                <li class="active"><a href="graph/init_product">产品渠道分布</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="tab-0" class="tab-pane">
                                <div class="ibox">
                                    <div class="ibox-title">
                                    </div>

                                    <div class="ibox-content">
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

                            <div id="tab-2" class="tab-pane active">
                                <div class="ibox">

                                    <div class="ibox-content">
                                        <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
                                        <?php $this->load->view('widget/db_picker')?>
                                        <div id="container4-1" class="col-md-12">类目销量正在加载...</div>
                                        <div id="container4-8" class="col-md-12">类目铺货量正在加载...</div>

                                        <!---->
                                        <!--<div id="container4-3" class="col-md-12">所有渠道商家铺货量正在加载...</div>-->
                                        <!--<div class="col-md-12 mt20">-->
                                        <!--    <div class="col-md-12 mt20 mb30 fix" id="filter">-->
                                        <!--        <div class="col-md-3" id="tag441-wrap">-->
                                        <!--            <select class="form-control" id="tag441">-->
                                        <!--                <option value="All">全部</option>-->
                                        <!--                --><?php //foreach($tag1 as $v): ?>
                                        <!--                    <option value="--><?php //echo $v['tag1']; ?><!--">--><?php //echo $v['tag1'] === '' ? 'unname' : $v['tag1'];?><!--</option>-->
                                        <!--                --><?php //endforeach; ?>
                                        <!--            </select>-->
                                        <!--        </div>-->
                                        <!--        <div class="col-md-3" id="tag442-wrap"></div>-->
                                        <!--        <div class="col-md-3" id="tag443-wrap"></div>-->
                                        <!--        <div class="col-md-3 r">-->
                                        <!--            <button type="button" class="btn btn-primary r" id="redraw-bubble-44">确认</button>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--    <div id="container4-4" class="col-md-12">所有产品铺货量正在加载...</div>-->
                                        <!--</div>-->
                                        <!--<div class="col-md-12 mt20">-->
                                        <!--    <div class="col-md-12 mt20 mb30 fix" id="filter">-->
                                        <!--        <div class="col-md-3" id="tag451-wrap">-->
                                        <!--            <select class="form-control" id="tag451">-->
                                        <!--                <option value="All">全部</option>-->
                                        <!--                --><?php //foreach($tag1 as $v): ?>
                                        <!--                    <option value="--><?php //echo $v['tag1']; ?><!--">--><?php //echo $v['tag1'] === '' ? 'unname' : $v['tag1'];?><!--</option>-->
                                        <!--                --><?php //endforeach; ?>
                                        <!--            </select>-->
                                        <!--        </div>-->
                                        <!--        <div class="col-md-3" id="tag452-wrap"></div>-->
                                        <!--        <div class="col-md-3" id="tag453-wrap"></div>-->
                                        <!--        <div class="col-md-3 r">-->
                                        <!--            <button type="button" class="btn btn-primary r" id="redraw-bubble-45">确认</button>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--    <div id="container4-5" class="col-md-12">所有产品销量正在加载...</div>-->
                                        <!--</div>-->

                                        <div id="container4-7" class="col-md-12" style="height: 900px">合作商家销售额正在加载...</div>
                                        <div id="container4-9" class="col-md-12" style="height: 900px">非合作商家销售额正在加载...</div>
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