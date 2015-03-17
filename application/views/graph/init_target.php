

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>商业智能定制</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="task/my_task">定制结果</a>
                        </li>
                        <li class="active">
                            <strong>目标管理</strong>
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
                                <li class="active"><a href="graph/init_target">目标管理</a></li>
                                <li class=""><a href="graph/init_product">产品渠道分布</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="tab-0" class="tab-pane">
                                <div class="ibox">


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
<!--                                        <div class="col-md-12 fix"><button type="button" class="btn btn-primary r" onclick="$.jStorage.flush(); window.location.reload(true);">刷新数据</button></div>-->
                                        <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
                                        <?php $this->load->view('widget/db_picker')?>
                                        <input type="hidden" id="user" value="<?php echo $username;?>"/>

                                        <div id="container3-0" class="col-md-10">年销售目标加载中...</div>
                                        <div  class="col-md-2">
                                            <div class="form-group">
                                                <label for="target">年销售目标</label>
                                                <input type="text" class="form-control" name="target" id="target0" placeholder="请输入目标">
                                                <input type="hidden" id="period0" value="0"/>
                                                <input type="hidden" id="t_type0" value="0"/>
                                                <button id="btn0" type="button" class="btn btn-primary mt10 r">提交</button>
                                            </div>
                                        </div>

                                        <div id="container3-2" class="col-md-10">月累计销售目标加载中...</div>
                                        <div  class="col-md-2">
                                            <div class="form-group">
                                                <label for="target">月累计销售目标</label>
                                                <input type="text" class="form-control" name="target" id="target2" placeholder="请输入目标">
                                                <input type="hidden" id="period2" value="1"/>
                                                <input type="hidden" id="t_type2" value="0"/>
                                                <button id="btn2" type="button" class="btn btn-primary mt10 r">提交</button>
                                            </div>
                                        </div>

<!--                                        <div id="container3-1" class="col-md-10">乱价率目标加载中...</div>-->
<!--                                        <div  class="col-md-2">-->
<!--                                            <div class="form-group">-->
<!--                                                <label for="target">乱价率目标</label>-->
<!--                                                <input type="text" class="form-control" name="target" id="target1" placeholder="请输入目标">-->
<!--                                                <input type="hidden" id="period1" value="1"/>-->
<!--                                                <input type="hidden" id="t_type1" value="1"/>-->
<!--                                                <button id="btn1" type="button" class="btn btn-primary mt10 r">提交</button>-->
<!--                                            </div>-->
<!--                                        </div>-->

                                        <div id="container3-5" class="col-md-10">月累计招商数目标加载中...</div>
                                        <div  class="col-md-2">
                                            <div class="form-group">
                                                <label for="target">月累计招商数目标</label>
                                                <input type="text" class="form-control" name="target" id="target5" placeholder="请输入目标">
                                                <input type="hidden" id="period5" value="1"/>
                                                <input type="hidden" id="t_type5" value="2"/>
                                                <button id="btn5" type="button" class="btn btn-primary mt10 r">提交</button>
                                            </div>
                                        </div>


                                        <div id="container3-3" class="col-md-10">铺货商家数量目标加载中...</div>
                                        <div  class="col-md-2">
                                            <div class="form-group">
                                                <label for="target">铺货商家数量目标</label>
                                                <input type="text" class="form-control" name="target" id="target3" placeholder="请输入目标">
                                                <input type="hidden" id="period3" value="1"/>
                                                <input type="hidden" id="t_type3" value="3"/>
                                                <button id="btn3" type="button" class="btn btn-primary mt10 r">提交</button>
                                            </div>
                                        </div>

                                        <!--<div id="container3-4" class="col-md-10">非授权占比（销售额）目标加载中...</div>-->
                                        <!--<div  class="col-md-2">-->
                                        <!--    <div class="form-group">-->
                                        <!--        <label for="target">非授权占比（销售额）目标</label>-->
                                        <!--        <input type="text" class="form-control" name="target" id="target4" placeholder="请输入目标">-->
                                        <!--        <input type="hidden" id="period4" value="1"/>-->
                                        <!--        <input type="hidden" id="t_type4" value="0"/>-->
                                        <!--        <button id="btn4" type="button" class="btn btn-primary mt10 r">提交</button>-->
                                        <!--    </div>-->
                                        <!--</div>-->


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