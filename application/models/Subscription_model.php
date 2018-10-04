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


}
 ?>
