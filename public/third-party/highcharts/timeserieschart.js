jQuery.fn.setTimeSeriesLineChart = function (titleName,subTitle, valueTitle, value) {
	var thisSelector = this.selector;
    $(thisSelector).highcharts({
        chart: {
            zoomType: 'x'
        },
        title: {
            text: titleName
        },
        subtitle: {
            text: subTitle + '（鼠标选取局部，可放大查看）'
        },
        xAxis: {
            type: 'datetime',
            minRange: 14 * 24 * 3600000 // fourteen days
        },
        yAxis: {
            title: {
                text: valueTitle
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: valueTitle,
            pointInterval: 24 * 3600 * 1000,

            data:  value
        }]
    });
};

jQuery.extend({
    ajax_draw : function(ajax_url, saikufile, containerName, titleName, yName) {
                    $.ajax({
                        url: ajax_url,
                        type:"post",
                        async:false,
                        dateType:"json",
                        data:{"saikufile": saikufile}
                    }).done(function(d){

                        //console.log(d);
                        var data = JSON.parse(d);

                        $(containerName).setTimeSeriesLineChart(titleName,'', yName, data);
                    });
                }
})