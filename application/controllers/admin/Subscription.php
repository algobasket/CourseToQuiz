<?php
class Subscription extends Base
{

 /****** Middlewares ********/

   use checkAuth;


/****** Constructor ********/

  function __construct(){

    parent::__construct();

    // Load Models
    $this->load->model('subscription_model');
    $this->load->model('crud_model');
    $this->load->model('user_model');
    $this->load->helper('common');

  }

  function plans(){
    // print_r($this->all('subscription_plans'));die;
    $this->page([
      'section' => 'list',
      'page'    => 'admin/plan',
      'list'    => $this->all('subscription_plans')
    ]);
  }


  function create_plan(){
    if($this->input->post('create')){
      $this->create('subscription_plans',[
        'plan_title' => $this->input->post('plan_title'),
        'plan_name'  =>  str_replace('','-',$this->input->post('plan_title')),
        'json'       => trim($this->input->post('json')),
        'status'     => $this->input->post('status')
      ]);
      $this->session->set_flashdata('alert','<div class="alert alert-success">Plan created successful</div>');
      redirect('admin/subscription/plans');
    }
    $this->page([
      'section' => 'create',
      'page'    => 'admin/plan'
    ]);
  }

  function update_plan(){
    if($this->input->post('update')){
      $this->update('subscription_plans',['id' => $this->uri->segment(4)],[
        'plan_title' => $this->input->post('plan_title'),
        'plan_name'  =>  str_replace('','-',$this->input->post('plan_title')),
        'json'       => trim($this->input->post('json')),
        'status'     => $this->input->post('status')
      ]);
      $this->session->set_flashdata('alert','<div class="alert alert-success">Plan updated successful</div>');
      redirect('admin/subscription/plans');
    }
    $this->page([
      'section' => 'update',
      'page'    => 'admin/plan',
      'one'     => $this->one('subscription_plans',['id' => $this->uri->segment(4)])
    ]);
  }

  function delete_plan(){
    $this->remove('subscription_plans',['id' => $this->uri->segment(4)]);
    $this->session->set_flashdata('alert','<div class="alert alert-danger">Plan removed</div>');
    redirect('admin/subscription/plans');
  }

  function paid_subscribers(){
    //print_r($this->all('subscription')); die;
    $this->page([
      'section' => 'list',
      'page'    => 'admin/paid_subscribers',
      'list'    => $this->all('subscription')
    ]);
  }

  function paid_subscribers_create(){
    if($this->input->post('create')){
      $this->create('subscription',[
            'user_id' => $this->input->post('user'),
            'plan_id' => $this->input->post('plan'),
            'valid_from' => $this->input->post('valid_from'),
            'valid_upto' => $this->input->post('valid_upto'),
            'created' => date('d-m-Y h:i:s'),
            'updated' => date('d-m-Y h:i:s'),
            'status' => $this->input->post('status')
      ]);
      $this->session->flashdata('alert','<div class="alert alert-success">Membership Added</div>');
      redirect('subscription/paid_subscribers');
    }
    $this->page([
      'section' => 'create',
      'page'    => 'admin/paid_subscribers',
      'user'    => $this->all('userDetail'),
      'plan'    => $this->all('subscription_plans'),
      'status'  => $this->allNoJoin('status')
    ]);
  }

}
?>
