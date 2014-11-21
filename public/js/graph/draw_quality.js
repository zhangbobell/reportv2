$(function(){



    $.ajax_draw("graph/get_chart_data", "report_monthly_cooperation_up_rate", "#container9", '总体上架率', '渠道上架率（%）');
    $.ajax_draw("graph/get_chart_data", "report_monthly_order_close_rate", "#container12", '订单关闭比率', '订单关闭率（%）');
    $.ajax_draw("graph/get_chart_data", "report_monthly_order_refund_rate", "#container13", '订单退款率', '订单退款率（%）');
    $.ajax_draw("graph/get_chart_data", "report_monthly_cooperation_up_num", "#container14", '平均上架商品数', '平均上架商品数');



});