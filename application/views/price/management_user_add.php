<div class="row">
    <form action="price/user_add_data" method="post" class="form-horizontal" role="form" target="_self">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">用户名：</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="用户名">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">密码：</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="password" id="password" placeholder="密码">
            </div>
        </div>
        <div class="form-group">
            <label for="re_password" class="col-sm-2 control-label">确认密码：</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="re_password" id="re_password" placeholder="再次确认密码">
            </div>
        </div>
        <div class="form-group">
            <label for="group" class="col-sm-2 control-label">组别：</label>
            <div class="col-sm-3">
                <select id="group" class="form-control">
                    <option>系统管理员</option>
                    <option>维权专员</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="auth_project" class="col-sm-2 control-label">授权项目：</label>
            <div class="col-sm-3">
                <select multiple id="auth_group" class="form-control">
                    <option>三枪</option>
                    <option>黛富妮</option>
                    <option>马盖先</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="is_valid" class="col-sm-2 control-label">是否禁用：</label>
            <div class="radio-inline">
                <label>
                    <input type="radio" name="is_valid" id="optionsRadios1" value="1" checked>启用
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input type="radio" name="is_valid" id="optionsRadios2" value="0">禁用
                </label>
            </div>
        </div>
        <input id="submit" type="submit" value="添 加" class="add-btn"/>
        <!-- <input name="submit" type="submit" value="增加"/>  -->
    </form>