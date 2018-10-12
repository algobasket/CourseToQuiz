<?php
class Quiz extends Base
{

 /****** Middlewares ********/

   use checkAuth;


/****** Constructor ********/

  function __construct()
  {
    parent::__construct();

    // Load Models
    $this->load->model('quiz_model');
  }

  function index(){
    $this->page([
      'section' => 'list',
      'page' => 'admin/quiz',
      'list' => $this->quiz_model->getAllQuiz()
    ]);
  }


  /****** Update Course ********/

  function update_quiz(){
    if($this->input->post('update')){
        $output = $this->update('quiz',['id' => $this->uri->segment(4)],[
          'quiz_title' => $this->input->post('title'),
          'quiz_name'  => $this->input->post('name'),
          'course_id'  => $this->input->post('course_id'),
          'updated'      => date('d-m-Y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Quiz Updated</div>');
        }
    }
    $this->page([
      'section' => 'update',
      'page' => 'admin/quiz',
      'one' => $this->quiz_model->oneQuiz($this->uri->segment(4)),
      'list' => $this->all('course')
    ]);
  }

  /****** Create Course ********/

  function create_quiz(){
    if($this->input->post('create')){
        $output = $this->create('course',[
          'quiz_title' => $this->input->post('title'),
          'quiz_name'  => $this->input->post('name'),
          'course_id'  => $this->input->post('course_id'),
          'created'      =>date('d-m-Y h:i:s'),
          'status'       => $this->input->post('status')
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Quiz Created</div>');
        }
        redirect('admin/quiz');
    }
    $this->page([
      'section' => 'create',
      'page' => 'admin/quiz',
      'list' => $this->all('course')
    ]);
  }

  /****** Remove Course ********/

  function delete(){
       $this->remove('quiz',['id' => $this->uri->segment(4)]);
       redirect('admin/quiz');
  }

}
?>
