/**
 * Created by zhangbobell on 14-12-10.
 */
require.config({
    baseUrl: 'public/js/graph/first',
    paths:{
        'jquery': '../../../third-party/jquery/jquery.min',
        'bootstrap': '../../../third-party/bootstrap/js/bootstrap.min',
        'jStorage': '../../../third-party/jStorage/jstorage.min',
        'd3': '../../../third-party/d3/d3.min',

        'utils': '../init_screen/utils',
        'loading': '../control/loading'
    },
    shim : {
        'bootstrap': {
            'deps' :['jquery']
        },
        'jStorage': {
            deps: ['jquery'],
            exports: 'jQuery.fn.jStorage'
        }
    }
});

require(['jquery', 'd3', 'jStorage', 'tree'], function($, d3, jStorage, tree){

    var data = [
        {
            "name": "销售额",
            "curValue": 20000,
            "prevValue": 12000,
            "parent": "null"
        },
        {
            "name": "0 销售额商家",
            "curValue": 0,
            "prevValue": 0,
            "parent": "销售额"
        },
        {
            "name": "0-n 销售额商家",
            "curValue": 2000,
            "prevValue": 1200,
            "parent": "销售额"
        },
        {
            "name": "金卡商家",
            "curValue": 4000,
            "prevValue": 4800,
            "parent": "销售额"
        },
        {
            "name": "银卡商家",
            "curValue": 6000,
            "prevValue": 1000,
            "parent": "销售额"
        },
        {
            "name": "钻石商家",
            "curValue": 8000,
            "prevValue": 5000,
            "parent": "销售额"
        }
    ];


    tree.draw('#container1', data);
});