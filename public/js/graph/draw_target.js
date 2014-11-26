/**
 * Created by Zhao on 14-11-25.
 */

$(function(){


    $('#container16').drawLineChart({
        title: '年度销售额', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '销售额', // y 轴标题
        columns: ['销售额'] // 系列的名称
    }, {
        url: 'graph/get_chart_data_mm', // ajax 请求地址
        saikufile: 'sanqiang_report_daily_order' // ajax 请求的 saiku 文件
    });

});