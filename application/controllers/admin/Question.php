<?php
class Question extends Base
{

 /****** Middlewares ********/

   use checkAuth;


/****** Constructor ********/

  function __construct()
  {
    parent::__construct();

    // Load Models
    $this->load->model('question_answer_model');
    $this->load->helper('common');
  }

  function index(){
    $this->page([
      'section' => 'list',
      'page' => 'admin/questions',
      'list' => $this->question_answer_model->getAllQuestion()
    ]);
  }


  /****** Update Question ********/

  function update_question(){
    if($this->input->post('update')){
        $output = $this->update('questions',['id' => $this->uri->segment(4)],[
          'question_title' => $this->input->post('title'),
          'question_name'  => str_replace(' ','-',$this->input->post('title')),
          'category_id'    => $this->input->post('category_id'),
          'course_id'      => $this->input->post('course_id'),
          'option_type'    => $this->input->post('option_type'),
          'level'          => $this->input->post('level'),
          'real_or_test'   => ($this->input->post('real_or_test') == "on") ? 1 : 0,
          'updated'        => date('d-m-Y h:i:s'),
          'status'         => $this->input->post('status')
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Question Updated</div>');
           redirect('admin/question');
        }
    }
    $this->page([
      'section'   => 'update',
      'page'      => 'admin/questions',
      'one'       => $this->question_answer_model->getOneQuestion($this->uri->segment(4)),
      'category'  => $this->all('category'),
      'courses'    => $this->all('course')
    ]);
  }

  /****** Create Question ********/

  function create_question(){
    $create = [
      'question_title' => $this->input->post('title'),
      'question_name'  => str_replace(' ','-',$this->input->post('title')),
      'category_id'    => $this->input->post('category_id'),
      'course_id'      => $this->input->post('course_id'),
      'option_type'    => $this->input->post('option_type'),
      'level'          => $this->input->post('level'),
      'real_or_test'   => $this->input->post('real_or_test'),
      'created'        => date('d-m-Y h:i:s'),
      'updated'        => date('d-m-Y h:i:s'),
      'status'         => $this->input->post('status')
    ];
    if($this->input->post('create')){
        $output = $this->create('questions',$create);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Question Created</div>');
        }
        redirect('admin/question');
    }
    if($this->input->post('create_answer')){
        $outout = $this->create('questions',$create);
        $output2 = $this->create('options',[
          'question_id'    => $this->db->insert_id(),
          'option_title'   => $this->input->post('answer'),
          'option_name'    => str_replace(' ','-',$this->input->post('answer')),
          'is_answer'      => 1,
          'created'        => date('d-m-Y h:i:s'),
          'updated'        => date('d-m-Y h:i:s'),
          'status'         => 1
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Question Created</div>');
        }
        redirect('admin/question');
    }
    $this->page([
      'section' => 'create',
      'page' => 'admin/questions',
      'category' => $this->all('category'),
      'courses'   => $this->all('course')
    ]);
  }

  /****** Remove Question ********/

  function delete(){
       $this->remove('questions',['id' => $this->uri->segment(4)]);
        $this->session->set_flashdata('alert','<div class="alert alert-danger">Question Deleted</div>');
       redirect('admin/question');
  }

}
?>
