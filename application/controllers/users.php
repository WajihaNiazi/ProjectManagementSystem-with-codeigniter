<?php
    class Users extends CI_Controller{
        public function register(){
            $this->form_validation->set_rules('first_name','FristName','trim|required|min_length[3]');
            $this->form_validation->set_rules('last_name','LastName','trim|required|min_length[3]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('username','UserName','trim|required|min_length[3]');
            $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
            $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[3]|matches[password]');
            if($this->form_validation->run() == FALSE){
                $data['main']="users/register_view";
                $this->load->view('layouts/main',$data);
            }else{
                if($this->user_model->create_user()){
                    $this->session->set_flashdata('user_registered',"User has been registered");
                    redirect('home/index');
                }else{
                    
                }
            }
        }
        public function login()
        {
            // echo $_POST['username']; == echo $this->input->post('username');
            // $this->form_validation->set_rules('name Of input','for know','conditions');
            $this->form_validation->set_rules('username','UserName','trim|required|min_length[3]');
            $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
            if($this->form_validation->run() == FALSE){
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata($data);
                redirect('home');
            }else{
               $username= $this->input->post('username');
               $password= $this->input->post('password');
               $user_id =  $this->user_model->login_user($username,$password);
               if($user_id){
                
                   $user_data = array(
                       'user_id'=>$user_id,
                       'username'=>$username,
                       'logged_in'=>TRUE
                   );
                   $this->session->set_userdata($user_data);
                   $this->session->set_flashdata('login_success','You are now logged in');
                //    redirect('home/index');
                $data['main']="admin_view";
                $this->load->view('layouts/main',$data);
               }else{
                    $this->session->set_flashdata('login_filed','sorry you are not logged in');
                    redirect('home/index');
               }
            }
        }
        public function logout()
        {
            $this->session->sess_destroy();
            
            redirect('home/index');
        }
        // public function show($user_id){
            // $this->load->model('user_model');
            // $data['result'] =$this->user_model->get_users($user_id);
        //     $this->load->view('user_view',$data);
        
        //     // foreach($result as $object){
        //     //     echo $object->id;
        //     // }
        // }

        // public function Insert(){
        //     $username='sodabeh';
        //     $password='1234';
        //     $this->user_model->create_users([
        //         'username'=>$username,
        //         'password'=>$password
        //    ]);
        // }
        // // public function Insert(){
        // //     $this->user_model->create_users([
        // //         'username'=>'sodabeh',
        // //         'password'=>'1234'
        // //    ]);
        // // }
        // // public function Insert(){
        // //     $data = array( 
        // //          'username'=>'sodabeh',
        // //          'password'=>'1234'
        // //      );
        // //      $this->user_model->create_users($data);
        // //  }
        // public function update(){
        //     $username='Atifa';
        //     $password='updata test';
        //     $id='3';
        //     $this->user_model->update_users([
        //         'username'=>$username,
        //         'password'=>$password
        //     ],$id);
            
        // }
        // public function delete(){
        //     $id='3';
        //     $this->user_model->delete_users($id);
        // }
    }
?> 