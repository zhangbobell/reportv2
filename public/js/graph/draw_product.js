$(function(){




    $('#container1').drawLineChart_stream({
        title: '成交额（不包含运费）', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '成交额', // y 轴标题
        columns: ['unname', '儿童', '女', '情侣','男']
    }, {
        url: 'graph/get_chart_data_stream', // ajax 请求地址
        saikufile: 'report_dayly_deal_num' // ajax 请求的 saiku 文件
    });

    $('#container2').drawLineChart_stream({
        title: '铺货商品数量', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '铺货商品数量', // y 轴标题
        columns: ['儿童内衣裤', '儿童家居服', '儿童泳装','其他','女士内衣/男士内衣/家居服','女装/女士精品','床上用品','游泳','男装','童装/亲子装','裙子(新)','裤子']
    }, {
        url: 'graph/get_chart_data_stream', // ajax 请求地址
        saikufile: 'report_dayly_leimu_puhuo' // ajax 请求的 saiku 文件
    });




});