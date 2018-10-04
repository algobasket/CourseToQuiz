<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends Base {

  use checkAuth;

	function __construct(){
		parent::__construct();
		$this->load->model('welcome_model');
		$this->load->model('quiz_model');
	}

	public function index()
	{
		$this->page([
      'page' => 'quiz'
    ]);
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
