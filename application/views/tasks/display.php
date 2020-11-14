<h1>Task for:<?php echo $project_name;?></h1>
<table style="width:700px;">
        <thead>
            <tr>
                <th>Task_name</th>
                <th>Task_body</th>
                <th>Date</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php echo "<td>$task->task_name</td>";?>
                <?php echo "<td>".$task->task_body."</td>";?>
                <?php echo "<td>".$task->date_created."</td>";?>   
                <td>
                   <a href="<?php echo base_url();?>tasks/edit/<?php echo $task->id;?>">Eidt Task</a> // 
                    <a href="<?php echo base_url();?>tasks/delete/<?php echo $task->project_id;?>/<?php echo $task->id;?>">Delete Task</a>
                </td>
                <td><a href="<?php echo base_url();?>/tasks/mark_complete/<?php echo $task->id;?>">Mark complete</a></td>
                <td><a href="<?php echo base_url();?>/tasks/mark_incomplete/<?php echo $task->id;?>">Mark Incomplete</a></td>

            </tr>
        </tbody>
</table>