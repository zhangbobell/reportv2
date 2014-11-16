<script src="<?php echo base_url().TP_DIR; ?>/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"  type="text/javascript" ></script>
<script src="<?php echo base_url().TP_DIR; ?>/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"  type="text/javascript" ></script>
<script src="<?php echo base_url().TP_DIR; ?>/mrjsontable/js/mrjsontable.js"  type="text/javascript" ></script>
<script src="<?php echo base_url().JS_DIR; ?>/price/control.js"  type="text/javascript" ></script>
<script>
    $('.form_date').datetimepicker({
        language:  'zh-CN',
        format : 'yyyy-mm-dd',
        weekStart: 1,
        todayBtn:  1,
        autoclose: true,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>