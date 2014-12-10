$(function(){




    $('#container1').drawLineChart_stream({
        title: '成交额（不包含运费）', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '成交额', // y 轴标题
        columns: ['unname', '儿童', '女', '情侣','男'] // 两个系列的名称
    }, {
        url: 'graph/conv', // ajax 请求地址
        saikufile: 'report_dayly_deal_num' // ajax 请求的 saiku 文件
    });



});