/**
 * Created by zhangbobell on 14-10-30.
 */
$(function() {
    var data;
    var selectedIdx = 0;
    var condition = {
        db: 'db_madebaokang',
        updatetime: null,
        latestTime: null,
        sellernick: null
    };

    getLatestCrawlTime();

    $('.form_date')
    .datetimepicker()
    .on('changeDate', function(e){
        condition.updatetime = e.date.toISOString().slice(0, 10);
        initView();
    });

    function getLatestCrawlTime() {
        $.ajax({
            url:"price/get_latest_crawl_time",
            type:"post",
            async:false,
            dateType:"json",
            data:condition
        }).done(function(d){
            condition.updatetime = d;
            condition.latestTime = d;
            $('.form_date').datetimepicker('setEndDate', d);
            $('.form_date input.form-control').val(d);
            initView();
        });
    }

    setTimeout(function(){
        $('.sidebar').height($('.pct100').height());
    }, 50);

    // 初始化界面
    function initView(){
        getUpsetPriceSeller(condition);

        if (data.length === 0) {
            condition.sellernick = null;
        } else {
            condition.sellernick = data[selectedIdx].sellernick;
        }
        $("#upset-price-seller tbody tr:eq("+ selectedIdx +")").addClass('tr-selected');
        getUpsetPriceProduct(condition);
        getUpsetHistory(condition);
        getUnreviewedCount(condition);
    }

    // 获取所有乱价用户的列表
    function getUpsetPriceSeller (condition){
        if (condition.updatetime === condition.latestTime) {
            getLatestUpsetPriceSeller(condition);
        }
    }

    // 获取最新的乱价用户列表
    function getLatestUpsetPriceSeller(condition) {
        $.ajax({
            url:"price/get_upset_price_seller",
            type:"post",
            async:false,
            dateType:"json",
            data:condition
        }).done(function(d){
            data = JSON.parse(d);
            if (data.length === 0) {
                $.bootstrapGrowl('该日期没有数据。',{type: 'danger'});
            } else {
                fillMainList(data);
            }
        });
    }

    // 获取指定用户的乱价商品
    function getUpsetPriceProduct(condition) {
        $.ajax({
            url:"price/get_upset_price_product",
            type:"post",
            async:false,
            dateType:"json",
            data:condition
        }).done(function(d){
            var productData = JSON.parse(d);

            fillProductList(productData);
        });
    }

    // 单击某行后获取指定用户的乱价商品列表
    $("#upset-price-seller tbody tr").on('click', function(){
        selectedIdx = $(this).attr('data-i');
        condition.sellernick = data[selectedIdx].sellernick;

        $('tr', $(this).parent()).removeClass('tr-selected');
        $(this).addClass('tr-selected');

        getUpsetPriceProduct(condition);
        getUpsetHistory(condition);
    });

    // 获取未确认产品个数
    function getUnreviewedCount(condition) {
        $.ajax({
            url:"price/get_unreviewed_count",
            type:"post",
            async:false,
            dateType:"json",
            data:condition
        }).done(function(d){
            if (d != 0) {
                $('#unreviewed-count').html('<p class="text-warning">当前列表有'+ d + '个产品没有人工确认，请到初次筛选栏进行确认！</p>')
            }
        });
    }

    // 提交按钮的写入事件
    $('#submit').on('click', function(){
        var upsetResult = {
            db: condition.db,
            sellernick:condition.sellernick,
            status: $('input[name="upset-result"]:checked').val(),
            msg: $('#remark').val()
        };

        $.ajax({
            url:"price/set_upset_price_result",
            type:"post",
            async:false,
            dateType:"json",
            data: upsetResult,
            success: function(d){
                console.log(d);
                if (d == 1) {
                    $.bootstrapGrowl('标记成功。', {type: 'success'});
                } else {
                    $.bootstrapGrowl('标记出错。', {type: 'danger'});
                }


                $('#remark').val('');// 清空
                initView(); // 重新初始化界面上所有元素
            }
        });

    });



    /*
    * fillMainList : 填充主列表，显示乱价商家名单及相关乱价商品信息
    * @param : d -- json 数据格式
    * return : null
    * */
    function fillMainList(d) {
        $("#upset-price-seller").html('');

        $("#upset-price-seller").mrjsontable({
            tableClass: "table table-bordered table-hover",
            pageSize: 10,
            columns: [
                {
                    heading: "更新日期",
                    data: "updatetime",
                    type: "datetime"
                },
                {
                    heading: "用户昵称",
                    data: "sellernick",
                    type: "string",
                    sortable: true
                },
                {
                    heading: "乱价商品数量",
                    data: "ljNum",
                    type: "int",
                    sortable: true
                },
                {
                    heading: "总商品数量",
                    data: "totalNum",
                    type: "int",
                    sortable: true
                },
                {
                    heading: "品牌乱价率",
                    data: "ljRate",
                    type: "float",
                    sortable: true
                },
                {
                    heading: "是否已沟通",
                    data: "status",
                    type: "int",
                    sortable: true
                },
                {
                    heading: "最后沟通时间",
                    data: "logTime",
                    type: "datetime",
                    sortable: true
                }
            ],
            data: d
        });
    }

    function updateItemNum(){
        var record = {
            db: condition.db,
            sellernick: $('#dg-sellernick').val(),
            itemid: $($('#dg-url').val()).text(),
            itemnum: $('#dg-itemnum').val(),
            is_reviewed_item: 1
        };

        setCheckedRecord(record);
        $('#dg-show-record').modal('hide');
    }

    function setCheckedRecord(record) {
        $.ajax({
            url:"price/set_checked_record",
            type:"post",
            async:false,
            dateType:"json",
            data:record
        }).done(function(d){
            getUpsetPriceProduct(condition);
        });
    }

    /*
     * fillProductList : 填充指定商家的乱价产品列表
     * @param : d -- json 数据格式
     * return : null
     * */
    function fillProductList(d) {
        $("#upset-price-product").html('');

        $("#upset-price-product").mrjsontable({
            tableClass: "table table-bordered table-hover",
            pageSize: 5,
            editable: false,
            dg_id: "dg-show-record",
            updateCallback: updateItemNum,
            columns: [
                {
                    heading: "用户昵称",
                    data: "sellernick",
                    type: "string",
                    sortable: true
                },
                {
                    heading: "商品地址",
                    data: "url",
                    type: "string",
                    dg_visible: false,
                    dg_editable: true
                },
                {
                    heading: "货号",
                    data: "itemnum",
                    type: "string",
                    sortable: true,
                    dg_visible: true,
                    dg_editable: true
                },
                {
                    heading: "PC 端价格",
                    data: "zk_final_price",
                    type: "float",
                    sortable: true,
                    dg_visible: true,
                    dg_editable: false
                },
                {
                    heading: "PC 端最低价",
                    data: "min_price",
                    type: "float",
                    sortable: true,
                    dg_visible: false,
                    dg_editable: false
                },
                {
                    heading: "移动端价格",
                    data: "zk_final_price_wap",
                    type: "float",
                    sortable: true,
                    dg_visible: true,
                    dg_editable: false
                },
                {
                    heading: "移动端端最低价",
                    data: "min_price_wap",
                    type: "float",
                    sortable: true,
                    dg_visible: false,
                    dg_editable: false
                },
                {
                    heading: "是否已确认",
                    data: "is_reviewed_item",
                    type: "string",
                    sortable: true,
                    dg_visible: false,
                    dg_editable: false
                }
            ],
            data: d
        });
    }

    function getUpsetHistory(condition) {
        $.ajax({
            url:"price/get_upset_history",
            type:"post",
            async:false,
            dateType:"json",
            data:condition
        }).done(function(d){
            var data = JSON.parse(d);

            _displayUpsetHistory(data)
        });
    }

    function _displayUpsetHistory(d) {
        $("#upset-history").html('');

        $("#upset-history").mrjsontable({
            tableClass: "table table-bordered",
            pageSize: 5,
            columns: [
                {
                    heading: "更新日期",
                    data: "updatetime",
                    type: "datetime"
                },
                {
                    heading: "管理员",
                    data: "account",
                    type: "string",
                    sortable: true
                },
                {
                    heading: "状态",
                    data: "status",
                    type: "int",
                    sortable: true
                },
                {
                    heading: "备注",
                    data: "msg",
                    type: "string"
                }
            ],
            data: d
        });
    }
})
