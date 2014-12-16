/**
 * Created by zhangbobell on 14-12-16.
 */
define('monthlyUpdate', ['utils'], function(utils){

    function getZero() {
        return utils.xhr({
            url: 'graph/get_zero_sales_num',
            data: {saikufile: 'report_0_chengjiao'}
        });
    }

    function convertZero(d) {
        var data = JSON.parse(d);

        $.each(data['res'], function(idx, ele){
            ele.parent = '0 销量商家';
        });

        return data;
    }

    return {
        getZero: getZero,
        convertZero: convertZero
    };

});