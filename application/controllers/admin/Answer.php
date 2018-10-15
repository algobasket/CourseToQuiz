<?php
class Answer extends Base
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
      'page' => 'admin/answers',
      'list' => $this->question_answer_model->getAllAnswers()
    ]);
  }


  /****** Update Answers ********/

  function update_answer(){
    if($this->input->post('update')){
        $output = $this->update('options',['id' => $this->uri->segment(4)],[
          'option_title'   => $this->input->post('title'),
          'option_name'    => str_replace(' ','-',$this->input->post('title')),
          'is_answer'      => ($this->input->post('is_answer') == "on") ? 1 : 0,
          'updated'        => date('d-m-Y h:i:s'),
          'status'         => $this->input->post('status')
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Answer Updated</div>');
           redirect('admin/answer');
        }
    }
    //die(print_r($this->question_answer_model->getOneAnswer($this->uri->segment(4))));
    $this->page([
      'section'   => 'update',
      'page'      => 'admin/answers',
      'one'       => $this->question_answer_model->getOneAnswer($this->uri->segment(4)),
      'category'  => $this->all('category'),
      'courses'    => $this->all('course')
    ]);
  }

  /****** Create Answer ********/

  function create_answer(){
    if($this->input->post('create_answer')){
        $output = $this->create('options',[
          'question_id'    => $this->input->post('question_id'),
          'option_title'   => $this->input->post('answer'),
          'option_name'    => str_replace(' ','-',$this->input->post('answer')),
          'is_answer'      => ($this->input->post('is_answer') == "on") ? 1 : 0,
          'created'        => date('d-m-Y h:i:s'),
          'updated'        => date('d-m-Y h:i:s'),
          'status'         => 1
        ]);
        if($output == true){
           $this->session->set_flashdata('alert','<div class="alert alert-success">Answer Created</div>');
        }
        redirect('admin/answer');
    }
    $this->page([
      'section'    => 'create',
      'page'       => 'admin/answers',
      'question'   => $this->all('questions'),
      'category'   => $this->all('category'),
      'courses'    => $this->all('course')
    ]);
  }

  /****** Remove Answer ********/

  function delete(){
       $this->remove('questions',['id' => $this->uri->segment(4)]);
       redirect('admin/answer');
  }

}
?>
