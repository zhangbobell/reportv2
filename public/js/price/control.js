/**
 * Created by zhangbobell on 14-10-30.
 */
$(function() {


    $.ajax({
        url:"price/get_upset_price_seller",
        type:"post",
        async:false,
        dateType:"json",
        data:{"db": "db_madebaokang", "updatetime": "2014-10-27"}
    }).done(function(d){
        var data = JSON.parse(d);
        var sellernick;
        fillMainList(data);

        // 单击后获取指定用户的乱价商品列表
        $("#upset-price-seller table tr:gt(0)").click(function(){
            sellernick = data[$(this).attr('data-i')].sellernick;

            $('tr', $(this).parent()).removeClass('tr-selected');
            $(this).addClass('tr-selected');

            $.ajax({
                url:"price/get_upset_price_product",
                type:"post",
                async:false,
                dateType:"json",
                data:{"db": "db_madebaokang", "updatetime": "2014-10-27", "sellernick": sellernick}
            }).done(function(d){
                var productData = JSON.parse(d);

                $("#upset-price-product").html('');
                fillProductList(productData);
            });
        });

        // 提交按钮的写入事件
        $('#submit').click(function(){
            var status = $('input[name="upset-result"]:checked').val();
            var msg = $('#remark').val();

            $.ajax({
                url:"price/set_upset_price_result",
                type:"post",
                async:false,
                dateType:"json",
                data:{"db": "db_madebaokang", "sellernick": sellernick, "status": status, "msg": msg},
                success: function(d){
                    console.log(d);
                }
            });

        });
    });



    /*
    * fillMainList : 填充主列表，显示乱价商家名单及相关乱价商品信息
    * @param : d -- json 数据格式
    * return : null
    * */
    function fillMainList(d) {
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
                    heading: "店铺等级",
                    data: "ratesum",
                    type: "int",
                    sortable: true
                },
                {
                    heading: "乱价商品数",
                    data: "ljnum",
                    type: "int",
                    sortable: true
                },
                {
                    heading: "乱价商品销售额",
                    data: "ljTotalSoldPrice",
                    type: "float",
                    sortable: true
                },
                {
                    heading: "乱价率",
                    data: "ljRate",
                    type: "float",
                    sortable: true
                }
            ],
            data: d
        });
    }

    /*
     * fillProductList : 填充指定商家的乱价产品列表
     * @param : d -- json 数据格式
     * return : null
     * */
    function fillProductList(d) {
        $("#upset-price-product").mrjsontable({
            tableClass: "table table-bordered table-hover",
            pageSize: 5,
            columns: [
                {
                    heading: "更新日期",
                    data: "updatetime",
                    type: "datetime"
                },
                {
                    heading: "商品地址",
                    data: "url",
                    type: "string"
                },
                {
                    heading: "销量",
                    data: "total_sold_quantity",
                    type: "int",
                    sortable: true
                },
                {
                    heading: "货号",
                    data: "itemnum",
                    type: "string",
                    sortable: true
                },
                {
                    heading: "移动端价格",
                    data: "zk_final_price_wap",
                    type: "float",
                    sortable: true
                },
                {
                    heading: "PC 端价格",
                    data: "zk_final_price",
                    type: "float",
                    sortable: true
                },
                {
                    heading: "最低售价",
                    data: "price_min",
                    type: "float",
                    sortable: true
                }
            ],
            data: d
        });
    }
});
