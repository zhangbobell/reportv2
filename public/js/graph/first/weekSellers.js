/**
 * Created by zhangbobell on 14-12-10.
 */
define('weekSellers', ['utils'], function(utils){

    function get(skFile){
        return utils.xhr({
            url: 'graph/get_weekSellers',
            data: {skFile: skFile}
        });
    }

    return {
        get: get
    };
});