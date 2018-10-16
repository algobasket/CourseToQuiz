<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Base {

  use checkAuth;

	function __construct(){
		parent::__construct();
		$this->load->model('welcome_model');
		$this->load->model('report_model');
	}

	public function index()
	{
		$this->page([
      'page' => 'welcome'
    ]);
	}

	public function account(){
    $this->page([
      'page' => 'account'
    ]);
	}

  public function profile(){
    $this->page([
      'page' => 'profile'
    ]);
	}

	public function myQuiz(){
    $data['reports'] = [
      'total_course' => $this->report_model->total_course(),
      'total_quiz' => $this->report_model->total_questions(),
      'quiz_taken' => $this->report_model->quiz_taken(),
      'course_taken' => $this->report_model->course_taken()
    ];
    $this->page(array_merge([
      'page' => 'quiz-taken'
    ],$data));
	}

	public function myCourse(){
    $this->page([
      'page' => 'course-taken'
    ]);
	}

  public function myExam(){
    $this->page([
      'page' => 'exam-taken'
    ]);
	}

  public function myBookmark(){
    $this->page([
      'page' => 'bookmark'
    ]);
	}

  public function myCertification(){
    $this->page([
      'page' => 'certification'
    ]);
	}

}
