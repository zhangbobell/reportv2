<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?> -- 追灿数据决策系统 </title>
<link href="<?php echo base_url().CSS_DIR; ?>/zxx.lib.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().CSS_DIR; ?>/index.css" rel="stylesheet" type="text/css" />
</head>
    <body class="bg">
        <div class="content">
            <form class="login-form" method="post" action="">
                <label class="form-title">用户登录</label>
                <p>
                    <input type="text" name="username" id="username" class="form-control" placeholder="用户名" autofocus="autofocus"/>
                </p>
		        <p>
                    <input type="password" name="password" id="password" class="form-control" placeholder="密码"/>
                </p>
                <p>
                    <input type="text" name="captcha" id="captcha-input" class="form-control" placeholder="验证码" autocomplete="off" />
                </p>
                <div class="captcha">
                    <div id="captcha-image"></div>
                    看不清？<a id="reload-captcha" href="javascript:void(0);">换一张</a>
                </div>
		        <p>
                    <div id="login_info"></div>
		            <input id="submit" type="submit" value="登  录" class="login-btn"/>
                </p>
                <p class="update">2014.11.16更新：
                    <ol class="update">
                        <li>乱价管控模块上线，欢迎测试。</li>
                    </ol>
                </p>
            </form>
        </div>