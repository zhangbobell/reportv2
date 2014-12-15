jQuery.fn.setTimeSeriesLineChart_week = function (titleName,subTitle, valueTitle, value) {
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

$.fn.lineChart_week = function (lineChart) {
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

$.fn.drawLineChart_week = function(lineChart, xhrOpt) {
    var thisSelector = this.selector;

    $.xhr_week({
        url: xhrOpt.url,
        saikufile: xhrOpt.saikufile,
        columns: lineChart.columns,
        attach: '' || lineChart.target,
        cb: function(d) {
            if(d == 0)
            {
                $(thisSelector).text('saiku文件不存在');
            }
            else
            {
                lineChart.series = JSON.parse(d);
                $(thisSelector).lineChart_week(lineChart);
            }

        }
    });
}

jQuery.extend({
    ajax_draw_week : function(ajax_url, saikufile, containerName, titleName, yName) {
        $.xhr_week({
            url: ajax_url,
            saikufile: saikufile,
            cb: function(d) {
                if(d['flag'] == 0)
                {
                    $(thisSelector).text(d['err']);
                }
                else
                {
                    lineChart.series = JSON.parse(d['res']);
                    $(thisSelector).lineChart(lineChart);
                }

            }
        });
    },

    xhr_week: function(o) {
        $.ajax({
            url: o.url,
            type:"post",
            async:true,
            dateType:"json",
            data:{"saikufile": o.saikufile, columns: o.columns, attach: o.attach},
            success: o.cb
        });
    },

    xhr0_week: function(o) {
        $.ajax({
            url: o.url,
            type:"post",
            async: true,
            dateType:"json",
            data: o.data,
            success: o.success
        });
    }
})