<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>" />
    <meta charset="UTF-8">
    <title><?php echo $title ?> -- 追灿数据决策系统 </title>
    <link href="<?php echo base_url().CSS_DIR; ?>/zxx.lib.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().CSS_DIR; ?>/index.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg">
    <div class="content">
        <div class="logout-info">
            退出成功，正在跳转向登陆页面...
            <br />如果浏览器没有反应，点击<a href="./">这里</a>
        </div>
    </div>
    <script>
        setTimeout('window.location="./"', 1000);
    </script>
</body>
</html>