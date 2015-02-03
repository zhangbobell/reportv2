<div class="row">
    <?php $this->load->view('widget/db_picker')?>
    <div class="col-md-12 l mt20">
        <ul class="task-list col-md-2 mt30">
            <?php foreach($task_list as $item):?>
                <li class="col-md-12"><a class="acti-item" href="javascript:;" data-id="<?php echo $item['activity_id'];?>"><?php echo $item['activity_name'];?></a></li>
            <?php endforeach;?>
            <div id="abs" class="abs"></div>
        </ul>
        <div class="col-md-10">
            <div class="col-md-12" id="task-detail"></div>
            <div class="col-md-12 operate-area">
                <label for="assign-to">指派给：</label>
                <select name="assgin-to" id="ass-user">
                <?php foreach($user_list as $user):?>
                    <option value="<?php echo $user['username'];?>"><?php echo $user['username'];?></option>
                <?php endforeach;?>
                </select>
                <label for="assign-to">操作类型：</label>
                <select name="assgin-to" id="ass-action-type">
                    <?php foreach($action_type_list as $act):?>
                        <option value="<?php echo $act['action_type'];?>"><?php echo $act['action_type'];?></option>
                    <?php endforeach;?>
                </select>
                <label for="assign-to">任务名称：</label>
                <input type="text" name="assgin-to" id="ass-action-name" />

                <button class="btn btn-primary" id="ass-submit">确认指派</button>
            </div>
        </div>

    </div>
</div>