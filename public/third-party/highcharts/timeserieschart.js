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

$.fn.lineChart = function (lineChart) {
    var thisSelector = this.selector;
    $(thisSelector).highcharts({
        chart: {
            zoomType: 'x'
        },
        title: {
            text: lineChart.title
        },
        subtitle: {
            text: lineChart.subtitle + '（鼠标选取局部区域可放大查看）'
        },
        xAxis: {
            type: 'datetime',
            minRange: 14 * 24 * 3600000, // fourteen days
            text: lineChart.xLabel
        },
        yAxis: {
            title: {
                text: lineChart.yLabel
            }
        },
        legend: {
            enabled: true
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

        series: lineChart.series
    });
};

$.fn.drawLineChart = function(lineChart, xhrOpt) {
    var thisSelector = this.selector;

    $.xhr({
        url: xhrOpt.url,
        saikufile: xhrOpt.saikufile,
        columns: lineChart.columns,
        attach: '' || lineChart.target,
        cb: function(d) {
            lineChart.series = JSON.parse(d);
            $(thisSelector).lineChart(lineChart);
        }
    });
}

jQuery.extend({
    ajax_draw : function(ajax_url, saikufile, containerName, titleName, yName) {
        $.xhr({
            url: ajax_url,
            saikufile: saikufile,
            cb: function(d) {
                var data = JSON.parse(d);
                $(containerName).setTimeSeriesLineChart(titleName,'', yName, data);
            }
        });
    },

    xhr: function(o) {
        $.ajax({
            url: o.url,
            type:"post",
            async:true,
            dateType:"json",
            data:{"saikufile": o.saikufile, columns: o.columns, attach: o.attach},
            success: o.cb
        });
    }
})