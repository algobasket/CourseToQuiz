<?php
if( ! function_exists('quizTime')){
  function quizTime(){
    $ci = get_instance();
    $ci->load->model('setting_model');
    return $ci->setting_model->quizTime();
  }
}
 ?>
