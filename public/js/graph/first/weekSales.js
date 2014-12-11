/**
 * Created by zhangbobell on 14-12-10.
 */
define('weekSales', ['utils'], function(utils){

    function get(skfile){
        return utils.xhr({
            url: 'graph/get_week_sales',
            data: {skFile: skfile}
        });
    }

    return {
        get: get
    };

});