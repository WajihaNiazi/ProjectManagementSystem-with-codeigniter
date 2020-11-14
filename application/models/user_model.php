<?php
    class User_model extends CI_Model{
        public function create_user(){
            $opctions = ['cost'=>12];
            $encripted_pass = password_hash($this->input->post('password'),PASSWORD_BCRYPT,$opctions);
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' =>$encripted_pass 
            );
           $insert_data= $this->db->insert('users',$data);
           return $insert_data;

        }
        public function login_user($username,$password){
            $this->db->where('username',$username);
            $result = $this->db->get('users');
            if(password_verify($password, $result->row(2)->password)){
                return $result->row(0)->id;
            }else{
                return FALSE;
            }
        }
        // public function login_user($username,$password){
        //     $this->db->where('username',$username);
        //     $this->db->where('password',$password);
        //     $result = $this->db->get('users');
        //     if($result->num_rows()==1){
        //         return $result->row(0)->id;
        //     }else{
        //         return FALSE;
        //     }
        // }
     
        
        
        
    //    public function get_users($user_id){
    //         $this->db->where(['id'=>$user_id]);
        //     $this->db->where('id',$user_id);
    //         $query =$this->db->get('users');
    //         return $query->result();



        //     $config['hostname']="localhost";
        //     $config['user']="root";
        //     $config['password']="";
        //     $config['database']="errand_db";

        //     $config_2['hostname']="localhost";
        //     $config_2['user']="root_2";
        //     $config_2['password']="";
        //     $config_2['database']="errand_db_2";

        //    $connection= $this->load->database($config);
        //    $connection_2$this->load->database($config_2);




        // $query =$this->db->get(datbasemodelname);
        // $query =$this->db->get('users');
        // // return $query->result();
        // $query = $this->db->query("SELECT * FROM users");

        //return $query->num_rows();//count the columns numbers 
        //return $query->num_fields(); //count the row numbers

        // }
        

        // public function create_users($data){
        //     $this->db->insert('users',$data);
        // }

        // public function update_users($data,$id){
        //     $this->db->where(['id'=>$id]);
        //     $this->db->update('users',$data);
        // }
        
        // public function delete_users($id){
        //     $this->db->where(['id'=>$id]);
        //     $this->db->delete('users');   
        // }
    }
?>