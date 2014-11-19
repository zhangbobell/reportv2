<div class="row">
    <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
    <div class="col-xs-2 col-md-2" data-link-field="db-input">
        <select class="form-control" id="db">
            <?php foreach($authDB as $dbname => $projectname): ?>
                <option value="<?php echo $dbname; ?>"><?php echo $projectname;?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-md-12 mt50">
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
<!--    <div class="col-md-12">-->
<!--        <button type="button" class="btn btn-primary r" id="refresh-price"><span class="glyphicon glyphicon-import"></span> 导入价格</button>-->
<!--    </div>-->
    <div id="preview-excel" class="col-md-12 mt20 fix">
        <p>请按照以下格式保存 Excel 文件（更新时间列单元格格式设定为文本）。实例 Excel 下载，点击 <a target="_blank" href="<?php echo base_url().UP_DIR; ?>/upload.xlsx">这里</a></p>
        <p><img src="<?php echo base_url().IMG_DIR; ?>/upload_example.png"></p>
    </div>
</div>