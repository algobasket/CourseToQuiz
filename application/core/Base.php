<?php

class Base extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('crud_model');
    $this->load->model('user_model');
    $this->accountStatus();
    $this->isUserLogged();
  }

  function all($table){
    return $this->crud_model->getAllRecord($table);
  }

  function allNoJoin($table){
    return $this->crud_model->getAllRecordNoJoin($table);
  }

  function one($table,$query){
    return $this->crud_model->getOneRecord($table,$query);
  }

  function create($table,$query){
    return $this->crud_model->create($table,$query);
  }

  function update($tableName,$query,$updateArray){
   return $this->crud_model->update($tableName,$query,$updateArray);
  }

  function remove($tableName,$query){
     return $this->crud_model->delete($tableName,$query);
  }

  function page($array){
     return $this->load->view('template/content',$array);
  }

  function accountStatus(){
    if($this->session->userdata('userId') || $this->session->userdata('adminId')){
      $status = $this->user_model->accountStatus($this->session->userdata('userId'));
      if($status == 'blocked' && $this->session->userdata('rolename') == "customer"){
        redirect('Home/blockedUser');
      }
    }
  }

  function isUserLogged(){
    if(!$this->session->userdata('userId') && !$this->session->userdata('adminId')){
       redirect('auth/login');
    }
  }


}
?>
