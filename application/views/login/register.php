<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title ?></title>

    <link href="<?php echo base_url().CSS_DIR; ?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().PUB_DIR; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url().CSS_DIR; ?>/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url().CSS_DIR; ?>/animate.css" rel="stylesheet">
    <link href="<?php echo base_url().CSS_DIR; ?>/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">E+</h1>
        </div>
        <h3>欢迎加入追灿咨询</h3>
        <form class="m-t" role="form" action="reg_success" method="post">
            <div class="form-group">
                <input type="text" name = "username" class="form-control" placeholder="用户名" required="">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="邮箱" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="密码" required="">
            </div>
            <div class="form-group" >
                <div class="checkbox i-checks"><label> <input name="checkbox" id="checkbox" type="checkbox"><i></i> 同意用户协议 </label></div>
            </div>
            <button type="submit" name="sub_button" id="sub_button" class="btn btn-primary block full-width m-b" disabled>注册</button>

            <p class="text-muted text-center"><small>已经拥有账号?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="login/index">登陆</a>
        </form>
        <p class="m-t"> <small>Copyright e-corp
                © 2010-2015</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo base_url().JS_DIR;?>/jquery-2.1.1.js"></script>
<script src="<?php echo base_url().JS_DIR;?>/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url().JS_DIR;?>/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.i-checks').on('ifChanged', function(){
            $('#checkbox').is(':checked') ? $('#sub_button').removeAttr('disabled') :　$('#sub_button').attr('disabled', '');
        });
    });
</script>

<!--<script src="//www.w3cschool.cc/try/angularjs/1.2.5/angular.min.js"></script>-->
</body>

</html>
