
    <h1>Register</h1>
    <?php $attributes = array('id' => 'register_form','class'=>'form_horizontal');?>
    
    <?php echo validation_errors("<p class='bg-danger'>")?>
    <?php echo form_open('users/register',$attributes);?>
        <div class="form-group">
            <?php echo form_label('First Name');?>
            <?php
                $data = array(
                        'class' => 'form-control',
                        'name' =>'first_name',
                        'placeholder'=>'Enter First Name',
                        'value'=>set_value('first_name')
                    );
            ?>
            <?php echo form_input($data);?>
        </div>
        <div class="form-group">
            <?php echo form_label('Last Name');?>
            <?php
                $data = array(
                        'class' => 'form-control',
                        'name' =>'last_name',
                        'placeholder'=>'Enter Last Name',
                        'value'=>set_value('last_name')
                    );
            ?>
            <?php echo form_input($data);?>
        </div>
        <div class="form-group">
            <?php echo form_label('Email');?>
            <?php
                $data = array(
                        'class' => 'form-control',
                        'name' =>'email',
                        'placeholder'=>'Enter your Email',
                        'value'=>set_value('email')
                    );
            ?>
            <?php echo form_input($data);?>
        </div>
        <div class="form-group">
            <?php echo form_label('userName');?>
            <?php
                $data = array(
                        'class' => 'form-control',
                        'name' =>'username',
                        'placeholder'=>'Enter you user name',
                        'value'=>set_value('username')
                    );
            ?>
            <?php echo form_input($data);?>
        </div>
        <div class="form-group">
            <?php echo form_label('password');?>
            <?php
                $data = array(
                        'class' => 'form-control',
                        'name' =>'password',
                        'placeholder'=>'Enter you user password',
                        'value'=>set_value('password')
                    );
            ?>
            <?php echo form_password($data);?>
        </div>
        <div class="form-group">
            <?php echo form_label('ConfirmPassword');?>
            <?php
                $data = array(
                        'class' => 'form-control',
                        'name' =>'confirm_password',
                        'placeholder'=>'Confirm password',
                        'value'=>set_value('confirm_password')
                    );
            ?>
            <?php echo form_password($data);?>
        </div>
        <div class="form-group">
            <?php
                $data = array(
                        'class' => 'btn btn-primary',
                        'name' =>'submit',
                        'value'=>'Register'
                    );
            ?>
            <?php echo form_submit($data);?>
        </div>
    <?php echo form_close();?>
