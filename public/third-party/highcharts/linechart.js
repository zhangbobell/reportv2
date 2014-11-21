jQuery.fn.setBasicLineChart = function (titleName, subtitleName, xValue, yText, suffix, value) {
    $('#container').highcharts({
        title: {
            text: titleName,
            x: -20 //center
        },
        subtitle: {
            text: subtitleName,
            x: -20
        },
        xAxis: {
            categories: xValue
        },
        yAxis: {
            title: {
                text: yText
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: suffix
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: value
    });
};