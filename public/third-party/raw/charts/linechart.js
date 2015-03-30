(function(){
    //
    var model = raw.model();

    var x = model.dimension('x')
        .title('X Axis')
        .types(Number,Date)
        .accessor(function (d){ return this.type() == "Date" ? new Date(d) : +d; })
        .required(1);

    var y = model.dimension('y')
        .title('Y Axis')
        .types(Number,Date)
        .accessor(function (d){ return this.type() == "Date" ? new Date(d) : +d; })
        .required(1);

    model.map(function (data){
        return data.map(function (d){
            var obj = {xdim:{}, ydim:{}, x:x(d), y:y(d) };
            x().forEach(function (l){
                obj.xdim[l] = d[l];
            });
            y().forEach(function (l){
                obj.ydim[l] = d[l];
            })
            return obj;
        })
    })

    var chart = raw.chart()
        .title("Line Chart")
        .description("Line Chart trial")
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

    var minval = chart.checkbox()
        .title('Set origin at (0,0)')
        .defaultValue(true)

    chart.draw(function (selection, data){
        var g = selection
            .attr("width", +width())
            .attr("height", +height())
            .append("g")
var ydimensions = d3.keys(data[0].ydim),
    xdimensions = d3.keys(data[0].xdim);
        /*var xhelp = d3.scale.ordinal().rangePoints([0, width], 0),
            yname = {};

        xhelp.domain().filter(function (d) {
            return d != "name" && (yname[d] = d3.scale.linear()
                .domain(d3.extent(data, function(p) { return +p.ydim[d]; }))
                .range([height, 0]));
        }));
*/
        var marginLeft = (d3.max(data, function (d) { return y.type() == "Date" ? 8 :(Math.log(d.y) / 2.302585092994046) + 1; }) * 9);

        //var xScale = d3.scale.ordinal().domain(data).rangeBand([margin(), width()-margin()]);
        var xScale = x.type() == "Date"
            ? d3.time.scale().range([margin()+10+marginLeft, width()-margin()-10]).domain(d3.extent(data, function (d){ return d.x; }))
            : d3.scale.linear().domain([minval()?0:d3.min(data,function(d){return d.x;}), d3.max(data, function (d){return d.x;})]).range([margin()+10+marginLeft, width()-margin()-10]);
        var yScale = y.type() == "Date"
            ? d3.time.scale().range([height()-margin()-10, margin()+10]).domain(d3.extent(data, function (d){ return d.y; }))
            : d3.scale.linear().domain([minval()?0:d3.min(data,function(d){return d.y;}), d3.max(data, function (d){return d.y;})]).range([height()-margin()-10, margin()+10]);

       /* var tips = svg.append('g').attr('class', 'tips');

        tips.append('rect')
            .attr('class', 'tips-border')
            .attr('width', 200)
            .attr('height', 50)
            .attr('rx', 10)
            .attr('ry', 10);

        var wording1 = tips.append('text')
            .attr('class', 'tips-text')
            .attr('x', 10)
            .attr('y', 20)
            .text('');

        var wording2 = tips.append('text')
            .attr('class', 'tips-text')
            .attr('x', 10)
            .attr('y', 40)
            .text('');*/

        g.selectAll("Circle")
            .data(data)
            .enter().append("circle")
            .attr("cx", function(d) {return xScale(d.x);})
            .attr("cy", function(d) {return yScale(d.y);})
            .attr("r", 4.5)
            .style('z-index', 2)
            .style('fill', '#134981')
            .on('mouseover', function(){
                d3.select(this).transition().duration(500).attr('r', 5.5).style('z-index', 3).style('fill', '#EE1111');
                var m = d3.mouse(this);
                 //   cx = m[0] - margin.left;
                /*var x0 = x.invert(cx);
                var i = (d3.bisector(function(d){
                    return d.x;
                }).left)(data,x0,1);
                var d0 = data[i-1],
                    d1 = data[i]||{},
                    d = x0 - d0.x > d1.x - x0 ? d1:d0;*/
                //wording1.test('X:' + d.x);
                //wording2.text('Y:' + d.y);
                //var x1 = x(d.x),
                //    y1 = y(d.y);
                d3.select('.tips')
                    .attr('transform', 'translate(50,50)');
                d3.select('.tips').style('display', 'block');
            })
            .on('mouseout', function(){
                d3.select(this).transition().duration(500).attr('r', 4.5).style('z-index', 2).style('fill', '#134981');
                d3.select('.tips').style('display', 'none');
            })

        var xAxis = d3.svg.axis()
            .scale(xScale)
            .orient('bottom')
            .ticks(10)
            .outerTickSize(2);
        var yAxis = d3.svg.axis()
            .scale(yScale)
            .orient('left')
            .ticks(10)
            .outerTickSize(2);

        var cArr = xdimensions[0].match(/[^\x00-\xff]/ig);
        var xmargin = xdimensions[0].length + (cArr == null ? 0 : cArr.length);
        g.append("g")
            .attr('class', 'x axis')
            .attr('transform', 'translate(0,' + (height()  - margin()-10) + ')')
            .call(xAxis)
            .append("svg:text")
            .attr('transform', 'translate(' + (width()  - margin()- xmargin*8 + 10)+  ', -10)')
            .style("font-family","Consolas")
            .text(function(){return xdimensions;});

        g.append("g")
            .attr('class', 'y axis')
            .attr('transform', 'translate(' + (margin()+10+marginLeft ) + ',0)')
            .call(yAxis)
            .append("svg:text")
            .attr('transform', 'translate(0,' + (margin()+10 ) + ')')
            .style("font-family","Consolas")
            .text(function(){return ydimensions;});

        var line = d3.svg.line()
            .x(function (d) {return xScale(d.x);})
            .y(function (d) {return yScale(d.y);})
            .interpolate('linear');

        var path =  g.append('path')
            .data(data.sort(function(x1,x2){return x1.x-x2.x;}))
            .attr('class', 'line')
            .attr('d', line(data))
            .style('fill', 'none')
            .style('z-index', 1)
            .style('stroke', '#4682B4');

        var container = d3.select('body')
            .append('svg')
            .attr('width', width + margin.left + margin.right)
            .attr('height', height + margin.top + margin.bottom);

        var svg = container.append('g')
            .attr('class', 'content')
            .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')');

    })
})();