$(function(){




    $('#container4-1').drawLineChart_stream({
        title: '销售商品数量', // 主标题
        subtitle: '', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '商品数量', // y 轴标题
        columns: ['unname-unname','unname上衣','儿童套装','女式上衣','女式内裤','女式内衣套装','女式秋裤','女式背心','女式马甲',
            '女式t恤','女式休闲裤','女式打底裤','女式短衫','女式长衫','女式上衣','女式中裤','女式家居服套装','女式睡裙','女式短裤',
            '女式长裤','女式袜子','情侣内衣','情侣家居服','男士unname','男士上衣','男士内裤','男士内衣套装','男士秋裤','男士背心',
            '男士马甲','男士T恤','男士上衣','男士中裤','男士家居服套装','男士短裤','男士长裤','男士袜子']
    }, {
        url: 'graph/sk_stream_leaf', // ajax 请求地址
        saikufile: 'report_month_order_category_num' // ajax 请求的 saiku 文件
    });

    $('#container4-2').drawLineChart_stream({
        title: '铺货商品数量', // 主标题
        subtitle: '', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '铺货商品数量', // y 轴标题
        columns: ['儿童内衣裤', '儿童家居服', '儿童泳装','其他','女士内衣/男士内衣/家居服','女装/女士精品','床上用品','游泳','男装','童装/亲子装','裙子(新)','裤子']
    }, {
        url: 'graph/sk_stream', // ajax 请求地址
        saikufile: 'report_dayly_leimu_puhuo' // ajax 请求的 saiku 文件
    });

    $('#container4-3').drawbubbleChart({
        title: '铺货商品数量', // 主标题
        subtitle: '', // 副标题
        xLabel: '日期', // x 轴标题
        yLabel: '铺货商品数量'
    }, {
        url: 'graph/sk_stream_bubble', // ajax 请求地址
        saikufile: 'report_daily_sellernick_up_item_num' // ajax 请求的 saiku 文件
    });






});