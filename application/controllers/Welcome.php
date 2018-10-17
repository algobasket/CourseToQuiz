<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class Welcome extends Base {

  use checkAuth;

	function __construct(){
		parent::__construct();
		$this->load->model('welcome_model');
		$this->load->model('report_model');
		$this->load->model('auth_model');
		$this->load->model('courses_model');
		$this->load->model('quiz_model');
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
		$this->page(array_merge([
      'page' => 'welcome'
    ],$this->common));
	}

	public function myAccount(){
    $this->page([
      'page' => 'account',
      'section' => 'myAccount',
      'profile' => $this->user_model->getUserInfo($this->session->userdata('userId'))
    ]);
	}

  public function myProfile(){
    if($this->input->post('profileSubmit')){
          // if($this->auth_model->isUsernameAvailable($this->input->post('username')) == true){
          //   $this->session->flashdata('alert','<div class="alert alert-danger">Username Already Taken !</div>');
          //   redirect('welcome/myProfile');
          // }else{
          //    if($this->auth_model->isEmailAvailable($this->input->post('email')) == true){
          //
          //    }else{
          //
          //    }
          //
          // }
          $this->update('user',['id' => $this->session->userdata('userId')],[
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email')
          ]);
          $this->update('userDetail',['user_id' => $this->session->userdata('userId')],[
            'first_name'   => $this->input->post('first_name'),
            'last_name'    => $this->input->post('last_name'),
            'phone_number' => $this->input->post('phone_number')
          ]);
          $this->session->set_flashdata('alert','<div class="alert alert-success">Profile Updated !</div>');
          redirect('welcome/myProfile');
    }
    $this->page([
      'page' => 'account',
      'section' => 'myProfile',
      'profile' => $this->user_model->getUserInfo($this->session->userdata('userId'))
    ]);
	}


  public function passwordChangeAjax(){
    if($this->input->post('new_password')){
        $status = $this->auth_model->currentUserPassword($this->session->userdata('userId'),md5($this->input->post('new_password')));
        if($status == true){
          echo '<div class="alert alert-warning">Current Password Same As The New Password ! </div>';
        }else{
          $this->update('user',['id' => $this->session->userdata('userId')],[
            'password' => md5($this->input->post('new_password'))
          ]);
          echo '<div class="alert alert-success">Password Changed ! </div>';
        }
    }else{
      echo '<div class="alert alert-warning"> Please enter your new password ! </div>';
    }
  }

  public function isUsernameAvailable(){
     if($this->auth_model->isUsernameAvailable($this->input->post('username')) == true)
     {
       echo "<label class='badge badge-danger'>Already Taken !</label>";
     }else{
       echo "<label class='badge badge-success'>Available !</label>";
     }
  }

  public function isEmailAvailable(){
     if($this->auth_model->isEmailAvailable($this->input->post('email')) == true)
     {
       echo "<label class='badge badge-danger'>Already Taken !</label>";
     }else{
       echo "<label class='badge badge-success'>Available !</label>";
     }
  }


  public function setting(){
    if($this->input->post('changeUserSetting')){
        $data['setting'] = json_encode([
            'notification'      => ($this->input->post('notification') == "on") ? 1 : 0,
            'mobNotification'   => ($this->input->post('mobNotification') == "on") ? 1 : 0,
            'userQuizPublic'    => ($this->input->post('userQuizPublic') == "on") ? 1 : 0,
            'deactivateAccount' => ($this->input->post('deactivateAccount') == "on") ? 1 : 0
        ],true);
        $this->update('userDetail',['user_id' => $this->session->userdata('userId')],$data);
        $this->session->set_flashdata('alert','<div class="alert alert-success">Setting Updated !</div>');
        redirect('welcome/setting');
    }
    $this->page([
      'page'    => 'account',
      'section' => 'setting',
      'setting' => $this->user_model->userSetting($this->session->userdata('userId'))
    ]);
  }

	public function myQuiz(){
    $data['quizHistory'] = $this->quiz_model->quizHistory($this->session->userdata('userId'));
    $this->page(array_merge([
      'page' => 'quiz-taken',
      'section' => 'quizTakenList',
    ],$this->common,$data));
	}

  public function quizHistoryReport(){
    $quizSessionId = $this->uri->segment(2);
    $data['quizHistoryReport'] = $this->quiz_model->quizHistoryReport($this->session->userdata('userId'),$quizSessionId);
    $this->page(array_merge([
      'page' => 'quiz-taken',
      'section' => 'quizHistoryReport',
    ],$this->common,$data));
  }

  public function downloadResult(){
    require APPPATH ."libraries/html2pdf/vendor/autoload.php";

try {
    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    ob_start();
    $title = "Quiz Report";
    include APPPATH .'libraries/html2pdf/examples/res/example01.php';
    $content = ob_get_clean();
    $html2pdf->writeHTML($content);
    //$html2pdf->createIndex('Quiz Report', 30, 12, false, true, 2, null, '10mm');
    $html2pdf->output('about.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
  }

	public function myCourse(){
    $data['courses'] = $this->courses_model->userCourse($this->session->userdata('userId'));
    $this->page(array_merge([
      'page' => 'course-taken'
    ],$this->common,$data));
	}

  public function myExam(){
    $this->page(array_merge([
      'page' => 'exam-taken'
    ],$this->common));
	}

  public function myBookmark(){
    $this->page(array_merge([
      'page' => 'bookmark'
    ],$this->common));
	}

  public function myCertification(){
    $this->page(array_merge([
      'page' => 'certification'
    ],$this->common));
	}

}
