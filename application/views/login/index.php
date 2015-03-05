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

        <div class="col-md-6">
            <h2 class="font-bold">欢迎来到追灿智能决策系统！</h2>

            <p>
                Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            </p>

            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
            </p>

            <p>
                When an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>

            <p>
                <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
            </p>

        </div>
        <div class="col-md-6">
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
                    <a class="btn btn-sm btn-white btn-block" href="register.html">创建新账户</a>
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
