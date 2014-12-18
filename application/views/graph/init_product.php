<div class="col-md-12 fix"><button type="button" class="btn btn-primary r" onclick="$.jStorage.flush(); window.location.reload(true);">刷新数据</button></div>
<div id="container4-1" class="col-md-12">销售商品数量正在加载...</div>
<div id="container4-2" class="col-md-12">铺货商品数量正在加载...</div>
<div class="col-md-12 mt20">
    <div class="col-md-12 mt20 mb30" id="filter">
        <div class="col-md-3" id="tag1-wrap">
            <select class="form-control" id="tag1">
                <option value="All">全部</option>
                <?php foreach($tag1 as $v): ?>
                    <option value="<?php echo $v['tag1']; ?>"><?php echo $v['tag1'] === '' ? 'unname' : $v['tag1'];?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3" id="tag2-wrap"></div>
        <div class="col-md-3" id="tag3-wrap"></div>
        <div class="col-md-3 r">
            <button type="button" class="btn btn-primary" id="redraw-bubble">确认</button>
        </div>
    </div>
    <div id="container4-3" class="col-md-12">所有渠道商家铺货量正在加载...</div>
</div>
