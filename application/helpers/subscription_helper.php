<?php
if( ! function_exists('hasSubscription')){
  function hasSubscription($userId){
    $ci = get_instance();
    $ci->load->model('Subscription');
    $return = $ci->subscription->hasSubscription($userId);
    return $return;
  }
}


?>
