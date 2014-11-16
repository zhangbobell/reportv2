
    <div class="col-md-12 mb20">
        <h4 class="text-primary">新增管理员</h4>
    </div>
    <form action="" method="post" class="col-md-12 fix" role="form">
        <div class="form-group fix">
            <label for="username" class="col-sm-2 control-label">用户名：</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="用户名" autofocus="autofocus">
            </div>
        </div>
        <div class="form-group fix">
            <label for="password" class="col-sm-2 control-label">密码：</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="密码">
            </div>
        </div>
        <div class="form-group fix">
            <label for="re-password" class="col-sm-2 control-label">确认密码：</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name="re-password" id="re-password" placeholder="再次确认密码">
            </div>
        </div>
        <div class="form-group fix">
            <label for="group" class="col-sm-2 control-label">组别：</label>
            <div class="col-sm-3">
                <select id="group" class="form-control">
                    <option>请选择组别</option>
                    <option value="0">系统管理员</option>
                    <option value="2">维权专员</option>
                </select>
            </div>
        </div>
        <div class="form-group fix">
            <label for="auth-project" class="col-sm-2 control-label">授权项目：</label>
            <div class="col-sm-3">
                <select multiple id="auth-project" class="form-control">
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
                    <input type="radio" name="is-valid" id="optionsRadios1" value="1" checked>启用
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input type="radio" name="is-valid" id="optionsRadios2" value="0">禁用
                </label>
            </div>
        </div>
        <div class="form-group fix col-sm-5">
            <input id="add-user" type="button" value="添 加" class="btn btn-primary r"/>
        </div>
    </form>