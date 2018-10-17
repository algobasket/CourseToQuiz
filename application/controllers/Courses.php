<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends Base {

  use checkAuth;

	function __construct(){
		parent::__construct();
		$this->load->model('courses_model');
    $this->load->model('report_model');
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
      'page' => 'course'
    ],$this->common,$data));
	}

  public function search(){
     if($this->uri->segment(3)){
        $course_name = $this->uri->segment(3);
        $output = $this->one('course',['course_name' => $course_name]);
        $this->page([
          'page' => 'course-detail',
          'data' => $output
        ]);
     }
  }

  public function searchCourseAjax(){
     $text = $this->input->post('text');
     $out = $this->courses_model->searchCourse($text);
     if(is_array($out)){
       foreach($out as $r){
         echo '<a href="'.base_url().'courses/search/'.$r['course_name'].'"><li class="list-group-item courseSelected">'.$r['course_title'].'</li></a>';
       }
     }else{
        echo '<li class="list-group-item">No Course Found</li>';
     }
  }

}
