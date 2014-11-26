/**
 * Created by Zhao on 14-11-20.
 */
$(function(){

//    $.ajax({
//        url:"graph/get_chart_data",
//        type:"post",
//        async:false,
//        dateType:"json",
//        data:{"saikufile": "report_daily_cooperation_start_sellernick_num"}
//    }).done(function(d){
//
//        //console.log(d);
//        var data = JSON.parse(d);
//        var titleName = '每日招商数目';
//        $("#container1").setTimeSeriesLineChart(titleName,'', '商家数量', data);
//    });



    $.ajax_draw("graph/get_chart_data", "report_daily_cooperation_start_sellernick_num", "#container1", '每日招商数目', '商家数量');
    $.ajax_draw("graph/get_chart_data", "report_daily_cooperation_end_sellernick_num", "#container2", '流失分销商数量', '商家数量');

});