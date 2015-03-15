<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>乱价模块</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">乱价模块</a>
                        </li>
                        <li class="active">
                            <strong>价格管控</strong>
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
                                <li class=""><a href="price/upload">表格上传</a></li>
                                <li class=""><a href="price/init_screen">初次筛选</a></li>
                                <li class="active"><a href="price/control/">价格管控</a></li>
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

                                    <div class="ibox-content">
                                    </div>
                                </div>
                            </div>

                            <div id="tab-2" class="tab-pane active">
                                <div class="ibox">

                                    <div class="ibox-content">
                                        <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
                                        <?php $this->load->view('widget/db_picker')?>

                                        <div class="col-md-12 mt50 mb10" id="unreviewed-count"></div>
                                        <div class="col-md-12 fix" id="upset-price-seller"></div>
                                        <div class="col-md-8 fix" id="upset-price-product"></div>

                                        <div class="col-md-4 mt10">
                                            <div class="form-group">
                                                <label for="upset-result" class="col-md-4 control-label">选择结果：</label>
                                                <div class="radio-inline" data-link-field="upset-handle">
                                                    <label>
                                                        <input type="radio" name="upset-result" id="optionsRadios1" value="1" checked>已沟通
                                                    </label>
                                                </div>
                                                <div class="radio-inline"  data-link-field="upset-handle">
                                                    <label>
                                                        <input type="radio" name="upset-result" id="optionsRadios2" value="0">误判
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group fix">
                                                <label for="upset-remark" class="col-md-3 control-label">备注：</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" id="remark" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group fix">
                                                <div class="col-xs-2 col-md-offset-8 col-md-4">
                                                    <button id="submit" class="btn btn-primary r">提交</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 fix" id="upset-history"></div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-3" class="tab-pane">
                                <div class="ibox">

                                    <div class="ibox-content">
                                    </div>
                                </div>
                            </div>

                            <div id="tab-4" class="tab-pane">
                                <div class="ibox">

                                    <div class="ibox-content">
                                    </div>
                                </div>
                            </div>

                            <div id="tab-5" class="tab-pane">
                                <div class="ibox">

                                    <div class="ibox-content">
                                    </div>
                                </div>
                            </div>

                            <div id="tab-6" class="tab-pane">
                                <div class="ibox">

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
<!--loading 代码-->
<div class="spinner-mask" id="loading">
    <div class="spinner">
        <div class="spinner-container container1">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
        <div class="spinner-container container2">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
        <div class="spinner-container container3">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
    </div>
    <span>正在加载...</span>
</div>

