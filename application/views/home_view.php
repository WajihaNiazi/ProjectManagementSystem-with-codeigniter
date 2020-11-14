
    <p class="bg-succcess">
        <?php if($this->session->flashdata('login_success')):?>
        <?php echo $this->session->flashdata('login_success')?>
        <?php endif;?>
        
        <?php if($this->session->flashdata('user_registered')):?>
        <?php echo $this->session->flashdata('user_registered')?>
        <?php endif;?>
        
    </p>
    <p class="bg-danger">
    <?php if($this->session->flashdata('no_access')):?>
        <?php echo $this->session->flashdata('no_access')?>
        <?php endif;?>

        <?php if($this->session->flashdata('login_filed')):?>
        <?php echo $this->session->flashdata('login_filed')?>
        <?php endif;?>
    </p>
  <div class="jumbtron">
            <h1 class="text-center">Welcome to the CI App</h1>
  </div> 



    <?php if(isset($projects)):?>
    <h1>project</h1>
    <table  style="width:700px; font-size:20px;">
        <thead>
            <tr>
                <th >project_name</th>
                <th >project_body</th>
                <th ></th>
                
            </tr>
        </thead>
        <tbody>
        
           <?php foreach ($projects as $pro):?>
            <tr>
                <?php echo "<td>".$pro->project_name."</td>";?>
                <?php echo "<td>".$pro->project_body."</td>";?>
                <?php echo "<td><a href='".base_url()."project/display/".$pro->id."'>view</a></td>";?>
            </tr>
           <?php endforeach;?>
        </tbody>
    </table>
    
    <?php endif;?>
    <?php if(isset($tasks)):?>
    <h1>Tasks </h1>
    <table style="width:700px; font-size:20px;">
        <thead>
            <tr>
                <th >task_name</th>
                <th >task_body</th>
                <th ></th>
                
            </tr>
        </thead>
        <tbody>
        
           <?php foreach ($tasks as $task):?>
            <tr>
                <?php echo "<td>".$task->task_name."</td>";?>
                <?php echo "<td>".$task->task_body."</td>";?>
                <?php echo "<td><a href='".base_url()."tasks/display/".$task->id."'>view</a></td>";?>

                
            </tr>
           <?php endforeach;?>
        </tbody>
    </table>
    
    <?php endif;?>
    
