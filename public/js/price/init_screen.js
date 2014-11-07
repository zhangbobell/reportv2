/**
 * Created by zhangbobell on 14-11-6.
 */
$(function() {

    $.ajax({
        url:"price/get_init_screen_product",
        type:"post",
        async:false,
        dateType:"json",
        data:{"db": "db_madebaokang", "updatetime": "2014-10-27"}
    }).done(function(d){
        console.log(d);
        var data = JSON.parse(d);
        fillInitScreen(data);
    });

    function fillInitScreen(d) {
        $("#init_sreen_product").mrjsontable({
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
                }
            ],
            data: d
        });
    }
})