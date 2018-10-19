<?php
if( ! function_exists('hasSubscription')){
  function hasSubscription($userId,$planId){
    $ci = get_instance();
    $ci->load->model('subscription_model');
    $return = $ci->subscription_model->hasSubscription($userId,$planId);
    return $return;
  }
}

if( ! function_exists('quizType')){
   function quizType($typeId){
     return ($typeId == 1) ? "<label class='badge badge-success'>Real</label>" : "<label class='badge badge-warning'>Test</label>";
   }
}


?>
