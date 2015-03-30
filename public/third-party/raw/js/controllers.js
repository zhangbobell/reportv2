'use strict';

/* Controllers */

angular.module('raw.controllers', [])

  .controller('RawCtrl', function ($scope, dataService) {
/*
    var xmlhttpdb;
    var dblist;
    if(window.XMLHttpRequest)
    {
      xmlhttpdb = new XMLHttpRequest();
    }
    else
    {//IE6, IE5
      xmlhttpdb = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpdb.open("GET", "loaddb/loaddbname.php", true);
    xmlhttpdb.onreadystatechange = function()
    {
      if(xmlhttpdb.readyState==4 || xmlhttpdb.readyState=="complete")
      {
        dblist = xmlhttpdb.responseText;
      }
    }
    xmlhttpdb.send();
*/
    var db = "db_jiuyang";
    var xmlhttptable;
    var res;
    if(window.XMLHttpRequest)
    {
      xmlhttptable = new XMLHttpRequest();
    }
    else
    {//IE6, IE5
      xmlhttptable = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttptable.open("GET", "loaddb/loadtablename.php?q="+db, true);
    xmlhttptable.onreadystatechange = function()
    {
      if(xmlhttptable.readyState==4 || xmlhttptable.readyState=="complete")
      {
        res = xmlhttptable.responseText;
        $scope.samples = []
        var samps = res.split("\n");
        var samp;
        for(var i=0; i<samps.length;i++)
        {
          samp = {title : samps[i]};
          $scope.samples.push(samp);
        }
      }
    }
    xmlhttptable.send();

    $scope.$watch('sample', function (sample){
      if (!sample) return;
            var xmlhttp;
            if(window.XMLHttpRequest)
            {
                xmlhttp = new XMLHttpRequest();
            }
            else
            {//IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.open("GET", "loaddb/loaddb.php?q="+sample.title+"$"+db, true);
            xmlhttp.onreadystatechange = function()
            {
              if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete")
              {
                $scope.text=xmlhttp.responseText;
              }
            }
            xmlhttp.send();
        
    });

    // init
    $scope.raw = raw;
    $scope.data = [];
    $scope.metadata = [];
    $scope.error = false;
    $scope.loading = true;

    $scope.categories = ['Correlations', 'Distributions', 'Time Series', 'Hierarchies', 'Others'];

    $scope.parse = function(text){

      if ($scope.model) $scope.model.clear();

      $scope.data = [];
      $scope.metadata = [];
      $scope.error = false;
      $scope.$apply();

      try {
        var parser = raw.parser();
        $scope.data = parser(text);
        $scope.metadata = parser.metadata(text);
        $scope.error = false;
      } catch(e){
        $scope.data = [];
        $scope.metadata = [];
        $scope.error = e.name == "ParseError" ? +e.message : false;
      }
      if (!$scope.data.length && $scope.model) $scope.model.clear();
      $scope.loading = false;
    }

    $scope.delayParse = dataService.debounce($scope.parse, 500, false);

    $scope.$watch("text", function (text){
      $scope.loading = true;
      $scope.delayParse(text);
    });

    $scope.charts = raw.charts.values().sort(function (a,b){ return a.title() < b.title() ? -1 : a.title() > b.title() ? 1 : 0; });
    $scope.chart = $scope.charts[0];
    $scope.model = $scope.chart ? $scope.chart.model() : null;

    $scope.$watch('error', function (error){
      if (!$('.CodeMirror')[0]) return;
      var cm = $('.CodeMirror')[0].CodeMirror;
      if (!error) {
        cm.removeLineClass($scope.lastError,'wrap','line-error');
        return;
      }
      cm.addLineClass(error, 'wrap', 'line-error');
      cm.scrollIntoView(error);
      $scope.lastError = error;

    })

    $('body').mousedown(function (e,ui){
      if ($(e.target).hasClass("dimension-info-toggle")) return;
      $('.dimensions-wrapper').each(function (e){
        angular.element(this).scope().open = false;
        angular.element(this).scope().$apply();
      })
    })

    $scope.codeMirrorOptions = {
      lineNumbers : true,
      lineWrapping : true,
      //placeholder : 'Paste your text or drop a file here. No data on hand? Try one of our sample datasets!'
    }

    $scope.selectChart = function(chart){
      if (chart == $scope.chart) return;
      $scope.model.clear();
      $scope.chart = chart;
      $scope.model = $scope.chart.model();
    }

    function refreshScroll(){
      $('[data-spy="scroll"]').each(function () {
        $(this).scrollspy('refresh');
      });
    }

    $(window).scroll(function(){

      // check for mobile
      if ($(window).width() < 760 || $('#mapping').height() < 300) return;

      var scrollTop = $(window).scrollTop() + 0,
          mappingTop = $('#mapping').offset().top + 10,
          mappingHeight = $('#mapping').height(),
          isBetween = scrollTop > mappingTop + 50 && scrollTop <= mappingTop + mappingHeight - $(".sticky").height() - 20,
          isOver = scrollTop > mappingTop + mappingHeight - $(".sticky").height() - 20,
          mappingWidth = mappingWidth ? mappingWidth : $('.col-lg-9').width();
     
      if (mappingHeight-$('.dimensions-list').height() > 90) return;
      //console.log(mappingHeight-$('.dimensions-list').height())
      if (isBetween) {
        $(".sticky")
          .css("position","fixed")
          .css("width", mappingWidth+"px")
          .css("top","20px")
      } 

     if(isOver) {
        $(".sticky")
          .css("position","fixed")
          .css("width", mappingWidth+"px")
          .css("top", (mappingHeight - $(".sticky").height() + 0 - scrollTop+mappingTop) + "px");
          return;
      }

      if (isBetween) return;

      $(".sticky")
        .css("position","relative")
        .css("top","")
        .css("width", "");

    })

    $(document).ready(refreshScroll);


  })