/**
 * Created by zhangbobell on 14-11-6.
 */
$(function() {

    var data;
    var condition = {
        db: $('#db').val(),
        updatetime: null
    };

    getLatestCrawlTime();

    setTimeout(function(){
        $('.sidebar').height($('.pct100').height());
    }, 50);

    function getLatestCrawlTime() {
        $.ajax({
            url:"price/get_latest_crawl_time",
            type:"post",
            async:false,
            dateType:"json",
            data:condition
        }).done(function(d){
            condition.updatetime = d;
//            console.log(condition);
//            $('.form_date').datetimepicker('setEndDate', d);
//            $('.form_date input.form-control').val(d);
            fetchInitScreenList(condition);
        });
    }

    $('#db').on('change', function(){
        condition.db = $(this).val();
        getLatestCrawlTime();
    })

    function fetchInitScreenList(condition) {
        $.ajax({
            url:"price/get_init_screen_product",
            type:"post",
            async:false,
            dateType:"json",
            data:condition
        }).done(function(d){
            data = JSON.parse(d);

            $("#init-sreen-product").html("");
            fillInitScreen(data);
        });
    }

    function setCheckedRecord(record) {
        $.ajax({
            url:"price/set_checked_record",
            type:"post",
            async:false,
            dateType:"json",
            data:record
        }).done(function(d){
            fetchInitScreenList(condition);

            d ? $.bootstrapGrowl('修改成功！', {type: 'success'}) : $.bootstrapGrowl('修改出错！', {type: 'danger'});
        });
    }

    $('#refresh-crawl').click(function(){
        $.bootstrapGrowl('正在更新数据...', {type: 'info'});

        $.ajax({
            url:"price/refresh_meta_item",
            type:"post",
            async:false,
            dateType:"json",
            data:condition,
            success: function(d){
                d ? $.bootstrapGrowl('更新数据完毕。', {type: 'success'}) : $.bootstrapGrowl('更新数据出错！', {type: 'danger'});
            }
        });
    });

    // 确认修改 click 事件
    function updateCallback(){
        var record = {
            db: 'db_madebaokang',
            sellernick: $('#dg-sellernick').val(),
            itemid: $($('#dg-url').val()).text(),
            itemnum: $('#dg-itemnum').val(),
            is_reviewed_item: 1
        };
        setCheckedRecord(record);
        $('#DG-show-record').modal('hide');
    };

    /*
    * fillInitScreen : 填充初次筛选名单
    * param : d -- json 数据
    */
    function fillInitScreen(d) {
        $("#init-sreen-product").mrjsontable({
            tableClass: "table table-bordered table-hover",
            pageSize: 50,
            editable: true,
            dg_id: "DG-show-record",
            updateCallback: updateCallback,
            columns: [
                {
                    heading: "更新日期",
                    data: "updatetime",
                    type: "datetime",
                    dg_visible: false,
                    dg_editable: false
                },
                {
                    heading: "卖家昵称",
                    data: "sellernick",
                    type: "string",
                    sortable: true,
                    dg_visible: true,
                    dg_editable: true
                },
                {
                    heading: "商品地址",
                    data: "url",
                    type: "string",
                    dg_visible: false,
                    dg_editable: false
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
                    data: "price",
                    type: "float",
                    sortable: true,
                    dg_visible: true,
                    dg_editable: true
                },
                {
                    heading: "移动端价格",
                    data: "price_wap",
                    type: "float",
                    sortable: true,
                    dg_visible: true,
                    dg_editable: true
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
})