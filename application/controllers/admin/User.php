<?php
class User extends Base
{

 /****** Middlewares ********/

   use checkAuth;


/****** Constructor ********/

  function __construct()
  {
    parent::__construct();

    // Load Models
    $this->load->model('user_model');
    $this->load->helper('common');
  }

  function index(){
    $this->page([
      'section' => 'list',
      'page' => 'admin/user',
      'list' => $this->user_model->getAllUserInfo($status = NULL)
    ]);
  }


  /****** Update User ********/

  function update_user(){
    if($this->input->post('update')){
        $output = $this->update('user',['id' => $this->uri->segment(4)],[
          'email'          => trim($this->input->post('email')),
          'password'       => $this->input->post('password'),
          'username'       => $this->input->post('username') ,
          'rolename'       => $this->input->post('rolename'),
          'updated'        => date('d-m-Y h:i:s'),
          'status'         => 1
        ]);
        $output2 = $this->update('userDetail',['id' => $this->uri->segment(4)],[
          'first_name'   => $this->input->post('first_name'),
          'last_name'    => $this->input->post('last_name')
        ]);
        if($output == true && $output2 == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">User Updated</div>');
           redirect('admin/user/update_user/'.$this->uri->segment(4));
        }
    }
    $this->page([
      'section'   => 'update',
      'page'      => 'admin/user',
      'one'       => $this->user_model->getUserInfo($this->uri->segment(4)),
      'status'    => $this->allNoJoin('status')
    ]);
  }

  /****** Create User ********/

  function create_user(){

    if($this->input->post('create')){
      $array = [
        'email'          => trim($this->input->post('email')),
        'password'       => md5($this->input->post('password')),
        'username'       => $this->input->post('username') ? $this->input->post('username') : $this->input->post('email'),
        'rolename'       => $this->input->post('rolename'),
        'created'        => date('d-m-Y h:i:s'),
        'updated'        => date('d-m-Y h:i:s'),
        'status'         => 1
      ];
        $output = $this->create('user',$array);
        $output = $this->create('userDetail',[
          'user_id'        => $this->db->insert_id(),
          'first_name'     => $this->input->post('first_name'),
          'last_name'      => $this->input->post('last_name')
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">User Created</div>');
           redirect('admin/user');
        }else{
           $this->session->set_flashdata('alert','<div class="alert alert-success">Error Creating User</div>');
           redirect('admin/user/create_user');
        }

    }
    $this->page([
      'section'    => 'create',
      'page'       => 'admin/user'
    ]);
  }

  /****** Remove User ********/

  function delete(){
       $this->remove('user',['id' => $this->uri->segment(4)]);
       $this->session->set_flashdata('alert','<div class="alert alert-danger">User Deleted</div>');
       redirect('admin/user');
  }

}
?>
