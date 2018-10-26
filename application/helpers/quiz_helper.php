<?php
if( ! function_exists('quizTime')){
  function quizTime(){
    $ci = get_instance();
    $ci->load->model('setting_model');
    return $ci->setting_model->quizTime();
  }
}

if( ! function_exists('courseRating')){
  function courseRating($course_id){
    $ci = get_instance();
    $ci->load->model('quiz_model');
    return $ci->quiz_model->courseRating($course_id);
  }
}
 ?>
