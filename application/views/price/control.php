<div class="row">
    <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
    <?php $this->load->view('widget/db-picker')?>

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

