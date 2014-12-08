<div class="col-xs-2 col-md-2" data-link-field="db-input">
    <select class="form-control" id="db">
        <?php foreach($authDB as $dbname => $projectname): ?>
            <option value="<?php echo $dbname; ?>"><?php echo $projectname;?></option>
        <?php endforeach; ?>
    </select>
</div>