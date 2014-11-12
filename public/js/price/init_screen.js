/**
 * Created by zhangbobell on 14-11-6.
 */
$(function() {

    var data;
    var condition = {
        db: 'db_madebaokang',
        updatetime:'2014-10-27'
    };
    fetch_init_screen_list(condition);

    function fetch_init_screen_list(condition) {
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

            // 编辑按钮的 click 事件
            $('#init-sreen-product button').click(function(){
                var id = $(this).parent().parent().attr('data-i');
                $('#DG-show-record .modal-body').html(getRecordById(data, id));
                $('#DG-show-record').modal('show');
            });

            // 确认修改的 click 事件
            $('#update-record').click(function(){
                var record = {
                    db: 'db_madebaokang',
                    sellernick: $('#sellernick').val(),
                    itemid: $('#itemid').val(),
                    itemnum: $('#itemnum').val(),
                    is_reviewed_item: 1
                };
                set_checked_record(record);
                $('#DG-show-record').modal('hide');
            });
        });
    }

    function set_checked_record(record) {
        $.ajax({
            url:"price/set_checked_record",
            type:"post",
            async:false,
            dateType:"json",
            data:record
        }).done(function(d){
            fetch_init_screen_list(condition);
        });
    }


    function getRecordById(data, id) {
        var $ret = '<table class="table table-bordered">';
        $ret += '<tr><th>卖家昵称</th><th>商品id</th><th>货号</th><th>PC 端价格</th><th>移动端价格</th></tr><tr>';
        $ret += '<td><input type="text" class="form-control" id="sellernick" value="' + data[id].sellernick + '"></td>';
        $ret += '<td><input type="text" class="form-control" id="itemid" value="' + data[id].itemid + '" disabled></td>';
        $ret += '<td><input type="text" class="form-control" id="itemnum" value="' + data[id].itemnum + '"></td>';
        $ret += '<td><input type="text" class="form-control" id="zk_final_price" value="' + data[id].zk_final_price + '" disabled></td>';
        $ret += '<td><input type="text" class="form-control" id="zk_final_price_wap" value="' + data[id].zk_final_price_wap + '" disabled></td>';
        $ret += '</tr></table>';

        return $ret;
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

    /*
    * fillInitScreen : 填充初次筛选名单
    * param : d -- json 数据
    */
    function fillInitScreen(d) {
        $("#init-sreen-product").mrjsontable({
            tableClass: "table table-bordered table-hover",
            pageSize: 10,
            columns: [
                {
                    heading: "更新日期",
                    data: "updatetime",
                    type: "datetime"
                },
                {
                    heading: "卖家昵称",
                    data: "sellernick",
                    type: "string",
                    sortable: true
                },
                {
                    heading: "商品地址",
                    data: "url",
                    type: "string"
                },
                {
                    heading: "货号",
                    data: "itemnum",
                    type: "string",
                    sortable: true
                },
                {
                    heading: "PC 端价格",
                    data: "zk_final_price",
                    type: "float",
                    sortable: true
                },
                {
                    heading: "移动端价格",
                    data: "zk_final_price_wap",
                    type: "float",
                    sortable: true
                },
                {
                    heading: "是否已确认",
                    data: "is_reviewed_item",
                    type: "string"
                }
            ],
            data: d
        });
    }
})