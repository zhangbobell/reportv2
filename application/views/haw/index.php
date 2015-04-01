<?php $this->load->view('templates/task_header') ?>
<?php $this->load->view('templates/task_sidebar') ?>
<?php $this->load->view('templates/task_banner') ?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <h2>步骤1: 请选择模型</h2>
        <div class="col-sm-6">
            <label for="saiku_file">请选择 SaiKu 文件:</label>
            <select id="saiku_file" class="form-control">
                <?php foreach($this->mhaw->all_saiku_map() as $row) { ?>
                    <option><?php echo $row->saikufile ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-6">
            <label for="database">请选择数据库:</label>
            <select id="database" class="form-control">
                <?php foreach($this->mhaw->all_etc_project() as $row) { ?>
                    <option><?php echo $row->projectname ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="row">
        <h2>步骤2: 请选择图标类型</h2>
        <div class="row">
            <div class="col-sm-3">
                说明信息
            </div>
            <div class="col-sm-9">
                <div class="col-sm-4 text-center" style="height: 140px; background: #909090">
                    <h2 style="display: inline-block; float: none; vertical-align: middle">折线图</h2>
                </div>
                <div class="col-sm-4" style="height: 140px; background: #a0a0a0"></div>
                <div class="col-sm-4" style="height: 140px; background: #808080"></div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/task_footer') ?>
<?php $this->load->view('templates/task_footer_script') ?>
<?php $this->load->view('templates/task_footer_function') ?>
<?php $this->load->view('templates/task_footer_final') ?>
