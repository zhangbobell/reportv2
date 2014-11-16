<div class="col-md-12 mb20 fix">
    <h4 class="text-primary">删除项目</h4>
</div>
<form action="" method="post" class="col-md-12 fix" role="form">
    <div class="col-md-12 mb20 fix">
        <h4 class="text-primary">请选择所要删除的项目名称</h4>
    </div>
    <div class="form-group fix">
        <label for="delete-project" class="col-sm-2 control-label">选择删除项目：</label>
        <div class="col-sm-3">
            <select multiple id="delete-project" class="form-control">
                <?php foreach ($all_project as $project): ?>
                    <option value="<?php echo $project['pid'] ?>"><?php echo $project['projectname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group fix col-sm-5">
        <input id="project-delete" type="butrton" value="删 除" class="btn btn-primary" onclick="return confirm('您确定要删除吗?')"/>
    </div>
</form>