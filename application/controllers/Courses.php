<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends Base {

  use checkAuth;

	function __construct(){
		parent::__construct();
		$this->load->model('courses_model');
	}

	public function index()
	{
		$this->page([
      'page' => 'course'
    ]);
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
