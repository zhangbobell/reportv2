
<div class="col-md-12 mb20 fix">
    <h4 class="text-primary">编辑项目</h4>
</div>
<form action="" method="post" class="col-md-12 fix" role="form">
    <!--<form action="managements/user_add_data" method="post" class="form-horizontal" role="form" target="_self">-->
    <div class="form-group fix">
        <label for="chose-project" class="col-sm-2 control-label">选择所要编辑的项目：</label>
        <div class="col-sm-3">
            <select id="chose-project" class="form-control">
                <option value="-1">选择项目</option>
                <?php foreach ($all_project as $project): ?>
                    <option value="<?php echo $project['pid'] ?>"><?php echo $project['projectname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>
<form action="" method="post" class="col-md-12 fix" role="form">
    <div class="form-group fix">
        <label for="projectname" class="col-sm-2 control-label">项目名称：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="projectname" id="projectname" placeholder="项目名称" >
        </div>
    </div>
    <div class="form-group fix">
        <label for="projectdb" class="col-sm-2 control-label">项目数据库：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="projectdb" id="projectdb" placeholder="项目数据库">
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
                <input type="radio" name="is-valid" id="optionsRadios2" value="0">禁用
            </label>
        </div>
    </div>
    <div class="form-group fix col-sm-5">
        <input id="edit-project" type="button" value="修 改" class="btn btn-primary r"/>
    </div>
</form>
