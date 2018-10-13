<?php
class Setting extends Base{
   function __construct(){
     parent::__construct();
     $this->load->model('setting_model');
     $this->load->helper('common');
   }

   function index(){
     $this->page([
       'page' => 'admin/setting'
     ]);
   }

   function maintainance(){
     $data = array();
     if($this->uri->segment(4)=="delete"){
       $this->remove('setting',['id' => $this->uri->segment(5)]);
       $this->session->set_flashdata('alert','<div class="alert alert-danger">Selected maintainance deleted</div>');
       redirect('admin/setting/maintainance');
     }
     if($this->input->post('create')){
       if($this->input->post('status') == 1){
         $this->update('setting',['setting_type' => 'maintainance'],["status" => 2]);
       }
        $this->create('setting',[
          'setting_type' => 'maintainance',
          'setting_name' => $this->input->post('setting_name'),
          'json_data'    => $this->input->post('json_data'),
          'created'      => date('d-m-y h:i:s'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);

        $this->session->set_flashdata('alert','<div class="alert alert-success">New Maintainance Added</div>');
        redirect('admin/setting/maintainance');
     }
     if($this->input->post('edit')){
       if($this->input->post('status') == 1){
         $this->update('setting',['setting_type' => 'maintainance'],["status" => 2]);
       }
        $this->update('setting',['id' => $this->uri->segment(5)],[
          'setting_type' => 'maintainance',
          'setting_name' => $this->input->post('setting_name'),
          'json_data'    => $this->input->post('json_data'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);

        $this->session->set_flashdata('alert','<div class="alert alert-success">Maintainance Setting Updated</div>');
        redirect('admin/setting/maintainance');
     }
     $section = $this->uri->segment(4) ? $this->uri->segment(4) : 'list';
     if($section == 'list'){
       $data['list'] = $this->one('setting',['setting_type' => 'maintainance']);
     }
     if($section == 'edit' || $section == 'view'){
       $data['one'] = $this->one('setting',['setting_type' => 'maintainance','id' => $this->uri->segment(5)]);
     }
     $this->page(array_merge([
       'section' => $section,
       'page'    => 'admin/maintainanceSetting',
       'status'  => $this->allNoJoin('status')
     ],$data));
   }


   function payment(){
     $data = array();
     if($this->uri->segment(4)=="delete"){
       $this->remove('setting',['id' => $this->uri->segment(5)]);
       $this->session->set_flashdata('alert','<div class="alert alert-danger">Selected API deleted</div>');
       redirect('admin/setting/payment');
     }
     if($this->input->post('create')){
        $this->create('setting',[
          'setting_type' => 'payment',
          'setting_name' => $this->input->post('gateway'),
          'json_data'    => $this->input->post('json_data'),
          'created'      => date('d-m-y h:i:s'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        $this->session->set_flashdata('alert','<div class="alert alert-success">New Payment API Added</div>');
        redirect('admin/setting/payment');
     }
     if($this->input->post('edit')){
        $this->update('setting',['id' => $this->uri->segment(5)],[
          'setting_type' => 'payment',
          'setting_name' => $this->input->post('gateway'),
          'json_data'    => $this->input->post('json_data'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        $this->session->set_flashdata('alert','<div class="alert alert-success">Payment API Updated</div>');
        redirect('admin/setting/payment');
     }
     $section = $this->uri->segment(4) ? $this->uri->segment(4) : 'list';
     if($section == 'list'){
       $data['list'] = $this->one('setting',['setting_type' => 'payment']);
     }
     if($section == 'edit' || $section == 'view'){
       $data['one'] = $this->one('setting',['setting_type' => 'payment','id' => $this->uri->segment(5)]);
     }
     $this->page(array_merge([
       'section' => $section,
       'page'    => 'admin/paymentSetting',
       'status'  => $this->allNoJoin('status')
     ],$data));
   }

   function quiz(){ 
     $data = array();
     if($this->uri->segment(4)=="delete"){
       $this->remove('setting',['id' => $this->uri->segment(5)]);
       $this->session->set_flashdata('alert','<div class="alert alert-danger">Selected Quiz Setting Deleted</div>');
       redirect('admin/setting/quiz');
     }
     if($this->input->post('create')){
        $this->create('setting',[
          'setting_type' => 'quiz',
          'setting_name' => $this->input->post('setting_name'),
          'json_data'    => $this->input->post('json_data'),
          'created'      => date('d-m-y h:i:s'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        $this->session->set_flashdata('alert','<div class="alert alert-success">New Quiz Setting Added</div>');
        redirect('admin/setting/quiz');
     }
     if($this->input->post('edit')){
        $this->update('setting',['id' => $this->uri->segment(5)],[
          'setting_type' => 'quiz',
          'setting_name' => $this->input->post('setting_name'),
          'json_data'    => $this->input->post('json_data'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        $this->session->set_flashdata('alert','<div class="alert alert-success">Quiz Setting Updated</div>');
        redirect('admin/setting/quiz');
     }
     $section = $this->uri->segment(4) ? $this->uri->segment(4) : 'list';
     if($section == 'list'){
       $data['list'] = $this->one('setting',['setting_type' => 'quiz']);
     }
     if($section == 'edit' || $section == 'view'){
       $data['one'] = $this->one('setting',['setting_type' => 'quiz','id' => $this->uri->segment(5)]);
     }
     $this->page(array_merge([
       'section' => $section,
       'page'    => 'admin/quizSetting',
       'status'  => $this->allNoJoin('status')
     ],$data));
   }

   function frontend(){
     $data = array();
     if($this->uri->segment(4)=="delete"){
       $this->remove('setting',['id' => $this->uri->segment(5)]);
       $this->session->set_flashdata('alert','<div class="alert alert-danger">Selected Frontend deleted</div>');
       redirect('admin/setting/frontend');
     }
     if($this->input->post('create')){
        $this->create('setting',[
          'setting_type' => 'frontend',
          'setting_name' => $this->input->post('setting_name'),
          'json_data'    => $this->input->post('json_data'),
          'created'      => date('d-m-y h:i:s'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        $this->session->set_flashdata('alert','<div class="alert alert-success">New Frontend Setting Added</div>');
        redirect('admin/setting/frontend');
     }
     if($this->input->post('edit')){
        $this->update('setting',['id' => $this->uri->segment(5)],[
          'setting_type' => 'frontend',
          'setting_name' => $this->input->post('setting_name'),
          'json_data'    => $this->input->post('json_data'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        $this->session->set_flashdata('alert','<div class="alert alert-success">Frontend Setting Updated</div>');
        redirect('admin/setting/frontend');
     }
     $section = $this->uri->segment(4) ? $this->uri->segment(4) : 'list';
     if($section == 'list'){
       $data['list'] = $this->one('setting',['setting_type' => 'frontend']);
     }
     if($section == 'edit' || $section == 'view'){
       $data['one'] = $this->one('setting',['setting_type' => 'frontend','id' => $this->uri->segment(5)]);
     }
     $this->page(array_merge([
       'section' => $section,
       'page'    => 'admin/frontendSetting',
       'status'  => $this->allNoJoin('status')
     ],$data));
   }

   function social(){
     $data = array();
     if($this->uri->segment(4)=="delete"){
       $this->remove('setting',['id' => $this->uri->segment(5)]);
       $this->session->set_flashdata('alert','<div class="alert alert-danger">Selected Social API deleted</div>');
       redirect('admin/setting/social');
     }
     if($this->input->post('create')){
        $this->create('setting',[
          'setting_type' => 'social',
          'setting_name' => $this->input->post('setting_name'),
          'json_data'    => $this->input->post('json_data'),
          'created'      => date('d-m-y h:i:s'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        $this->session->set_flashdata('alert','<div class="alert alert-success">New Social Setting Added</div>');
        redirect('admin/setting/social');
     }
     if($this->input->post('edit')){
        $this->update('setting',['id' => $this->uri->segment(5)],[
          'setting_type' => 'social',
          'setting_name' => $this->input->post('setting_name'),
          'json_data'    => $this->input->post('json_data'),
          'updated'      => date('d-m-y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        $this->session->set_flashdata('alert','<div class="alert alert-success">Social Setting Updated</div>');
        redirect('admin/setting/social');
     }
     $section = $this->uri->segment(4) ? $this->uri->segment(4) : 'list';
     if($section == 'list'){
       $data['list'] = $this->one('setting',['setting_type' => 'social']);
     }
     if($section == 'edit' || $section == 'view'){
       $data['one'] = $this->one('setting',['setting_type' => 'social','id' => $this->uri->segment(5)]);
     }
     $this->page(array_merge([
       'section' => $section,
       'page'    => 'admin/socialSetting',
       'status'  => $this->allNoJoin('status')
     ],$data));
   }

}
?>
