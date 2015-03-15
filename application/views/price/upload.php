<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>乱价模块</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="task/my_task">任务模块</a>
                        </li>
                        <li class="active">
                            <strong>表格上传</strong>
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
                                <li class="active"><a href="price/upload">表格上传</a></li>
                                <li class=""><a href="price/init_screen">初次筛选</a></li>
                                <li class=""><a href="price/control/">价格管控</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="tab-0" class="tab-pane active">
                                <div class="ibox">

                                    <div class="ibox-content">
                                        <div class="col-md-12 clearfix">
                                            <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
                                            <?php $this->load->view('widget/db_picker')?>
                                        </div>
                                        <div class="col-md-12 mt20 clearfix">
                                            <p>请按照以下格式保存 Excel 文件（更新时间列单元格格式设定为文本）。实例 Excel 下载，点击 <a target="_blank" href="<?php echo base_url().UP_DIR; ?>/upload.xlsx">这里</a></p>
                                            <p><img src="<?php echo base_url().IMG_DIR; ?>/upload_example.png"></p>
                                        </div>
                                        <div class="col-md-12 mt20 clearfix">
                                            <div class="uploader-container">
                                                <div id="filePicker">选择文件</div>
                                            </div>
                                            <div id="container">
                                                <!--头部，相册选择和格式选择-->

                                                <div id="uploader">
                                                    <div class="queueList">
                                                        <div id="dndArea" class="placeholder">
                                                            <div id="filePicker"></div>
                                                            <p>或将文件拖到这里</p>
                                                        </div>
                                                    </div>
                                                    <div class="statusBar" style="display:none;">
                                                        <div class="progress">
                                                            <span class="text">0%</span>
                                                            <span class="percentage"></span>
                                                        </div><div class="info"></div>
                                                        <div class="btns">
                                                            <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="preview-excel" class="col-md-12"></div>



                                    </div>
                                </div>
                            </div>

                            <div id="tab-1" class="tab-pane">
                                <div class="ibox">

                                    <div class="ibox-content">
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

