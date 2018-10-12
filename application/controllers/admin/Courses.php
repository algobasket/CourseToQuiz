<?php
class Courses extends Base
{

 /****** Middlewares ********/

   use checkAuth;


/****** Constructor ********/

  function __construct()
  {
    parent::__construct();

    // Load Models
    $this->load->model('courses_model');
  }

  function index(){
    $this->page([
      'section' => 'list',
      'page' => 'admin/courses',
      'list' => $this->courses_model->getAllCourses()
    ]);
  }


  /****** Update Course ********/

  function update_course(){
    if($this->input->post('update')){
        $output = $this->update('course',['id' => $this->uri->segment(4)],[
          'course_title' => $this->input->post('title'),
          'course_name'  => $this->input->post('name'),
          'category_id'  => $this->input->post('category_id'),
          'updated'      => date('d-m-Y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Category Updated</div>');
        }
    }
    $this->page([
      'section' => 'update',
      'page' => 'admin/courses',
      'one' => $this->courses_model->oneCourse($this->uri->segment(4)),
      'list' => $this->all('category')
    ]);
  }

  /****** Create Course ********/

  function create_course(){
    if($this->input->post('create')){
        $output = $this->create('course',[
          'course_title' => $this->input->post('title'),
          'course_name'  => $this->input->post('name'),
          'category_id'  => $this->input->post('category_id'),
          'created'      =>date('d-m-Y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Course Created</div>');
        }
        redirect('admin/courses');
    }
    $this->page([
      'section' => 'create',
      'page' => 'admin/courses',
      'list' => $this->all('category')
    ]);
  }

  /****** Remove Course ********/

  function delete(){
       $this->remove('course',['id' => $this->uri->segment(4)]);
       redirect('admin/courses');
  }

}
?>
