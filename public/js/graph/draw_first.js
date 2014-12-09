/**
 * Created by Zhao on 14-11-20.
 */
$(function(){

    $.ajax_draw("graph/get_chart_data", "report_daily_cooperation_start_sellernick_num", "#container1", '每日招商数目', '商家数量');
    $.ajax_draw("graph/get_chart_data", "report_daily_cooperation_end_sellernick_num", "#container2", '流失分销商数量', '商家数量');

});