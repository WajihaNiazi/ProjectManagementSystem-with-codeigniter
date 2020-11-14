<?php
    class Tasks extends  CI_Controller{
        public function __construct(){
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
                $this->session->set_flashdata('no_access','you should login at the first.');
                redirect('home/index');    
            }  
        }
        public function display($task_id)
        {
            $data['project_id']= $this->task_model->get_task_project_id($task_id);
            $data['project_name']= $this->task_model->get_project_name($data['project_id']); 
            $data['task']= $this->task_model->get_task($task_id);
            $data['main']="tasks/display";
            $this->load->view("layouts/main",$data);
        }
        public function create($project_id){
            $this->form_validation->set_rules('task_name','task Name','trim|required');
            $this->form_validation->set_rules('task_body','task describution','trim|required|encode_php_tags'); 
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $data['main']='tasks/create_task';
                $this->load->view('layouts/main',$data); 
            }else{
                $data = array(
                    'project_id'=> $project_id,
                    'task_name'=> $this->input->post('task_name'),
                    'task_body'=> $this->input->post('task_body'),
                    'due_date'=> $this->input->post('due_date'),
                );
               if($this->task_model->create_task($data)){
                    $this->session->set_flashdata('task_created','task is created!!!');
                    redirect('project/index');
                }
            }     
        }
        public function edit($task_id){
            $this->form_validation->set_rules('task_name','task Name','trim|required');
            $this->form_validation->set_rules('task_body','task describution','trim|required|encode_php_tags'); 
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $data['project_id']=$this->task_model->get_task_project_id($task_id);
                $data['project_name']=$this->task_model->get_project_name($data['project_id']);
                $data['the_task']=$this->task_model->get_task_project_data($task_id);
                $data['main']='tasks/edit_task';
                $this->load->view('layouts/main',$data); 
            }else{
                $project_id=$this->task_model->get_task_project_id($task_id);
                $data = array(
                    'project_id'=> $project_id,
                    'task_name'=> $this->input->post('task_name'),
                    'task_body'=> $this->input->post('task_body'),
                    'due_date'=> $this->input->post('due_date')
                );
               if($this->task_model->edit_task($task_id,$data)){
                    $this->session->set_flashdata('task_edited','task is updated!!!');
                    redirect('project/index');
                }
            }     
        }
        public function delete($project_id,$task_id)
        {

            $this->task_model->delete_task($task_id);
            $this->session->set_flashdata('task_deteled','your task has been deleted');
            redirect('project/display/'.$project_id.'');

        }
        public function mark_complete($task_id)
        {
            $project_id = $this->task_model->get_task_project_id($task_id);
            if($this->task_model->mark_complete($task_id)){
              $this->session->set_flashdata('mark_done',"This task has been completed");
              redirect('project/display/'.$project_id.'');  
            }
        }
        public function mark_incomplete($task_id)
        {
            $project_id = $this->task_model->get_task_project_id($task_id);
            if($this->task_model->mark_incomplete($task_id)){
              $this->session->set_flashdata('mark_undone',"This task has been marked undone");
              redirect('project/display/'.$project_id.'');  
            }
        }
                
    }
?>