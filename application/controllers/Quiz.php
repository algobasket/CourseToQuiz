<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends Base {

  use checkAuth;

	function __construct(){
		parent::__construct();
		$this->load->model('welcome_model');
		$this->load->model('quiz_model');
		$this->load->model('crud_model');
	}

	public function index()
	{
		$this->page([
      'page' => 'quiz'
    ]);
	}

  function saveQuizEachQuestionAnswers(){
     $question_json = json_decode($this->input->post('questions_hidden'),true);
     $answer_json   = json_decode($this->input->post('answers_hidden'),true);

     $data = [
       'quiz_session_id' => $this->session->userdata('quiz_session_id'),
       'user_id'         => $this->session->userdata('userId'),
       'question_id'     => $question_json[0]['id'],
       'option_id'       => $this->input->post('choosen_answer_option_id'),
       'is_correct'      => $this->quiz_model->isCorrectOption($this->input->post('choosen_answer_option_id')),
       'question_json'   => $this->input->post('questions_hidden'),
       'answer_json'     => $this->input->post('answers_hidden'),
       'created'         => date('d-m-Y h:i:s'),
       'updated'         => date('d-m-Y h:i:s'),
       'status'          => 1
     ];
     $this->create('user_answers',$data);
  }


  function quizData(){
      $data['getQuizData'] = $this->quiz_model->getQuizData($this->input->post('start'));
      $data['question_number'] = $this->input->post('questionNo');
      echo $this->load->view('ajax/generateDynamicQuizData.php',$data,true);
  }



  function quizComplete(){
    $this->quiz_model->saveUserQuizData();
  }


}
