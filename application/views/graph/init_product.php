<div class="col-md-12 fix"><button type="button" class="btn btn-primary r" onclick="$.jStorage.flush(); window.location.reload(true);">刷新数据</button></div>
<div id="container4-1" class="col-md-12">类目销量正在加载...</div>
<div id="container4-8" class="col-md-12">类目铺货量正在加载...</div>
<!--<div id="container4-2" class="col-md-12">铺货商品数量正在加载...</div>-->
<!--<div id="container4-6" class="col-md-12">商家平均上架商品数正在加载...</div>-->

<div id="container4-3" class="col-md-12">所有渠道商家铺货量正在加载...</div>
<div class="col-md-12 mt20">
    <div class="col-md-12 mt20 mb30 fix" id="filter">
        <div class="col-md-3" id="tag441-wrap">
            <select class="form-control" id="tag441">
                <option value="All">全部</option>
                <?php foreach($tag1 as $v): ?>
                    <option value="<?php echo $v['tag1']; ?>"><?php echo $v['tag1'] === '' ? 'unname' : $v['tag1'];?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3" id="tag442-wrap"></div>
        <div class="col-md-3" id="tag443-wrap"></div>
        <div class="col-md-3 r">
            <button type="button" class="btn btn-primary r" id="redraw-bubble-44">确认</button>
        </div>
    </div>
    <div id="container4-4" class="col-md-12">所有产品铺货量正在加载...</div>
</div>
<div class="col-md-12 mt20">
    <div class="col-md-12 mt20 mb30 fix" id="filter">
        <div class="col-md-3" id="tag451-wrap">
            <select class="form-control" id="tag451">
                <option value="All">全部</option>
                <?php foreach($tag1 as $v): ?>
                    <option value="<?php echo $v['tag1']; ?>"><?php echo $v['tag1'] === '' ? 'unname' : $v['tag1'];?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3" id="tag452-wrap"></div>
        <div class="col-md-3" id="tag453-wrap"></div>
        <div class="col-md-3 r">
            <button type="button" class="btn btn-primary r" id="redraw-bubble-45">确认</button>
        </div>
    </div>
    <div id="container4-5" class="col-md-12">所有产品销量正在加载...</div>
</div>
<div id="container4-7" class="col-md-12" style="height: 900px">商家销售额正在加载...</div>

