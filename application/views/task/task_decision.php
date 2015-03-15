


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox float-e-margins animated fadeInRight">
                    <div class="ibox-content">
                        <strong>平台简介：</strong><br>
                        Saiku/OLAP/ETL/可视分析+模型， 拥有将数据转化为方法的能力。包含TOP10 行业数据挖掘分析方法，100多种分析模型
                    </div>

                    <div class="ibox-content text-center">
                        <a class="btn btn-success btn-facebook" href="task/mailpage/decision">
                            <i class="fa fa-envelope-o"> </i> 联系开通
                        </a>
                    </div>
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
            <li class="active"><a data-toggle="tab" href="#tab-1">第一时间</a></li>
            <li class=""><a data-toggle="tab" href="#tab-2">趋势</a></li>
            <li class=""><a data-toggle="tab" href="#tab-3">目标管理</a></li>
            <li class=""><a data-toggle="tab" href="#tab-4">产品渠道分布</a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <div class="tab-content">
        <div id="tab-2" class="tab-pane">
            <div class="col-lg-12">
                <div class="ibox-title">
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
<!--                <div class="col-md-12 fix"><button type="button" class="btn btn-primary r" onclick="$.jStorage.flush(); window.location.reload(true);">刷新数据</button></div>-->
                <div id="container2-1" class="col-md-12">总销售额正在加载...</div>
                <div id="container2-2" class="col-md-12">追灿招募最近7天成交额（分销商评级）正在加载...</div>
                <div id="container2-3" class="col-md-12">追灿招募商家数量正在加载...</div>
                <div id="container2-4" class="col-md-12">追灿招募商家数量（分销商评级）正在加载...</div>
                <div id="container2-5" class="col-md-12">平均上架商品数（追灿招募）正在加载...</div>
                <div id="container2-6" class="col-md-12">追灿招募上架率正在加载...</div>
                <div id="container2-7" class="col-md-12">30天动销率正在加载...</div>
                <div id="container2-8" class="col-md-12">全网销售额正在加载...</div>
                <div id="container2-9" class="col-md-12">渠道乱价率正在加载...</div>
                <div id="container2-10" class="col-md-12">退款率正在加载...</div>
                <div id="container2-11" class="col-md-12">订单关闭率正在加载...</div>

            </div>
        </div>
        <div id="tab-1" class="tab-pane active">
            <div class="col-lg-12">
                <div class="ibox-title">
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

<!--                <p class="alert alert-danger" id="info"></p>-->
<!--                <div class="col-md-12 fix"><button type="button" class="btn btn-primary r" onclick="$.jStorage.flush(); window.location.reload(true);">刷新数据</button></div>-->
                <div id="container1"></div>
                <div id="container2"></div>

            </div>
        </div>

        <div id="tab-4" class="tab-pane">
            <div class="col-lg-12">
                <div class="ibox-title">
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
<!--                    <div class="col-md-12 fix"><button type="button" class="btn btn-primary r" onclick="$.jStorage.flush(); window.location.reload(true);">刷新数据</button></div>-->
                    <div id="container4-1" class="col-md-12">类目销量正在加载...</div>
                    <div id="container4-8" class="col-md-12">类目铺货量正在加载...</div>

                    <div id="container4-3" class="col-md-12">所有渠道商家铺货量正在加载...</div>
                    <div class="col-md-12 mt20">
                        <div class="col-md-12 mt20 mb30 fix" id="filter">
                            <div class="col-md-3" id="tag441-wrap">
                                <select class="form-control" id="tag441">
                                    <option value="All">全部</option>
                                    <?php foreach($tag1 as $v): ?>
                                        <option value="<?php echo $v['tag1']; ?>"><?php echo $v['tag1'] === '' ? 'unname' : $v['tag1'];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3" id="tag442-wrap"></div>
                            <div class="col-md-3" id="tag443-wrap"></div>
                            <div class="col-md-3 r">
                                <button type="button" class="btn btn-primary r" id="redraw-bubble-44">确认</button>
                            </div>
                        </div>
                        <div id="container4-4" class="col-md-12">所有产品铺货量正在加载...</div>
                    </div>
                    <div class="col-md-12 mt20">
                        <div class="col-md-12 mt20 mb30 fix" id="filter">
                            <div class="col-md-3" id="tag451-wrap">
                                <select class="form-control" id="tag451">
                                    <option value="All">全部</option>
                                    <?php foreach($tag1 as $v): ?>
                                        <option value="<?php echo $v['tag1']; ?>"><?php echo $v['tag1'] === '' ? 'unname' : $v['tag1'];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3" id="tag452-wrap"></div>
                            <div class="col-md-3" id="tag453-wrap"></div>
                            <div class="col-md-3 r">
                                <button type="button" class="btn btn-primary r" id="redraw-bubble-45">确认</button>
                            </div>
                        </div>
                        <div id="container4-5" class="col-md-12">所有产品销量正在加载...</div>
                    </div>
                    <div id="container4-7" class="col-md-12" style="height: 900px">合作商家销售额正在加载...</div>
                    <div id="container4-9" class="col-md-12" style="height: 900px">非合作商家销售额正在加载...</div>
                </div>

            </div>



        </div>

        <div id="tab-3" class="tab-pane">
            <div class="col-lg-12">
                <div class="ibox-title">
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

<!--                    <div class="col-md-12 fix"><button type="button" class="btn btn-primary r" onclick="$.jStorage.flush(); window.location.reload(true);">刷新数据</button></div>-->

                    <input type="hidden" id="user" value="admin"/>

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

                    <div id="container3-1" class="col-md-10">乱价率目标加载中...</div>
                    <div  class="col-md-2">
                        <div class="form-group">
                            <label for="target">乱价率目标</label>
                            <input type="text" class="form-control" name="target" id="target1" placeholder="请输入目标">
                            <input type="hidden" id="period1" value="1"/>
                            <input type="hidden" id="t_type1" value="1"/>
                            <button id="btn1" type="button" class="btn btn-primary mt10 r">提交</button>
                        </div>
                    </div>

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




                </div>



            </div>
        </div>




    </div>
</div>
</div>
</div>


