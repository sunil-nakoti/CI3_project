<?php
class Admin extends CI_controller{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('session');
        // $this->load->library('url');
        $this->load->model("AdvanceModel");
    }
    public function index(){
        $this->load->view('admin/signup');
    }
    public function user_signup(){
       
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run('signup_valid')==false){
        $this->load->view('admin/signup');
        }else{
            $username = $this->input->post('username');
            $password=  password_hash($this->input->post('password'),PASSWORD_BCRYPT);
            $email = $this->input->post('email');
            //check email already exists or not
            $user=$this->AdvanceModel->isUserExists($email,$username);
            if(!$user)
            {   $data=[ 
                'username'=>$username,
                'password'=>$password,
                'email'=>$email];
// $post =$this->inupt->post();
// $this->load->model('AdvanceModel');
 $result=$this->AdvanceModel->signup($data);
if($result){

    $this->session->set_flashdata('message', 'class="successfully registered-success"');
    $this->session->set_flashdata('msg_class', ' successfully registered');
    redirect('Admin/login_index');
}else{
    $this->session->set_flashdata('message', ' please try again');
    $this->session->set_flashdata('msg_class', ' bg-danger');
}

        }
    }
}


public function login_index(){
   
  return  $this->load->view('admin/login');
}
    // .........login.............
    public function login_auth(){
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run('signin_valid')==false){
        $this->load->view('admin/login');
        }else{
           $username= $this->input->post('username');
           $email = $this->input->post('email');
           $password= $this->input->post('password');
         
$result= $this->AdvanceModel->login_user($username,$password);
if($result){
    $data=[
        'username'=>$username,
        'email'=>$email,
        'logged_in' =>TRUE
    ];
    $this->session->set_userdata($data);
 redirect('newproj/index');
   
}else{
   $this->session->set_flashdata('error', 'Invalid usernaem or password');
 redirect('Admin/login_index');
}

        }
    }

    public function logout() {
        // Implement logout logic
        // Destroy the user session
        $this->session->sess_destroy();
        // Redirect to the login page or any other desired page
        redirect('Admin/index');
    }
}