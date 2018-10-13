<?php
class Welcome extends Base
{
   use checkAuth;

  function __construct()
  {
    parent::__construct();
    $this->load->model('report_model');
  }

  function index(){
    $data['userReports'] = [
      'total_user'   => $this->report_model->total_user(),
      'blocked_user' => $this->report_model->blocked_user(),
      'online_user'  => $this->report_model->online_user()
    ] ;
    $data['quizReports'] = [
      'total_quiz'   => $this->report_model->total_quiz(),
      'total_questions' => $this->report_model->total_questions(),
      'total_answers_given'  => $this->report_model->total_answers_given()
    ] ;
    $data['courseReports'] = [
      'total_course'   => $this->report_model->total_course(),
      'total_course_subscribed' => $this->report_model->total_course_subscribed()
    ];
    $data['paymentReports'] = [
      'total_payment'   => $this->report_model->total_payment(),
      'pending_payment' => $this->report_model->pending_payment(),
      'failed_payment'  => $this->report_model->failed_payment()
    ];
     // print_r($data);die;
    $this->page(array_merge(['page' => 'admin/dashboard'],$data));
  }

  



}
?>
