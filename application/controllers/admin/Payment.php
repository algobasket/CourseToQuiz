<?php
class Payment extends Base{

  function __construct(){
    parent::__construct();
    $this->load->model('payment_model');
  }

  function index(){
    $data = array();
    if($this->uri->segment(3)=="delete"){
      $this->remove('setting',['id' => $this->uri->segment(4)]);
      $this->session->set_flashdata('alert','<div class="alert alert-danger">Payment detail deleted</div>');
      redirect('admin/payment');
    }
    if($this->input->post('edit')){
       $this->update('payment',['id' => $this->uri->segment(4)],[
         'gateway'      => $this->input->post('gateway'),
         'subscription_id' => $this->input->post('subscription_id'),
         'user_id'      => $this->input->post('user_id'),
         'plan_id'      => $this->input->post('plan_id'),
         'created'      => date('d-m-y h:i:s'),
         'updated'      => date('d-m-y h:i:s'),
         'status'       => $this->input->post('status')
       ]);
       $this->session->set_flashdata('alert','<div class="alert alert-success">Payment Detail Updated</div>');
       redirect('admin/payment');
    }
    $section = $this->uri->segment(3) ? $this->uri->segment(3) : 'list';
    if($section == 'list'){
      $data['list'] = $this->all('payment');
    }
    if($section == 'edit' || $section == 'view'){
      $data['one'] = $this->one('payment',['id' => $this->uri->segment(4)]);
    }
      $this->page(array_merge([
        'section' => $section,
        'page'    => 'admin/payment',
        'status'  => $this->allNoJoin('status')
      ],$data));
  }

}
 ?>
