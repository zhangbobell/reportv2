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
                            <strong>初次筛选</strong>
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
                                <li class="active"><a href="price/init_screen">初次筛选</a></li>
                                <li class=""><a href="price/control/">价格管控</a></li>
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

                            <div id="tab-1" class="tab-pane active">
                                <div class="ibox">

                                    <div class="ibox-content">
                                        <div class="condition col-md-12 fix">
                                            <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
                                            <?php $this->load->view('widget/db_picker')?>
                                            <label class="col-xs-2 col-md-1 control-label lh32">更新日期：</label>
                                            <?php $this->load->view('widget/datetime_picker')?>
                                            <button type="button" class="btn btn-primary r" id="refresh-crawl"><span class="glyphicon glyphicon-refresh"></span> 刷新爬取数据</button>
                                        </div>

                                        <div class="col-md-12 fix" id="init-sreen-product"></div>
                                        <div class="col-md-12 fix" id="pagination"></div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-2" class="tab-pane">
                                <div class="ibox">

                                    <div class="ibox-content">
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
