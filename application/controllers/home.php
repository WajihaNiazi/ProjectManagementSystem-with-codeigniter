<?php
    class Home extends CI_Controller{
        public function index(){

            if($this->session->userdata('logged_in')){
                $user_id=$this->session->userdata('user_id');
                $data['tasks'] = $this->task_model->get_all_tasks($user_id);
                $data['projects'] = $this->project_model->get_all_project($user_id);
            }
            $data['main']='home_view';
            $this->load->view('layouts/main',$data);
        }
    }
?>