/**
 * Created by zhangbobell on 14-11-6.
 */
$(function() {

    var data;
    var condition = {
        db: $('#db').val(),
        updatetime: null,
        pageSize: 50,
        requestPage: 0,
        pageCount: null,
        orderBy: null,
        isAsc: null
    };

    $('#datetime-picker').datetimepicker({
        pickDate: true,                 //en/disables the date picker
        pickTime: false,                 //en/disables the time picker
        useMinutes: false,               //en/disables the minutes picker
        useSeconds: false,               //en/disables the seconds picker
        useCurrent: false,               //when true, picker will set the value to the current date/time
        minuteStepping:1,               //set the minute stepping
        showToday: true,                 //shows the today indicator
        language:'zh-cn',                  //sets language locale
        defaultDate:"",                 //sets a default date, accepts js dates, strings and moment objects
        disabledDates:[
            moment("11/25/2014")
//            new Date(2014, 11 - 1, 21)
        ],                //an array of dates that can be selected
        icons : {
            time: 'glyphicon glyphicon-time',
            date: 'glyphicon glyphicon-calendar',
            up:   'glyphicon glyphicon-chevron-up',
            down: 'glyphicon glyphicon-chevron-down'
        },
        useStrict: false,               //use "strict" when validating dates
        sideBySide: false,              //show the date and time picker side by side
        daysOfWeekDisabled:[]         //for example use daysOfWeekDisabled: [0,6] to disable weekends
//        disabledDates: [
//            moment("12/25/2013")
////            new Date(2013, 11 - 1, 21),
////            "11/22/2013 00:53"
//        ]
    });

    getLatestCrawlTime();

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
            getItemCount(condition);
            fetchInitScreenList(condition);
        });
    }

    $('#db').on('change', function(){
        condition.db = $(this).val();
        getLatestCrawlTime();
    })

    $('.s-init').live('click', function(){
        if (condition.isAsc === null) {
            condition.isAsc = true;
        } else {
            condition.isAsc = !condition.isAsc;
        }

        condition.orderBy = $(this).attr('data-o');

        fetchInitScreenList(condition);
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
            fillPageLink();
            setAsc();
        });
    }

    function setAsc() {
        var $orderBy = $('a[data-o="'+ (condition.orderBy) +'"]');
        $orderBy.removeClass("s-A s-D");
        if (condition.isAsc == true) {
            $orderBy.addClass('s-A');
        } else if (condition.isAsc == false) {
            $orderBy.addClass('s-D');
        }
    }

    function getItemCount(condition) {
        $.ajax({
            url:"price/get_meta_item_count",
            type:"post",
            async:false,
            dateType:"json",
            data:condition
        }).done(function(d){
            condition.pageCount = d;
        });
    }

    function fillPageLink() {
        $('#pagination').pagination({
            items: condition.pageCount,
            currentPage: (condition.requestPage + 1),
            itemsOnPage: condition.pageSize,
            prevText: '上一页',
            nextText: '下一页',
            hrefTextPrefix: '#',
            cssStyle: 'light-theme',
            selectOnClick: false,
            onPageClick: function(){
                condition.requestPage = this.currentPage;
                fetchInitScreenList(condition);
            }
        });
    }

//    $('#pagination').pagination('onPageClick', function(){
//        console.log(this.currentPage);
//    });

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
                fetchInitScreenList(condition);
                d ? $.bootstrapGrowl('更新数据完毕。', {type: 'success'}) : $.bootstrapGrowl('更新数据出错！', {type: 'danger'});
            }
        });
    });

    // 确认修改 click 事件
    function updateCallback(){
        var record = {
            db: condition.db,
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
            pageSize: condition.pageSize,
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
                    heading: "30天销量",
                    data: "sales",
                    type: "int",
                    sortable: true,
                    dg_visible: false,
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