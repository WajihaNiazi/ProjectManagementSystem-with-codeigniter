<?php
    class Project extends  CI_Controller{
        public function __construct(){
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
                $this->session->set_flashdata('no_access','you should login at the first.');
                redirect('home/index');    
            }  
        }  
        public function index(){
            $data['projects'] = $this->project_model->get_projects(); 
            $data['main']='projects/index';
            $this->load->view('layouts/main',$data);
        }
        public function display($project_id)
        {
            $data['not_completed_tasks'] =$this->project_model->get_project_tasks($project_id,false);
            $data['completed_tasks'] =$this->project_model->get_project_tasks($project_id,true );
            $data['project_data'] =$this->project_model->get_project($project_id);
            $data['main']='projects/display';
            $this->load->view('layouts/main',$data);   
        }
        public function create(){
            $this->form_validation->set_rules('project_name','Project Name','trim|required|htmlspecialchars');
            $this->form_validation->set_rules('project_body','Projcet describution','trim|required|encode_php_tags'); 
            if ($this->form_validation->run() == FALSE) {
                // $data = array(
                //     'errors' => validation_errors()
                // );
                $data['main']='projects/create_project';
                $this->load->view('layouts/main',$data); 
            }else{
                $data = array(
                    'project_user_id'=> $this->session->userdata('user_id'),
                    'project_name'=> $this->input->post('project_name'),
                    'project_body'=> $this->input->post('project_body',true),
                );
               if($this->project_model->create_projcet($data)){
                    $this->session->set_flashdata('project_created','project is created!!!');
                    redirect('project/index');
               }


            }     
        }

        public function edit($projct_id)
        {
            $this->form_validation->set_rules('project_name','Project Name','trim|required');
            $this->form_validation->set_rules('project_body','Projcet describution','trim|required'); 
            if ($this->form_validation->run() == FALSE) {
                $data['project_data'] = $this->project_model->get_projctes_info($projct_id);
                $data['main']='projects/edit_project';
                $this->load->view('layouts/main',$data); 
            }else{
                $data = array(
                    'project_user_id'=> $this->session->userdata('user_id'),
                    'project_name'=> $this->input->post('project_name'),
                    'project_body'=> $this->input->post('project_body'),
                );
               if($this->project_model->edit_projcet($projct_id,$data)){
                    $this->session->set_flashdata('project_edited','project is edited!!!');
                    redirect('project/index');
               }


            }  
        }
        public function delete($project_id)
        {
            $this->project_model->delete_project_tasks($project_id);
            $this->project_model->delete_project($project_id);
            $this->session->set_flashdata('delete','has been deleted!');
            redirect('project/index');
        }
    }
?>