<div class="row">
        <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
        <div class="col-xs-2 col-md-1" data-link-field="db-input">
            <select class="form-control" id="slected-db">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <label for="dtp_input2" class="col-xs-2 col-md-1 control-label lh32">日期：</label>
        <div class="input-group date form_date col-xs-4 col-md-3" data-date="" data-date-format="yyyy MM dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <input type="hidden" id="dtp_input2" value="" />
        <button type="button" class="btn btn-primary">查找</button>
        <div class="col-md-12 fix" id="upset-price-seller"></div>
        <div class="col-md-8 fix" id="upset-price-product"></div>
        <div class="col-md-4 mt10">
            <div class="form-group">
                <label for="upset-result" class="col-md-3 control-label">选择结果：</label>
                <div class="radio-inline" data-link-field="upset-handle">
                    <label>
                        <input type="radio" name="upset-result" id="optionsRadios1" value="1" checked>乱价
                    </label>
                </div>
                <div class="radio-inline"  data-link-field="upset-handle">
                    <label>
                        <input type="radio" name="upset-result" id="optionsRadios2" value="0">误判
                    </label>
                </div>
             </div>
            <div class="form-group fix">
                <label for="upset-remark" class="col-md-2 control-label">备注：</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="remark" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group fix">
                <div class="col-xs-2 col-md-offset-10 col-md-2">
                    <button id="submit" class="btn btn-default">提交</button>
                </div>
            </div>
        </div>
        <div class="col-md-8 fix" id="upset-price-history"></div>
</div>


<div>
    <form action="<?php echo site_url('price/upload')?>" method="post" >

        <input type="submit" value="上传" />
    </form>
</div>


