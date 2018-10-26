<?php
 class Home extends CI_Controller{



   function __construct(){
     parent::__construct();
     $this->load->model('courses_model');
     $this->load->model('quiz_model');
     $this->load->model('crud_model');
     $this->load->model('report_model');
     $this->load->helper('subscription');
     $this->load->helper('common');
     $this->load->helper('quiz'); 

   }


   function index(){
      $courses = $this->courses_model->trendingCoursesByCategory();
      $this->load->view('template/content',[
        'page' => 'landing',
        'courses' => $courses,
        'total_course' => $this->report_model->total_course(),
        'total_quiz' => $this->report_model->total_quiz(),
        'total_member' => $this->report_model->total_user()
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
     if(@$_GET['action'] == "fork"){
       $this->quiz_model->forkCourse($this->uri->segment(2),$this->session->userdata('userId'));
       redirect('show-course/'.$this->uri->segment(2));
     }
      // print_r($this->courses_model->getCourseChapters($this->uri->segment(2)));die;
      $this->load->view('template/content',[
        'page'           => 'show-course',
        'course'         => $course,
        'isCourseForked' => $this->quiz_model->isCourseForked($this->uri->segment(2),$this->session->userdata('userId')),
        'courseSubscribers' => $this->quiz_model->courseSubscribers($this->uri->segment(2)),
        'courseChapters' => $this->courses_model->getCourseChapters($this->uri->segment(2)),
        'courseVideos' => $this->courses_model->getCourseVideos($this->uri->segment(2))
      ]);
   }



   function browse_quiz(){
     if(@$_GET['category']){
       $courses = $this->courses_model->coursesByCategory(@$_GET['category']);
     }else{
       $courses = $this->courses_model->trendingCoursesByCategory();
     }
      $this->load->view('template/content',[
        'page' => 'browse-quiz',
        'categories' => $this->crud_model->getAllRecord('category'),
        'courses' => $courses
      ]);
   }

   function test(){
     $this->load->view('test');
   }

   function membership_plan(){
     $moreData = array();
     if(array_key_exists("payment",$_GET)){
         if($this->session->userdata('userId')){
              if(hasSubscription($this->session->userdata('userId'),$_GET['planID']) == true){
                $this->session->set_flashdata("alert","<div class='alert alert-success'>You already has this membership active</div>");
                redirect('membership-plan');
              }else{

              }
         }else{
           $this->session->set_userdata('redirectAfterLogin',base_url().'membership-plan');
           redirect('auth/login');
         }
     }
     $this->load->view('template/content',[
       'page' => 'membership-plan',
       'membership_plans' => $this->crud_model->getAllRecord('subscription_plans')
     ],$moreData);
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
      $data['total_questions'] = $this->quiz_model->total_questions($this->uri->segment(2));
      $data['total_questions_level'] = $this->quiz_model->updateNoOfQuestionWithLevels('easy',$this->uri->segment(2));
      $this->load->view('template/content',array_merge([
        'page'   => 'show-quiz',
        'course' => $course
      ],$data));
   }

   function updateNoOfQuestionWithLevels(){
      $count = $this->quiz_model
                    ->updateNoOfQuestionWithLevels($this->input->post('selectLevel'),$this->input->post('coursename'));
     if($count > 0){
          echo '<option selected="true" disabled="disabled">No Of Questions</option>';
       for($i=1;$i<=$count;$i++){
          echo '<option value="'.$i.'">'.$i.'</option>';
       }
     }else{
          echo 0;
     }

   }

  function postFeedback(){
    $this->quiz_model->postFeedback(
      $this->input->post('courseName'),
      $this->session->userdata('userId'),
      $this->input->post('rating'),
      $this->input->post('comment'));
  }


   function start_quiz(){
     if(!$this->session->userdata('userId')){
       $this->session->set_userdata('redirectAfterLogin',base_url().'start-quiz/?'.$_SERVER['QUERY_STRING']);
       redirect('auth/login');
     }
     $this->session->unset_userdata('redirectAfterLogin');
     // Starting Quiz
     $quiz_session_id = md5(rand(1,9999).time());
     $quizData = [
       'quiz_session_id' => $quiz_session_id,
       'level'    => $_GET['level'],
       'course'   => $_GET['course'],
       'quizType' => $_GET['QuizType'],
       'noOfQuestions' => $_GET['noOfQuestions']
     ];
     $this->session->set_userdata($quizData);
     $this->crud_model->create('quiz',[
       'quiz_session_id' => $quiz_session_id,
       'quiz_title' => 'quiz started',
       'quiz_name'  => 'quiz-started',
       'user_id'    => $this->session->userdata('userId'),
       'course_id'  => $this->quiz_model->getCourseIdFromCourseName($_GET['course']),
       'jsonData'   => json_encode($quizData,true),
       'created'    => date('d-m-Y h:i:s'),
       'updated'    => date('d-m-Y h:i:s'),
       'status'     => 1
     ]);

     $this->load->view('template/content',[
       'page'            => 'start-quiz',
       'quizData'        => $quizData,
       'quizDuration'    => quizTime()['quiz_time'],
       'totalQuestions'  => $_GET['noOfQuestions']
     ]);
   }

  function license(){
    $this->load->view('template/content',[
      'page'      => 'site',
      'section'   => 'license'
    ]);
  }

  function subscription(){
    $this->load->view('template/content',[
      'page'      => 'site',
      'section'   => 'subscription'
    ]);
  }

  function legal_notice(){
    $this->load->view('template/content',[
      'page'      => 'site',
      'section'   => 'legal_notice'
    ]);
  }

  function privacy_policy(){
    $this->load->view('template/content',[
      'page'      => 'site',
      'section'   => 'privacy_policy'
    ]);
  }

  function about(){
    $this->load->view('template/content',[
      'page'      => 'site',
      'section'   => 'about'
    ]);
  }

  function contact(){
    $this->load->view('template/content',[
      'page'      => 'site',
      'section'   => 'contact'
    ]);
  }

  function faq(){
    $this->load->view('template/content',[
      'page'      => 'site',
      'section'   => 'faq'
    ]);
  }




 }
?>
