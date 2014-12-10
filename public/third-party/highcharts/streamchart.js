jQuery.fn.setTimeSeriesLineChart_stream = function (titleName,subTitle, valueTitle, value) {
    var thisSelector = this.selector;
    $(thisSelector).highcharts({
        chart: {
            type: 'areasplinerange'
        },
        title: {
            text: titleName
        },
//        subtitle: {
//            text: subTitle
//        },
//
//        yAxis: {
//            title: {
//                text: valueTitle
//            }
//        },
        legend: {
            enabled: false
        },

        series: [{
            data:  value
        }]
    });
};

$.fn.lineChart_stream = function (lineChart) {
    var thisSelector = this.selector;
    $(thisSelector).highcharts({
        chart: {
            type: 'areasplinerange'
        },
        title: {
            text: lineChart.title
        },
//        subtitle: {
//            text: lineChart.subtitle
//        },
//        xAxis: {
//
//            text: lineChart.xLabel
//        },
//        yAxis: {
//            title: {
//                text: lineChart.yLabel
//            }
//        },
        legend: {
            enabled: false
        },
        series: lineChart.series
    });
};

$.fn.drawLineChart_stream = function(lineChart, xhrOpt) {
    var thisSelector = this.selector;

    $.xhr_stream({
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
                $(thisSelector).lineChart_stream(lineChart);
            }

        }
    });
}

jQuery.extend({
    ajax_draw_stream : function(ajax_url, saikufile, containerName, titleName, yName) {
        $.xhr_stream({
            url: ajax_url,
            saikufile: saikufile,
            cb: function(d) {
                var data = JSON.parse(d);
                $(containerName).setTimeSeriesLineChart_stream(titleName,'', yName, data);
            }
        });
    },

    xhr_stream: function(o) {
        $.ajax({
            url: o.url,
            type:"post",
            async:true,
            dateType:"json",
            data:{"saikufile": o.saikufile, columns: o.columns, attach: o.attach},
            success: o.cb
        });
    },

    xhr0_stream: function(o) {
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