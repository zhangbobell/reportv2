<div class="row">
    <div class="condition col-md-12 fix">
        <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
        <?php $this->load->view('widget/db-picker')?>
        <label class="col-xs-2 col-md-1 control-label lh32">更新日期：</label>
        <?php $this->load->view('widget/datetime_picker')?>
        <button type="button" class="btn btn-primary r" id="refresh-crawl"><span class="glyphicon glyphicon-refresh"></span> 刷新爬取数据</button>
    </div>

    <div class="col-md-12 fix" id="init-sreen-product"></div>
    <div class="col-md-12 fix" id="pagination"></div>
</div>