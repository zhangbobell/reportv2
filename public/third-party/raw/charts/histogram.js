(function(){
    //
    var model = raw.models.points();

    model.dimensions().remove('color');
    model.dimensions().remove('label');
    model.dimensions().remove('size');

    var x = model.dimensions().get('x');
        //.title('X Axis')
        //.types(Number, String, Date)

    var y = model.dimensions().get('y');
        //.title('Y Axis')
        //.types(Number)

    /*model.map(function (data){
        return data.map(function (d){
            return {
                x: +x(d),
                y: +y(d)
            }
        })
    })*/

    var chart = raw.chart()
        .title("Histogram")
        .description("Histogram trial")
        .category("Others")
        .model(model)

    var width = chart.number()
        .title('Width')
        .defaultValue(900)

    var height = chart.number()
        .title('Height')
        .defaultValue(600)

    var margin = chart.number()
        .title('margin')
        .defaultValue(10)

    chart.draw(function (selection, data){
        selection
            .attr("width", width())
            .attr("height", height())

        //var xScale = d3.scale.ordinal().domain(data).rangeBand([margin(), width()-margin()]);
        var xScale = d3.scale.linear().domain([0, d3.max(data, function (d){return d.x;})]).range([margin(), width()-margin()]);
        var yScale = d3.scale.linear().domain([0, d3.max(data, function (d){return d.y;})]).range([height()-margin(), margin()]);

        var circle = selection.selectAll("Circle")
            .data(data)
            .enter().append("circle")
            .attr("cx", function(d) {return xScale(d.x);})
            .attr("cy", function(d) {return yScale(d.y);})
            .attr("r", 1)

        circle.append("rect")
            .attr("height", function(d){return xScale(d.x);})
            .attr("width", 2)
            .style("fill", "#666")


    })
})();