<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="col-xs-9">
    <p class="bg-success">
        <?php if($this->session->flashdata('mark_done')):?>
            <?php echo $this->session->flashdata('mark_done')?>
        <?php endif;?>
        <?php if($this->session->flashdata('mark_undone')):?>
            <?php echo $this->session->flashdata('mark_undone')?>
        <?php endif;?>
        <?php if($this->session->flashdata('task_deteled')):?>
        <?php echo $this->session->flashdata('task_deteled')?>
        <?php endif;?>
    </p>

        <h1>Project Name:<?php echo $project_data->project_name;?></h1>
        <p>Project Date Create:<?php echo $project_data->date_created;?></p>
        <h2>Describution</h2>
        <p><?php echo $project_data->project_body;?></p>
        <h3>Active Tasks</h3>
        <ul>
            <?php if($completed_tasks): ?>
                <?php foreach($completed_tasks as $task):?>
                    <li>
                        <a href="<?php echo base_url();?>tasks/display/<?php echo $task->task_id;?>"><?php echo $task->task_name; ?></a>
                    </li>
                <?php endforeach;?>
            <?php else:?>
                <h4>there is no Task!</h4>
            <?php endif;?>
                
        </ul>
        <h3> Completed  Tasks</h3>
        <ul>
            <?php if($not_completed_tasks): ?>
                <?php foreach($not_completed_tasks as $task):?>
                    <li>
                        <a href="<?php echo base_url();?>tasks/display/<?php echo $task->task_id;?>"><?php echo $task->task_name; ?></a>
                    </li>
                <?php endforeach;?>
            <?php else:?>
                <h4>there is no Task!</h4>
            <?php endif;?>
                
        </ul>
    </div>
    <div class="col-xs-3 pull-right">
        <ul class="lis-group">
            <h5>Project Action</h5>
            <li class="list-group-item"><a href="<?php echo base_url();?>tasks/create/<?php echo $project_data->id;?>">Create Task</a></li>
            <li class="list-group-item"><a href="<?php echo base_url();?>project/edit/<?php echo $project_data->id;?>">Eidt project</a></li>
            <li class="list-group-item"><a href="<?php echo base_url();?>project/delete/<?php echo $project_data->id;?>">Delete project</a></li>
        </ul>
    </div>
  
</body>
</html>