<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Base {

  use checkAuth;

	function __construct(){
		parent::__construct();
		$this->load->model('welcome_model');
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
    $this->page([
      'page' => 'quiz-taken'
    ]);
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
