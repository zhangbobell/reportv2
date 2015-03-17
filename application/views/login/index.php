<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url(); ?>" />

    <title><?php echo $title ?> -- E-CORP企业智慧化平台</title>

    <link href="<?php echo base_url().CSS_DIR; ?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().PUB_DIR; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url().CSS_DIR; ?>/animate.css" rel="stylesheet">
    <link href="<?php echo base_url().CSS_DIR; ?>/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-7">
            <h2 class="font-bold">欢迎来到E-CORP企业智慧化平台</h2>
            <br>
            <p class="lh24">
                E-CORP企业智慧化平台，是商业数据价值领域的探索者和开创者。 由国内首家数据战略咨询公司发起，熔铸长达8年近上万次企业决策支持经验。平台集成强大的企业业务深度咨询和大数据技术能力，涵盖全案咨询， 决策智能定制，专家系统集成，业务流程管理四大服务，一对一助力企业实现企业智慧化全面升级。
            </p>

        </div>
        <div class="col-md-5">
            <div class="ibox-content">
                <form class="m-t" role="form" action="login/validate" method="post">
                    <div class="form-group">
                        <input type="username" name="username" class="form-control" placeholder="用户名" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="密码" required="">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">登录</button>

                    <a href="#">
                        <small>忘记密码?</small>
                    </a>

                    <p class="text-muted text-center">
                        <small>没有账户？</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="login/register">创建新账户</a>
                </form>
<!--                <p class="m-t">-->
<!--                    <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>-->
<!--                </p>-->
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright e-corp
        </div>
        <div class="col-md-6 text-right">
            <small>&copy; 2010-2015</small>
        </div>
    </div>
</div>

</body>

</html>
