jQuery.fn.setBubbleChart = function (titleName,subTitle, valueTitle, value) {
    var thisSelector = this.selector;
    $(thisSelector).highcharts({
        chart: {
            type: 'bubble',
            zoomType: 'xy'
        },
        title: {
            text: titleName
        },
        subtitle: {
            text: subTitle + '（鼠标选取局部，可放大查看）'
        },

        yAxis: {
            title: {
                text: valueTitle
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name +
                    '</b><br /><b>增长系数: ' + this.point.x +
                    '</b><br /><b>最新数据: ' + this.point.y + '</b>';

            }
        },


        series: [{

            name: valueTitle,


            data:  value
        }]
    });
};

$.fn.bubbleChart = function (bubbleChart) {
    var thisSelector = this.selector;
    $(thisSelector).highcharts({
        chart: {
            type: 'bubble',
            zoomType: 'xy'
        },
        title: {
            text: bubbleChart.title
        },
        subtitle: {
            text: bubbleChart.subtitle + '（鼠标选取局部区域可放大查看）'
        },
        xAxis: {
            title: {
                text: bubbleChart.xLabel
            }
        },
        yAxis: {
            title: {
                text: bubbleChart.yLabel
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name +
                    '</b><br /><b>增长系数: ' + this.point.x +
                    '</b><br /><b>最新数据: ' + this.point.y + '</b>';

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

        series: bubbleChart.series
    });
};

$.fn.drawbubbleChart = function(bubbleChart, xhrOpt) {
    var thisSelector = this.selector;

    if ((d = $.jStorage.get(thisSelector))) {
        bubbleChart.series = d['res'];
        $(thisSelector).bubbleChart(bubbleChart);
    } else {
        $.xhr({
            url: xhrOpt.url,
            saikufile: xhrOpt.saikufile,
            columns: bubbleChart.columns,
            attach: '' || bubbleChart.target,
            cb: function(d) {
                d = JSON.parse(d);
                if(d['flag'] == 0)
                {
                    $(thisSelector).text(d['err']);
                }
                else
                {
                    $.jStorage.set(thisSelector, d, {TTL: 24*3600*1000});
                    bubbleChart.series = d['res'];
                    $(thisSelector).bubbleChart(bubbleChart);
                }

            }
        });
    }
}

jQuery.extend({
    ajax_draw : function(ajax_url, saikufile, containerName, titleName, yName) {
        $.xhr({
            url: ajax_url,
            saikufile: saikufile,
            cb: function(d) {
                var data = JSON.parse(d);
                $(containerName).setBubbleChart(titleName,'', yName, data);
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
    },

    xhr0: function(o) {
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