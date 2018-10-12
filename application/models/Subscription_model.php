<?php
Class Subscription_model extends CI_Model{

  function hasSubscription($userId){
    $query = $this->db->select('id')
                      ->from('subscription')
                      ->where('valid_upto =< '.date('d-m-Y'))
                      ->get();
    if($query->num_rows() > 0){
      return true;
    }
  }

  function paid_subscribers(){
    $query = $this->db->select('subscription.*,CONCAT(userDetail.first_name," ",userDetail.last_name) as fullName,status.status_name as statusName,subscription_plans.plan_title as plan_title')
                      ->from('subscription')
                      ->join('userDetail','userDetail.user_id=subscription.user_id','left')
                      ->join('subscription_plans','subscription_plans.id=subscription.plan_id','left')
                      ->join('status','status.id=subscription.status','left')
                      ->get();
    if($query->num_rows() > 0){
      return $query->result_array();
    }
  }


}
 ?>
