/**
 * Created by Zhao on 14-11-20.
 */
$(function(){

    $.ajax({
        url:"graph/get_chart_data",
        type:"post",
        async:false,
        dateType:"json",
        data:{"saikufile": "report_daily_cooperation_start_sellernick_num"}
    }).done(function(d){

        //console.log(d);
        var data = JSON.parse(d);
        var titleName = 'report_daily_cooperation_start_sellernick_num';
        $("#container").setTimeSeriesLineChart(titleName, '商家数量', data);




    });
});