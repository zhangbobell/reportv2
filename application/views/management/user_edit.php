<div class="col-md-12 mb20 fix">
    <h4 class="text-primary">编辑用户</h4>
</div>
<form action="" method="post" class="col-md-12 fix" role="form">
    <!--<form action="managements/user_add_data" method="post" class="form-horizontal" role="form" target="_self">-->
    <div class="form-group fix">
        <label for="chose-user" class="col-sm-2 control-label">选择所要编辑的用户：</label>
        <div class="col-sm-3">
            <select id="chose-user" class="form-control" autofocus="autofocus">
                <option value="0">请选择所要编辑的用户</option>
                <?php foreach ($all_user as $user): ?>
                    <option value="<?php echo $user['userid'] ?>"><?php echo $user['username'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>
<form action="" method="post" class="col-md-12 fix" role="form">
    <div class="form-group fix">
        <label for="username" class="col-sm-2 control-label">用户名：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="username" id="username" placeholder="用户名">
        </div>
    </div>
    <div class="col-md-12 mb20 fix">
        <h4 class="text-danger">如需修改密码，请重新输入密码，否则不必输入密码，默认不修改密码</h4>
    </div>
    <div class="form-group fix">
        <label for="password" class="col-sm-2 control-label">密码：</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="修改密码">
        </div>
    </div>
    <div class="form-group fix">
        <label for="re-password" class="col-sm-2 control-label">确认密码：</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" name="re-password" id="re-password" placeholder="确认修改的密码">
        </div>
    </div>
    <div class="form-group fix">
        <label for="group" class="col-sm-2 control-label">组别：</label>
        <div class="col-sm-3">
            <select id="group" class="form-control">
                <option value="0">系统管理员</option>
                <option value="-1">维权专员</option>
            </select>
        </div>
    </div>
    <div class="form-group fix">
        <label for="auth-project" class="col-sm-2 control-label">授权项目：</label>
        <div class="col-sm-3">
            <select multiple="multiple" id="auth-project" class="form-control">
                <?php foreach ($all_project as $project): ?>
                    <option value="<?php echo $project['pid'] ?>"><?php echo $project['projectname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group fix">
        <label for="is-valid" class="col-sm-2 control-label">是否禁用：</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="radio-inline">
            <label>
                <input type="radio" name="is-valid" id="optionsRadios1" value="1">启用
            </label>
        </div>
        <div class="radio-inline">
            <label>
                <input type="radio" name="is-valid" id="optionsRadios0" value="0">禁用
            </label>
        </div>
    </div>

    <div class="form-group fix">
        <label for="auth-project" class="col-sm-2 control-label">授权时限：</label>
        <div class="input-group date form_datetime col-md-4" data-date="2015-04-01T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
            <input class="form-control" name="limitime" id="limitime" size="16" type="text" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        </div>
        <input type="hidden" id="dtp_input1" value="" /><br/>
    </div>
    <div class="form-group fix col-sm-5">
        <input id="edit-user" type="button" value="修 改" class="btn btn-primary r"/>
    </div>
</form>