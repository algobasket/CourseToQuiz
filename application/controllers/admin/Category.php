<?php
class Category extends Base
{

/****** Middlewares ********/

   use checkAuth;



 /****** Constructor ********/

  function __construct()
  {
    parent::__construct();
    $this->load->helper('common');
  }



/****** Default Method ********/

  function index(){
    $this->page([
      'section' => 'list',
      'page' => 'admin/category',
      'list' => $this->all('category')
    ]);
  }


/****** Update Category ********/

  function update_category(){
    if($this->input->post('update')){
        $output = $this->update('category',['id' => $this->uri->segment(4)],[
          'category_title' => $this->input->post('title'),
          'category_name'  => $this->input->post('name'),
          'parent_id'      => $this->input->post('parent_id'),
          'updated'        => date('d-m-Y h:i:s'),
          'status'         => $this->input->post('status')
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Category Updated</div>');
        }
    }
    $this->page([
      'section' => 'update',
      'page' => 'admin/category',
      'one' => $this->one('category',['id' => $this->uri->segment(4)]),
      'list' => $this->all('category')
    ]);
  }


  /****** Create Category ********/

  function create_category(){
    if($this->input->post('create')){
        $output = $this->create('category',[
          'category_title' => $this->input->post('title'),
          'category_name'  => $this->input->post('name'),
          'parent_id'      => $this->input->post('parent_id'),
          'created'        =>date('d-m-Y h:i:s'),
          'status'         => $this->input->post('status')
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Category Created</div>');
        }
        redirect('admin/category');
    }
    $this->page([
      'section' => 'create',
      'page' => 'admin/category',
      'one' => $this->one('category',['id' => $this->uri->segment(4)]),
      'list' => $this->all('category')
    ]);
  }

 /****** Delete Category ********/

  function delete(){
       $this->remove('category',['id' => $this->uri->segment(4)]);
       redirect('admin/category');
  }



}
?>
