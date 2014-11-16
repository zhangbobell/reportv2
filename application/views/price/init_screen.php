<div class="row">
    <div class="condition col-md-12 fix">
        <label for="db-input" class="col-xs-2 col-md-1 control-label lh32">数据库：</label>
        <div class="col-xs-2 col-md-2" data-link-field="db-input">
            <select class="form-control" id="db">
                <?php foreach($authDB as $dbname => $projectname): ?>
                    <option value="<?php echo $dbname; ?>"><?php echo $projectname;?></option>
                <?php endforeach; ?>
            </select>
        </div>
<!--        <label for="dtp_input2" class="col-xs-2 col-md-1 control-label lh32">日期：</label>-->
<!--        <div class="input-group date form_date col-xs-4 col-md-3" data-date="" data-date-format="yyyy MM dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">-->
<!--            <input class="form-control" size="16" type="text" value="" readonly>-->
<!--            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
<!--            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>-->
<!--        </div>-->
<!--        <input type="hidden" id="dtp_input2" value="" />-->
        <button type="button" class="btn btn-primary r" id="refresh-crawl"><span class="glyphicon glyphicon-refresh"></span> 刷新爬取数据</button>
    </div>

    <div class="col-md-12 fix" id="init-sreen-product"></div>
</div>