/**
 * Created by zhangbobell on 14-12-10.
 */
require.config({
    baseUrl: 'public/js/graph/first',
    paths:{
        'jquery': '../../../third-party/jquery/jquery.min',
        'bootstrap': '../../../third-party/bootstrap/js/bootstrap.min',
        'jStorage': '../../../third-party/jStorage/jstorage.min',
        'moment': '../../../third-party/momentjs/moment.min',
        'moment_cn': '../../../third-party/momentjs/locales/zh-cn',
        'd3': '../../../third-party/d3/d3.min',

        'utils': '../../price/init_screen/utils',
        'loading': '../../price/control/loading',
        'tree': 'tree',
        'weeklyUpdate': 'weeklyUpdate',
        'dailyUpdate': 'dailyUpdate',
        'monthlyUpdate': 'monthlyUpdate'
    },
    shim : {
        'bootstrap': {
            'deps' :['jquery']
        },
        'jStorage': {
            deps: ['jquery'],
            exports: 'jQuery.fn.jStorage'
        }
    }
});

require(['jquery', 'd3', 'jStorage', 'tree', 'weeklyUpdate', 'loading', 'dailyUpdate', 'monthlyUpdate'], function($, d3, jStorage, tree, weeklyUpdate, loading, dailyUpdate, monthlyUpdate){


    $(function(){

        var sales = $.jStorage.get('salesData');
        var health = $.jStorage.get('healthData');


        if (sales && health) {

            loading.begin('正在绘图...');

            tree.draw('#container1', sales);
            tree.draw('#container2', health);

            loading.end();

        } else {
            loading.begin('正在请求数据...');

            $.when(drawSales(), drawHealth())
                .then(function(){
                    loading.end();
                });

        }


        // 画销售额
        function drawSales() {

            var dtd = $.Deferred();

            function draw() {
                $.when(weeklyUpdate.getSales(), weeklyUpdate.getSellers(), monthlyUpdate.getZero())
                    .then(function(sales, sellers, zero){

                        var sales = weeklyUpdate.convertSales(sales[0]);
                        var sellers = weeklyUpdate.convertSellers(sellers[0]);
                        var zero = monthlyUpdate.convertZero(zero[0]);

                        var data = [{
                            name: '销售额（周）',
                            curTag: '本周',
                            curValue: null,
                            prevTag: '上周',
                            prevValue: null,
                            parent: 'null',
                            isNormal: true
                        },{
                            name: '0 销量商家',
                            curTag: '本周',
                            curValue: null,
                            prevTag: '上周',
                            prevValue: null,
                            parent: '销售额（周）',
                            isNormal: true
                        }];

                        $.each(sales['res'], function(idx, ele){
                            ele.isNormal = true;
                            data.push(ele);
                        });

                        $.each(sellers['res'], function(idx, ele){
                            ele.isNormal = true;
                            data.push(ele);
                        });

                        $.each(zero['res'], function(idx, ele){
                            ele.isNormal = true;
                            data.push(ele);
                        });

                        $.jStorage.set('salesData', data, {TTL: 300000});

                        tree.draw('#container1', data);

                        return dtd.resolve();
                    });
            }

            draw();

            return dtd.promise();
        }

        function drawHealth() {
            var dtd = $.Deferred();

            function draw() {
                $.when(dailyUpdate.getClose(), dailyUpdate.getLost(), dailyUpdate.getUpset0()).then(function(close, lost, upset0){
                    var close = dailyUpdate.convertData(close[0]);
                    var lost = dailyUpdate.convertData(lost[0]);
//                    var upset = dailyUpdate.convertData(upset[0]);
                    var upset0 = dailyUpdate.convertData(upset0[0]);

                    var data = [{
                        name: '渠道健康度',
                        curTag: '',
                        curValue: null,
                        prevTag: '',
                        prevValue: null,
                        parent: 'null',
                        isNormal: true
                    }];

                    // isNormal 是绝对值越大越好

                    $.each(close['res'], function(idx, ele){
                        ele.isNormal = false;
                        data.push(ele);
                    });

                    $.each(lost['res'], function(idx, ele){
                        ele.isNormal = false;
                        data.push(ele);
                    });

//                    $.each(upset['res'], function(idx, ele){
//                        ele.isNormal = false;
//                        data.push(ele);
//                    });

                    $.each(upset0['res'], function(idx, ele){
                        ele.isNormal = false;
                        data.push(ele);
                    });



                    $.jStorage.set('healthData', data, {TTL: 300000});
                    tree.draw('#container2', data);

                    return dtd.resolve();
                });
            }

            draw();

            return dtd.promise();
        }


    });

});