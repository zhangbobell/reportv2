<!doctype html>
<html lang="en" ng-app="raw">
<head>
    <title>RAW</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="RAW,visualization,data,design,spreadsheet,interface,vector graphics,SVG,PNG,JSON">
    <meta name="Description" content="RAW, missing link between spreadsheets and vector graphics, by DensityDesign, Giorgio Caviglia, Matteo Azzi, Michele Mauri, Giorgio Uboldi">

    <script>
        document.write('<base href="' + document.location + '" />');
    </script>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic|Lato:400,700,900|Open+Sans:400,300,600,700,800|Roboto+Slab:400,300,100,700|Roboto:400,100,300,500,700,900&subset=latin,latin-ext"/>

    <link rel="stylesheet" href="<?php echo base_url().TP_DIR; ?>/raw/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().TP_DIR; ?>/raw/bower_components/angular-bootstrap-colorpicker/css/colorpicker.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().TP_DIR; ?>/raw/bower_components/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url().TP_DIR; ?>/raw/css/raw.css"/>
    <link rel="icon" href="<?php echo base_url().TP_DIR; ?>/raw/favicon.ico?v=2" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url().TP_DIR; ?>/raw/favicon.ico" type="image/x-icon">

</head>

<body data-spy="scroll" data-target="#raw-nav">

<nav class="navbar" role="navigation" id="raw-nav">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#raw-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/#">RAW</a>
        </div>

        <div class="collapse navbar-collapse navbar-right" id="raw-navbar">
            <ul class="nav navbar-nav">
            </ul>
        </div>


    </div>
</nav>

<div ng-view class="wrap"></div>

<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

            </div>
        </div>
    </div>
</div>


<!-- jquery -->
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/jqueryui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- bootstrap -->
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<!-- d3 -->
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/d3/d3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/d3-plugins/sankey/sankey.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/d3-plugins/hexbin/hexbin.js"></script>
<!-- codemirror -->
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/codemirror/lib/codemirror.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/codemirror/addon/display/placeholder.js"></script>
<!-- canvastoblob -->
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/canvas-toBlob.js/canvas-toBlob.js"></script>
<!-- filesaver -->
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/FileSaver/FileSaver.js"></script>
<!-- zeroclipboard -->
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/zeroclipboard/ZeroClipboard.min.js"></script>

<!-- raw -->
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/lib/raw.js"></script>

<!-- charts -->
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/treemap.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/streamgraph.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/scatterPlot.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/packing.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/clusterDendrogram.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/voronoi.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/delaunay.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/alluvial.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/clusterForce.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/convexHull.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/hexagonalBinning.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/reingoldTilford.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/parallelCoordinates.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/circularDendrogram.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/smallMultiplesArea.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/bumpChart.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/charts/linechart.js"></script>

<!-- angular -->
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/angular-route/angular-route.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/angular-animate/angular-animate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/angular-sanitize/angular-sanitize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/angular-strap/dist/angular-strap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/angular-ui/build/angular-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().TP_DIR; ?>/raw/bower_components/angular-bootstrap-colorpicker/js/bootstrap-colorpicker-module.js"></script>

<script src="<?php echo base_url().TP_DIR; ?>/raw/js/app.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/js/services.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/js/controllers.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/js/filters.js"></script>
<script src="<?php echo base_url().TP_DIR; ?>/raw/js/directives.js"></script>

<!-- google analytics -->
<script src="<?php echo base_url().TP_DIR; ?>/raw/js/analytics.js"></script>

<!-- load data from DB -->
<script src="loaddb"></script>


</body>
</html>
