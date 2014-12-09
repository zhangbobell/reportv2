/**
 * Created by Zhao on 14-11-25.
 */

$(function(){

    function draw2(){
        $('#container2').drawLineChart({
            title: '追灿招募商家数量', // 主标题
            subtitle: '副标题 for test', // 副标题
            xLabel: '日期', // x 轴标题
            yLabel: '商家数量', // y 轴标题
            columns: ['商家数量'], // 系列的名称
            target: ['1', '3']
        }, {
            url: 'graph/get_chart_data_m0', // ajax 请求地址
            saikufile: 'report_monthly_cooperation_num' // ajax 请求的 saiku 文件
        });
    }
    function draw3(){
        $('#container3').drawLineChart({
            title: '铺货商家数量', // 主标题
            subtitle: '副标题 for test', // 副标题
            xLabel: '日期', // x 轴标题
            yLabel: '商家数量', // y 轴标题
            columns: ['商家数量'], // 系列的名称
            target: ['1', '3']
        }, {
            url: 'graph/get_chart_data_m1', // ajax 请求地址
            saikufile: 'report_dayly_puhuo_num' // ajax 请求的 saiku 文件
        });
    }

    draw2();
    draw3();

    $('#btn2').on('click', function(){
        $.xhr0({
            url: 'graph/submit_target',
            data: {target: $('#target2').val(), user: $('#user').val(), period: $('#period2').val(), t_type: $('#t_type2').val()},
            success: function(d){
                d = JSON.parse(d);

                if (d == 1) {
                    draw2();
                } else {
                    alert('input target failed.');
                }
            }
        })
    });

    $('#btn3').on('click', function(){
        $.xhr0({
            url: 'graph/submit_target',
            data: {target: $('#target3').val(), user: $('#user').val(), period: $('#period3').val(), t_type: $('#t_type3').val()},
            success: function(d){
                d = JSON.parse(d);

                if (d == 1) {
                    draw3();
                } else {
                    alert('input target failed.');
                }
            }
        })
    });


});