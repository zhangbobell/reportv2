<div class="row">
    <div class="condition col-md-12 fix">
        <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
        <div class="col-xs-2 col-md-1" data-link-field="db-input">
            <select class="form-control" id="db">
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
        <button type="button" class="btn btn-primary r" id="refresh-crawl"><span class="glyphicon glyphicon-refresh"></span> 刷新爬取数据</button>
    </div>

    <div class="col-md-12 fix" id="init-sreen-product"></div>

    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" id="DG-show-record" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">修改记录</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> 取消</button>
                    <button type="button" class="btn btn-primary" id="update-record"><span class="glyphicon glyphicon-ok"></span> 保存修改</button>
                </div>
            </div>
        </div>
    </div>
</div>