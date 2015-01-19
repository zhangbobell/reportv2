<div class="row">
    <?php $this->load->view('widget/db_picker')?>
    <div class="col-md-12 l mt20">
        <ul class="task-list col-md-2 mt30">
            <?php foreach($task_list as $item):?>
                <li><a class="task-item" href="javascript:;" data-id="<?php echo $item['action_id'];?>"><?php echo $item['action_name'];?></a></li>
            <?php endforeach;?>
            <div id="abs"></div>
        </ul>
        <div class="col-md-10">
            <div class="col-md-12" id="task-detail"></div>
            <div class="col-md-12">
                <button class="btn btn-primary status-btn" value="已完成">完成</button>
                <button class="btn btn-default status-btn" value="搁置">搁置</button>
            </div>
        </div>

    </div>
</div>