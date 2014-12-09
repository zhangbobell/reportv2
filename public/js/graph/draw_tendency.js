$(function(){


    $('#container1').drawLineChart({
        title: '平均上架商品数（追灿招募）', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '上架商品数', // y 轴标题
        columns: ['上架商品数'] // 系列的名称
    }, {
        url: 'graph/get_chart_data_m', // ajax 请求地址
        saikufile: 'report_up_item' // ajax 请求的 saiku 文件
    });

    $('#container2').drawLineChart({
        title: '30天动销率', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '动销率', // y 轴标题
        columns: ['追灿招募','非追灿招募'] // 系列的名称
    }, {
        url: 'graph/get_chart_data_m', // ajax 请求地址
        saikufile: 'report_monthly_dongxiao_rate_zc' // ajax 请求的 saiku 文件
    });

    $('#container4').drawLineChart({
        title: '订单退款率', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '退款率', // y 轴标题
        columns: ['追灿招募','非追灿招募'] // 系列的名称
    }, {
        url: 'graph/get_chart_data_m', // ajax 请求地址
        saikufile: 'report_dayly_tuikuan_rate' // ajax 请求的 saiku 文件
    });

    $('#container5').drawLineChart({
        title: '订单关闭率', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '关闭率', // y 轴标题
        columns: ['追灿招募','非追灿招募'] // 系列的名称
    }, {
        url: 'graph/get_chart_data_m', // ajax 请求地址
        saikufile: 'report_dayly_order_close_rate' // ajax 请求的 saiku 文件
    });



});