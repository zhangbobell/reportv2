$(function(){




    $.ajax_draw("graph/get_chart_data", "report_monthly_cooperation_status_sellernick_num", "#container6", '分销商数量', '商家数量');
    $.ajax_draw("graph/get_chart_data", "report_monthly_cooperation_up_sellernick_num", "#container7", '上架分销商数量', '商家数量');



});