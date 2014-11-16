
    <div class="col-md-12 mb20 fix">
        <h4 class="text-primary">新增项目</h4>
    </div>
    <form action="" method="post" class="col-md-12 fix" role="form">
        <div class="form-group fix">
            <label for="projectname" class="col-sm-2 control-label">项目名称：</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="projectname" id="projectname" placeholder="项目名称" autofocus="autofocus">
            </div>
        </div>
        <div class="form-group fix">
            <label for="projectdb" class="col-sm-2 control-label">项目数据库：db_</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="projectdb" id="projectdb" placeholder="项目数据库">
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
            <input id="add-project" type="button" value="添 加" class="btn btn-primary r"/>
        </div>
    </form>
