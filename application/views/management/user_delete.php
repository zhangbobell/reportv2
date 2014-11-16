<div class="col-md-12 mb20 fix">
    <h4 class="text-primary">删除用户</h4>
</div>
<form action="" method="post" class="col-md-12 fix" role="form">
    <div class="col-md-12 mb20 fix">
        <h4 class="text-primary">请选择所要删除的用户名称</h4>
    </div>
    <div class="form-group fix">
        <label for="delete-user" class="col-sm-2 control-label">选择删除的用户：</label>
        <div class="col-sm-3">
            <select multiple id="delete-user" class="form-control">
                <?php foreach ($all_user as $user): ?>
                    <option value="<?php echo $user['userid'] ?>"><?php echo $user['username'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group fix col-sm-5">
        <input id="user-delete" type="butrton" value="删 除" class="btn btn-primary" onclick="return confirm('您确定要删除吗?')"/>
    </div>
</form>