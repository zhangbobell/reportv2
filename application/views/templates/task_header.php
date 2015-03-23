<!--task开始部分-->
<?php
if(!array_key_exists('logged_in', $this->session->all_userdata()))
{
    header("content-type: text/html; charset=utf8");
    echo "该页面需要登录";
    echo "<br />正在跳转到登录页面...";

    $returnPage = base_url();
    echo "<br />如果浏览器没有反应，请点击<a href=\"". $returnPage ."\">这里</a>.";
    echo "<script type='text/javascript'>";
    echo "window.setTimeout(\"window.location='". $returnPage ."'\",1000); ";
    echo "</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>

    <base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title ?> -- E-CORP企业智慧化平台</title>

    <link href="<?php echo base_url().TP_DIR; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().PUB_DIR;?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url().CSS_DIR;?>/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url().JS_DIR;?>/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url().CSS_DIR;?>/animate.css" rel="stylesheet">
    <link href="<?php echo base_url().CSS_DIR;?>/style.css" rel="stylesheet">

    <link href="<?php echo base_url() . CSS_DIR; ?>/graph/first.css" rel="stylesheet" type="text/css" />
