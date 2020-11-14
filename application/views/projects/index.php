
    <h1>project view</h1>
    <p class="bg-success">
        <?php if($this->session->flashdata('project_created')):?>
        <?php echo $this->session->flashdata('project_created')?>
        <?php endif;?>
        <?php if($this->session->flashdata('project_edited')):?>
        <?php echo $this->session->flashdata('project_edited')?>
        <?php endif;?>
        <?php if($this->session->flashdata('delete')):?>
        <?php echo $this->session->flashdata('delete')?>
        <?php endif;?>
        <?php if($this->session->flashdata('task_edited')):?>
        <?php echo $this->session->flashdata('task_edited')?>
        <?php endif;?>
    </p>
    <a class="btn btn-primary pull-right" href="<?php echo base_url();?>project/create"> create project</a>
    <?php if($projects): ?>
        <table border="2px" style="width:600px; font-size:20px;  text-align: center;">
            <thead>
                <tr>
                    <th style="text-align: center;">project_name</th>
                    <th style="text-align: center;">project_body</th>
                    <th style="text-align: center;">Delete</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php foreach ($projects as $pro):?>
                <tr>
                    <?php echo "<td><a href='".base_url()."project/display/".$pro->id."'>".$pro->project_name."</a></td>";?>
                    <?php echo "<td>".$pro->project_body."</td>";?>
                    <td><a class="btn btn-danger" href="<?php echo base_url();?>project/delete/<?php echo $pro->id;?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php else:?>
        <h1>There is no project!!!</h1>
    <?php endif;?>
