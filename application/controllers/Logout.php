<?php
class Logout extends CI_Controller{
  function __construct(){
    parent::__construct();
  }
  function index(){
    $this->session->unset_userdata(array(
    'userId'      => '',
    'username'    => '',
    'email'       => '',
    'status'      => '',
    'rolename'    => '',
    'displayname' => '',
    'adminId'     => '',
    'redirectAfterLogin'     => ''
  ));
  $this->session->sess_destroy();
  redirect('auth/login');
  }
}
?>
