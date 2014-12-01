$(function(){



    $.ajax_draw("graph/get_chart_data", "report_monthly_cooperation_up_rate", "#container9", '总体上架率', '渠道上架率（%）');
    $.ajax_draw("graph/get_chart_data", "report_monthly_order_close_rate", "#container12", '订单关闭比率', '订单关闭率（%）');
    $.ajax_draw("graph/get_chart_data", "report_monthly_order_refund_rate", "#container13", '订单退款率', '订单退款率（%）');
    $.ajax_draw("graph/get_chart_data", "report_monthly_cooperation_up_num", "#container14", '平均上架商品数', '平均上架商品数');

    $('#container11').drawLineChart({
        title: '动销率', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '动销率', // y 轴标题
        columns: ['B2B 平台', '供销平台'] // 两个系列的名称
    }, {
        url: 'graph/get_chart_data_m', // ajax 请求地址
        saikufile: 'report_monthly_cooperation_active_rate' // ajax 请求的 saiku 文件
    });


});