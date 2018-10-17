<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends Base {

  use checkAuth;

	function __construct(){
		parent::__construct();
		$this->load->model('welcome_model');
		$this->load->model('quiz_model');
		$this->load->model('crud_model');
    $this->load->model('report_model');
    $this->load->model('courses_model');
    $this->load->helper('common');
    $data['reports'] = [
      'total_course' => $this->report_model->total_course(),
      'total_quiz'   => $this->report_model->total_questions(),
      'quiz_taken'   => $this->report_model->quiz_taken(),
      'course_taken' => $this->report_model->course_taken()
    ];
    $this->common = $data;
	}

	public function index()
	{
    $data['courses'] = $this->courses_model->trendingCoursesByCategory();
		$this->page(array_merge([
      'page' => 'quiz'
    ],$this->common,$data));
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

  function saveRemainingQuizTimer(){
      $this->update('quiz',['quiz_session_id' => $this->session->userdata('quiz_session_id')],[
        'no_of_questions_attempted' => $this->input->post('no_of_questions_attempted'),
        'time_started' => $this->input->post('time_started'),
        'time_ended' => $this->input->post('time_ended')
     ]);
     return true;
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
?>
