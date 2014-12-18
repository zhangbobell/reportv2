/**
 * Created by zhangbobell on 14-12-18.
 */
$(function(){
    $('#tag1').on('change', function(){
        $.xhr0({
            url: 'graph/get_tag2',
            data: {tag1: $(this).val()},
            success: function(d) {
                var data = JSON.parse(d);
                if (data != 'null') {
                    var $select = $('<select>').addClass('form-control').attr('id', 'tag2');

                    var $opt = $('<option>').val('All').text('全部');
                    $select.append($opt);

                    $.each(data, function(idx, ele) {
                        var $opt = $('<option>').val(ele['tag2']).text(ele['tag2'] == '' ? 'unname': ele['tag2']);
                        $select.append($opt);
                    })

                    $('#tag2-wrap').html($select);
                } else {
                    $('#tag2-wrap').html('');
                    $('#tag3-wrap').html('');
                }
            }
        });
    })

    $('#tag2').live('change', function(){
        $.xhr0({
            url: 'graph/get_tag3',
            data: {tag1: $('#tag1').val(), tag2: $(this).val()},
            success: function(d) {
                var data = JSON.parse(d);
                if (data != 'null') {
                    var $select = $('<select>').addClass('form-control').attr('id', 'tag3');

                    var $opt = $('<option>').val('All').text('全部');
                    $select.append($opt);

                    $.each(data, function(idx, ele) {
                        var $opt = $('<option>').val(ele['tag3']).text(ele['tag3'] == '' ? 'unname': ele['tag3']);
                        $select.append($opt);
                    })

                    $('#tag3-wrap').html($select);
                } else {
                    $('#tag3-wrap').html('');
                }
            }
        });
    })

    $('#redraw-bubble').on('click', function(){

        $('#loading span').text('正在重新绘图...');
        $('#loading').css('display', 'block');

        $.jStorage.flush();
        $.xhr0({
            url: 'graph/redraw_bubble',
            data: {saikufile: 'report_daily_sellernick_up_item_num', tag1: $('#tag1').val(), tag2: $('#tag2').val(), tag3: $('#tag3').val()},
            success: function(d){
                var d = JSON.parse(d);
                var bubbleChart = {
                    title: '铺货商品数量', // 主标题
                    subtitle: '', // 副标题
                    xLabel: '日期', // x 轴标题
                    yLabel: '铺货商品数量'
                };

                bubbleChart.series = d['res'];
                $('#container4-3').bubbleChart(bubbleChart);
                $('#loading').css('display', 'none');
            }
        });
    });

});