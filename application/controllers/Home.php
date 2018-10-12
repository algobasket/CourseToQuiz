<?php
 class Home extends CI_Controller{



   function __construct(){
     parent::__construct();
     $this->load->model('courses_model');
     $this->load->model('quiz_model');
     $this->load->model('crud_model');
     $this->load->helper('subscription_helper');
   }




   function index(){
      $courses = $this->courses_model->trendingCoursesByCategory();
      $this->load->view('template/content',[
        'page' => 'landing',
        'courses' => $courses
      ]);
   }



   function browse_course(){
     if(@$_GET['category']){
       $courses = $this->courses_model->coursesByCategory(@$_GET['category']);
     }else{
       $courses = $this->courses_model->trendingCoursesByCategory();
     }
      $this->load->view('template/content',[
        'page' => 'browse-course',
        'categories' => $this->crud_model->getAllRecord('category'),
        'courses' => $courses
      ]);
   }




   function show_course(){
     if($this->uri->segment(2)){
       $course = $this->courses_model->oneCourseFromName($this->uri->segment(2));
     }
      $this->load->view('template/content',[
        'page' => 'show-course',
        'course' => $course
      ]);
   }



   function browse_quiz(){
        $this->load->view('template/content',['page' => 'browse-quiz']);
   }



   function membership_plan(){
     $this->load->view('template/content',[
       'page' => 'membership-plan'
     ]);
   }


   function searchCourseByCategoryAjax(){
      $out = $this->courses_model->searchCourseByCategoryAjax($this->input->post('category'),$this->input->post('text'));
      if(is_array($out)){
        foreach($out as $r){
          echo '<a href="'.base_url().'browse-course/?course='.$r['course_name'].'"><li class="list-group-item courseSelected">'.$r['course_title'].'</li></a>';
        }
      }else{
         echo '<li class="list-group-item">No Course Found</li>';
      }
   }



   function show_quiz(){
      if($this->uri->segment(2)){
         $course = $this->courses_model->oneCourseFromName($this->uri->segment(2));
      }
      $this->load->view('template/content',[
        'page' => 'show-quiz',
        'course' => $course
      ]);
   }



   function start_quiz(){
     if(!$this->session->userdata('userId')){
       $this->session->set_userdata('redirectAfterLogin',base_url().'start-quiz/?'.$_SERVER['QUERY_STRING']);
       redirect('auth/login');
     }
     $this->session->unset_userdata('redirectAfterLogin');
     // Starting Quiz
     $quizData = [
       'level'    => $_GET['level'],
       'course'   => $_GET['course'],
       'quizType' => $_GET['QuizType']
     ];
     $this->session->set_userdata($quizData);
     $this->load->view('template/content',[
       'page'      => 'start-quiz',
       'quizData'  => $quizData,
       'quizDuration' => 15,
       'totalQuestions'  => 30
     ]);
   }







 }
?>
