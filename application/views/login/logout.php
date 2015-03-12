
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title ?></title>

    <link href="<?php echo base_url().CSS_DIR; ?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().PUB_DIR; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url().CSS_DIR; ?>/animate.css" rel="stylesheet">
    <link href="<?php echo base_url().CSS_DIR; ?>/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center animated fadeInDown">
    <h3 class="font-bold">退出成功！</h3>
    <div class="error-desc">
       您已成功退出，正在跳转向登陆页面...<br>如果浏览器没有反应，点击<a href="./">这里</a>
    </div>
</div>
<script>
    setTimeout('window.location="./"', 1000);
</script>

<!-- Mainly scripts -->
<script src="<?php echo base_url().JS_DIR;?>/jquery-2.1.1.js"></script>
<script src="<?php echo base_url().JS_DIR;?>/bootstrap.min.js"></script>

</body>

</html>
