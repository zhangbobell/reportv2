<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url(); ?>" />

    <title><?php echo $title ?> -- 追灿数据决策系统</title>

    <link href="<?php echo base_url().CSS_DIR; ?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().PUB_DIR; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url().CSS_DIR; ?>/animate.css" rel="stylesheet">
    <link href="<?php echo base_url().CSS_DIR; ?>/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-7">
            <h2 class="font-bold">欢迎来到追灿企业智慧化平台</h2>
            <br>
            <p>
                我们可以帮助企业提升：机会洞察与预测、精准决策、执行控管、
            </p>

            <p>
                流程自动优化.四大核心能力，推动企业智慧化升级。同时，我们
            </p>

            <p>
                也是目前最智能的平台，首创定制知识导入+系统执行监测，实现
            </p>

            <p>
                人机交互，并持续优化帮助企业永续经营。
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
