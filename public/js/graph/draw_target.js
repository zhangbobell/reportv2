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
        url: 'graph/get_chart_data_m1', // ajax 请求地址
        saikufile: 'sanqiang_report_daily_order' // ajax 请求的 saiku 文件
    });

    $('#container17').drawLineChart({
        title: '销售额', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '销售额', // y 轴标题
        columns: ['销售额'], // 系列的名称
        target: 3000000
    }, {
        url: 'graph/get_chart_data_m2', // ajax 请求地址
        saikufile: 'sanqiang_report_daily_order' // ajax 请求的 saiku 文件
    });

    $('#container18').drawLineChart({
        title: '招商数量', // 主标题
        subtitle: '副标题 for test', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '招商数量', // y 轴标题
        columns: ['招商数量'], // 系列的名称
        target: 60
    }, {
        url: 'graph/get_chart_data_m2', // ajax 请求地址
        saikufile: 'report_daily_cooperation_start_sellernick_num' // ajax 请求的 saiku 文件
    });

});