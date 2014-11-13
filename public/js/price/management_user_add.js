/**
 * Created by hui.ZH on 2014/11/12.
 */
$(function() {
    $.ajax({
        url:"price/get_management_user",
        type:"post",
        async:false,
        dateType:"json",
        data:{"db": "etc_privileges","": ""}
    }).done(function(d){
        console.log(d);
        var data = JSON.parse(d);
        fillManagementUserScreen(data);
    });