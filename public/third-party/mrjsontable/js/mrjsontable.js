(function ($) {

    $.fn.mrjsontablecolumn = function (options) {
        var thisSelector = this.selector;
        var opt = $.extend({}, $.fn.mrjsontablecolumn.defaults, options);
        return opt;
    };

    $.fn.mrjsontablecolumn.defaults = {
        heading: "Heading",
        data: "json_field",
        type: "string",
        sortable: true,
        starthidden: false,
        dg_visible: true,
        dg_editable: true
    }

    $.fn.mrjsontable = function (options) {

        var thisSelector = this.selector;

        var opts = $.extend({}, $.fn.mrjsontable.defaults, options);

        var $mrjsontableContainer = $("<div>", { "data-so": "A", "data-ps": opts.pageSize }).addClass("mrjt");

        var $visibleColumnsCBList = $("<div>").addClass("legend");

        var $table = $("<table>").addClass(opts.tableClass);

        var $thead = $("<thead>");
        var $theadRow = $("<tr>");

        $.each(opts.columns, function (index, item) {
            var $th = $("<th>").attr("data-i", index);

            var $cb = $("<input>", { "type": "checkbox", "id": "cb" + thisSelector + index, value: index, checked: !item.starthidden, "data-i": index }).bind("change", opts.onHiddenCBChange).appendTo($visibleColumnsCBList);
            var $cblabel = $('<label />', { 'for': 'cb' + thisSelector + index, text: item.heading }).appendTo($visibleColumnsCBList);

            if (item.starthidden)
            {
                $th.hide();
            }

            if (item.sortable) {
                $("<a>", { "class": "s-init", "href": "#", "data-i": index, "data-t": item.type }).text(item.heading).bind("click", opts.onSortClick).appendTo($th);
            } else {
                $("<span>").text(item.heading).appendTo($th);
            }

            $th.appendTo($theadRow);
        });

        if (opts.editable) {
            var $th = $("<th>").attr("data-i", opts.columns.length);
            $("<span>").text('编辑').appendTo($th);

            $th.appendTo($theadRow);
        }

        $theadRow.appendTo($thead);
        $thead.appendTo($table);

        var pagingNeeded = false;
        $.each(opts.data, function (index, item) {
            var $tr = $("<tr>").attr("data-i", index);

            if (opts.pageSize <= index) {
                $tr.hide();
                pagingNeeded = true;
            }

            $.each(opts.columns, function (c_index, c_item) {

                var $td = $("<td>").html(item[c_item.data]).attr("data-i", c_index);

                if (c_item.starthidden) {
                    $td.hide();
                }

                $td.appendTo($tr)
            });

            // is editable ?
            if (opts.editable) {
                var $edit_btn = $('<button>', {"class": "btn btn-primary btn-edit", "type": "button"}).bind("click", onEditClick).html("<span class=\"glyphicon glyphicon-edit\"></span> 编辑");
                var $td = $("<td>").html($edit_btn).attr("data-i", opts.columns.length);
                $td.appendTo($tr)
            }

            $tr.appendTo($table);
        });

        $mrjsontableContainer.append($visibleColumnsCBList);
        $mrjsontableContainer.append($table);


        if (pagingNeeded) {
            var $pager = $("<ul>").addClass("paging");
            for (var i = 0; i < Math.ceil(opts.data.length / opts.pageSize) ; i++) {
                var $li = $('<li>');
                $("<a>", { "text": (i + 1), "href": "#", "data-i": (i + 1), "class": "p-link" }).bind("click", opts.onPageClick).appendTo($li);
                $li.appendTo($pager)
            }

            $pager.find('li:eq(0) a').addClass('current');
            $mrjsontableContainer.append($pager).addClass("paged");
        }

        function onEditClick(){
            var rowIndex = $(this).parent().parent().attr('data-i');

            var $table = $('<table>').addClass('table table-bordered');
            var $thead = $("<thead>");
            var $theadRow = $("<tr>");

            $.each(opts.columns, function(index, item) {
                var $th = $("<th>").attr("data-i", index);

                if (item.dg_visible == false) {
                    $th.hide();
                }

                $("<span>").text(item.heading).appendTo($th);
                $th.appendTo($theadRow);
            });

            $theadRow.appendTo($thead);
            $thead.appendTo($table);



            var $tr = $('<tr>');

            $.each(opts.columns, function(index, item) {
                var value = opts.data[rowIndex][item.data];
                var $td = $('<td>');
                var $input;

                if (item.dg_editable == false) {
                    $input = $('<input type="text" class="form-control" id="dg-'+ item.data +'" disabled>').val(value);
                } else {
                    $input = $('<input type="text" class="form-control" id="dg-'+ item.data +'" >').val(value);
                }

                $input.appendTo($td);

                if (item.dg_visible == false) {
                    $td.hide();
                }

                $td.appendTo($tr);

            });

            $tr.appendTo($table);

            if ($('#'+ opts.dg_id).length == 0) {
                var $modal = $('<div>', {id: opts.dg_id, tabindex: "-1", role: "dialog", "aria-labelledby": "myLargeModalLabel", "aria-hidden": "true"}).addClass('modal fade bs-example-modal-lg');
                var $modal_dialog = $('<div>').addClass('modal-dialog modal-lg');
                var $modal_content = $('<div>').addClass('modal-content');
                var $modal_header = $('<div>').addClass('modal-header').html('<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" id="myModalLabel">修改记录</h4>');
                var $modal_body = $('<div>').addClass('modal-body').html($table);
                var $modal_footer = $('<div>').addClass('modal-footer');
                var $cancel_btn = $('<button>', {type: "button", "data-dismiss": "modal"}).addClass('btn btn-default').html('<span class="glyphicon glyphicon-remove"></span> 取消');
                var $ok_btn = $('<button>', {type: "button", "data-dismiss": "modal", id: "ok"}).addClass('btn btn-primary').bind('click', opts.updateCallback).html('<span class="glyphicon glyphicon-ok"></span> 保存修改');

                // append button
                $cancel_btn.appendTo($modal_footer);
                $ok_btn.appendTo($modal_footer);

                $modal_header.appendTo($modal_content);
                $modal_body.appendTo($modal_content);
                $modal_footer.appendTo($modal_content);

                $modal_content.appendTo($modal_dialog);
                $modal_dialog.appendTo($modal);

                $modal.appendTo($('body'));
            } else {
                $('.modal-body', $('#'+ opts.dg_id)).html($table);
            }

            $('#'+ opts.dg_id).modal('show');
        }


        return this.append($mrjsontableContainer);
    };

    $.fn.mrjsontable.defaults = {
        cssClass: "table",
        columns: [],
        data: [],
        pageSize: 10,
        editable: false,
        dg_id: "dg-edit-record",

        onHiddenCBChange: function () {
            var $thisGrid = $(this).parents(".mrjt");
            var columIndex = $(this).attr("data-i");

            if ($(this).is(":checked")) {
                $("td[data-i='" + columIndex + "']", $thisGrid).show();
                $("th[data-i='" + columIndex + "']", $thisGrid).show();
            } else {
                $("td[data-i='" + columIndex + "']", $thisGrid).hide();
                $("th[data-i='" + columIndex + "']", $thisGrid).hide();
            }
        },
        onPageClick: function () {

            $(this).parent().parent().find('.p-link').removeClass('current');
            $(this).addClass('current');

            var $thisGrid = $(this).parents(".mrjt");

            var pageSize = $thisGrid.attr("data-ps");
            var page = $(this).attr("data-i");

            $("tbody tr", $thisGrid).each(function (tr_index, tr_item) {
                $(this).hide();

                var pageStart = ((page - 1) * pageSize) + 1;
                var pageEnd = page * pageSize;

                if ((tr_index + 1) >= pageStart && (tr_index + 1) <= pageEnd) {
                    $(this).show();
                }
            });

            return false;
        },
        onSortClick: function () {
            var $thisGrid = $(this).parents(".mrjt");
            var direction = $thisGrid.attr("data-so");

            $('.s-init', $thisGrid).removeClass("s-A s-D");
            $(this).addClass("s-" + direction);

            var type = $(this).attr("data-t");
            var index = $(this).attr("data-i");

            var array = [];

            $("tbody tr", $thisGrid).each(function (tr_index, tr_item) {
                var item = $("td", tr_item).eq(index)

                var tr_id = item.parent().attr("data-i");

                var value = null;
                switch (type) {
                    case "string":
                        value = item.text();
                        break;
                    case "int":
                        value = parseInt(item.text());
                        break;

                    case "float":
                        value = parseFloat(item.text());
                        break;

                    case "datetime":
                        value = new Date(item.text());
                        break;

                    default:
                        value = item.text();
                        break;
                }

                array.push({ tr_id: tr_id, val: value });
            });

            if (direction == "A") {
                array.sort(function (a, b) {
                    if (a.val > b.val) { return 1 }
                    if (a.val < b.val) { return -1 }
                    return 0;
                });
                $thisGrid.attr("data-so", "D");
            } else {

                array.sort(function (a, b) {
                    if (a.val < b.val) { return 1 }
                    if (a.val > b.val) { return -1 }
                    return 0;
                });

                $thisGrid.attr("data-so", "A");
            }

            for (var i = 0; i < array.length; i++) {
                var td = $("tr[data-i='" + array[i].tr_id + "']", $thisGrid)

                td.detach();

                $("tbody", $thisGrid).append(td);
            }

            if ($thisGrid.hasClass("paged")) {
                $('.p-link', $thisGrid).eq(0).click();
            }

            return false;
        }
    };

}(jQuery));