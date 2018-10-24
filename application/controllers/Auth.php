<?php
class Auth extends ALGO_Auth{


  function __construct(){
    parent::__construct();
  }

   // Auth User
  function login(){
    $this->load->library('form_validation');
    if($this->input->post('login')){
      $this->form_validation->set_rules('usernameOrEmail','','trim|required|valid_email|max_length[30]');
      $this->form_validation->set_rules('password','','trim|required|max_length[30]|alpha_numeric');
      if($this->form_validation->run() == FALSE){
         $this->session->set_flashdata('alert',validation_errors());
      }else{
         $usernameOrEmail = $this->input->post('usernameOrEmail');
         $password = $this->input->post('password');
         if($this->auth_model->isLoginValid($usernameOrEmail,md5($password)) == TRUE){
              $userData = $this->auth_model->getLoginDetail($usernameOrEmail,md5($password))[0];
              if($userData['rolename'] == "customer"){
                $this->session->set_userdata([
                  'userId'      => $userData['id'],
                  'username'    => $userData['username'],
                  'email'       => $userData['email'],
                  'status'      => $userData['status'],
                  'rolename'    => $userData['rolename'],
                  'displayname' => ucfirst($userData['first_name']) . ' ' . ucfirst($userData['last_name'])
                ]);
                if($this->session->userdata('redirectAfterLogin')){
                  redirect($this->session->userdata('redirectAfterLogin'));
                }else{
                   redirect('welcome');
                }

              }elseif($userData['rolename'] == "admin"){
                $this->session->set_userdata([
                  'adminId'      => $userData['id'],
                  'username'    => $userData['username'],
                  'email'       => $userData['email'],
                  'status'      => $userData['status'],
                  'rolename'    => $userData['rolename'],
                  'displayname' => ucfirst($userData['first_name']) . ' ' . ucfirst($userData['last_name'])
                ]);
                redirect('admin/welcome');
              }

         }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger">Invalid Login</div>');
         }
      } // END-ELSE
    } // END-IF
    $this->load->view('template/content',['page' => 'auth']);
  }


 // Register User
  function register(){
    $this->load->library('form_validation');
    if($this->input->post('signup')){
      $this->form_validation->set_rules('firstName','','required|max_length[30]');
      $this->form_validation->set_rules('lastName','','required|max_length[30]');
      $this->form_validation->set_rules('email','','required|valid_email|max_length[30]');
      $this->form_validation->set_rules('password','required|max_length[30]|alpha_numeric');
      $this->form_validation->set_rules('re-password','required|max_length[30]|alpha_numeric');
      if($this->form_validation->run() == FALSE){
         $this->session->set_flashdata('alert','<div class="alert alert-danger">'.validation_errors().'</div>');
      }else{
        $array = array(
           'username' => $this->input->post('email'),
           'email'    => $this->input->post('email'),
           'password' => md5($this->input->post('password')),
           'rolename' => 'customer',
           'created'  => date('d-m-Y h:i:s'),
           'updated'  => date('d-m-Y h:i:s'),
           'status'   => 1
        );
         $array2 = array(
            'first_name' => $this->input->post('firstName'),
            'last_name'  => $this->input->post('lastName')
         );
        if($this->auth_model->register($array,$array2) == TRUE){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Registration Done</div>');
         }
      } // END-ELSE
    } // END-IF
     $this->load->view('template/content',['page' => 'auth']);
  }

  function forgot(){
       $email = trim($this->input->post('email'));
       if($this->input->post('submit'))
       {
          if($this->auth_model->isEmailAvailable($email) == true)
         {
            $this->session->set_flashdata('alert','<div class="alert alert-success">If email exist in our system then you will get recovery email</div>');
            $rand = md5(time().rand(1,999999));
            $message = 'https://course2quiz.algobasket.com/auth/newPassword/' . $rand . '/' . base64_encode($email);
            $this->auth_model->setPasswordRequestCode($rand,$email);
            $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'mail.algobasket.com',
              'smtp_port' => 465,
              'smtp_user' => 'noreply@algobasket.com',
              'smtp_pass' => 'EkNG2?Kh^+ZJxxx',
              'mailtype'  => 'html',
              'charset'   => 'iso-8859-1'
          );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('test@algobasket.com', 'AlgoBasket');
            $this->email->to($email);
            $this->email->cc($email);
            $this->email->bcc($email);
            $this->email->subject('Change Password');
            $this->email->message($message);
            if($this->email->send()){
              $this->auth_model->setPasswordRequestCode($rand,$email);
            }else{
              $this->session->set_flashdata('alert','<div class="alert alert-danger">Something went wrong !</div>');
            }

        }else{
        $this->session->set_flashdata('alert','<div class="alert alert-danger">Email doesnt exists</div>');
       }
   }
    $this->load->view('template/content',['page' => 'forgot','section' => 'emailForm']);
  }

  function newPassword(){
    $code  = $this->uri->segment(3);
    $email = trim(base64_decode($this->uri->segment(4)));
    $this->auth_model->checkPasswordRequestCode($code,$email);
    if($this->auth_model->checkPasswordRequestCode($code,$email) == 1)
    {
      if($this->input->post('submit'))
      {
         $newPassword = $this->input->post('newPassword');
         $this->auth_model->changePassword($email,$newPassword);
         $this->session->set_flashdata('alert','<div class="alert alert-success">Password Changed</div>');
      }
      $this->load->view('template/content',['page' => 'forgot','section' => 'passwordForm']);
    }else{
      die("Sorry something went wrong . Please check the url");
    }
  }

 // Facebook Login
  function facebook(){
     $output = $this->facebookAuth();
     if($output){
        redirect($output);
     }
  }

  function facebookCallback(){
     $callback = $this->facebookAuth();
     if(is_array($callback)){
        $user = $this->auth_model->facebookOAuth($callback);
        if(is_array($user)){
          $this->session->set_userdata([
            'userId'      => $user['user_id'],
            'username'    => $user['username'],
            'email'       => $user['email'],
            'status'      => $user['status'],
            'rolename'    => $user['rolename'],
            'displayname' => ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name'])
          ]);
          print_r($user);die;
          //redirect('welcome');
        }
     }
  }




}
 ?>
