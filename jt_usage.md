# mrjsontable 用法

## Extends mrjsontable usage :
使用的代码如下，新增的字段有注释，大体部分是新增，主要是需要增加一个点击确认之后的回调函数，详见一下代码，仅供参考。
```javascript
$("#init-sreen-product").mrjsontable({
    tableClass: "table table-bordered table-hover",
    pageSize: 10,
    editable: true, // 是否可编辑，即是否会出现编辑按钮
    dg_id: "DG-show-record", // 弹出的对话框的 id
    updateCallback: updateCallback2, // 弹出对话框 “确认修改” 按钮的点击事件函数名，具体函数见下文
    columns: [
        {
            heading: "更新日期",
            data: "updatetime",
            type: "datetime",
            dg_visible: false, // 在弹出对话框中这一列是否显示出来
            dg_editable: false // 显示出来之后是否可编辑
        },
        {
            heading: "卖家昵称",
            data: "sellernick",
            type: "string",
            sortable: true,
            dg_visible: true, // 在弹出对话框中这一列是否显示出来
            dg_editable: true // 显示出来之后是否可编辑
        }
    ],
    data: d
});

// 确认修改 click 事件
function updateCallback2(){
    var record = {
        db: 'db_madebaokang',
        sellernick: $('#dg-sellernick').val(), // 获取弹出框里面的输入框的值，id 是 "dg-" + 字段名
        itemid: $('#dg-url').val(),
        itemnum: $('#dg-itemnum').val(),
        is_reviewed_item: 1
    };

    $.ajax({
        ... // 把获取到的值通过 ajax 传到后台更新。
    })
    $('#DG-show-record').modal('hide'); // 点击之后隐藏
};
```
