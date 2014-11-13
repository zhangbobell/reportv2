/**
 * Created by hui.ZH on 2014/11/12.
 */
$(function() {
    $.ajax({
        url:"price/get_management_user",
        type:"post",
        async:false,
        dateType:"json",
        data:{"db": "etc_privileges"}
    }).done(function(d){
        console.log(d);
        var data = JSON.parse(d);
        fillManagementUserScreen(data);
    });

    function fillManagementUserScreen(d) {
        $("#init_management_user").mrjsontable({
            tableClass: "table table-bordered table-hover",
            pageSize: 10,
            columns: [
                {
                    heading: "用户编号",
                    data: "userid",
                    type: "int",
                    sortable: true
                },
                {
                    heading: "用户名",
                    data: "username",
                    type: "varchar",
                    sortable: true
                },
                {
                    heading: "组别",
                    data: "group",
                    type: "varchar",
                    sortable: true
                },
                {
                    heading: "授权项目",
                    data: "projectname",
                    type: "varchar",
                    sortable: true
                },
                {
                    heading: "是否已禁用",
                    data: "is_valid",
                    type: "enum"
                    //sortable: true
                }
            ],
            data: d
        });
    }
})