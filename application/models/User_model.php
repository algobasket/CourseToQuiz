<?php
class User_model extends CI_Model{


   function __construct(){
     parent::__construct();
   }

   // Get User Info
    function getUserInfo($userId){
      $q = $this->db->select('user.*,userDetail.first_name,userDetail.last_name')
                    ->from('user')
                    ->join('userDetail','user.id=userDetail.user_id','left')
                    ->where('user.id',$userId)
                    ->get();
      if($q->num_rows() == 1)
        return $q->result_array();
    }

    function getAllUserInfo($status = NULL){
      $this->db->select('user.*,userDetail.first_name,userDetail.last_name');
      $this->db->from('user');
      $this->db->join('userDetail','user.id=userDetail.user_id','left');
      $this->db->join('status','status.id=user.id','left');
      if($status == NULL){
        $this->db->where_in(['user.status' => array($status)]);
      }
      $q = $this->db->get();
      //echo $this->db->last_query();die;
      if($q->num_rows() > 0)
        return $q->result_array();
    }

   // Block User
    function blockUnblockUser($userId,$status){
      $this->db->where('id',$userId);
      $this->db->update('user',[ 'status' => $status ]);
      return true;
    }

    //Delete User
    function deleteUser(){
      $this->db->where('id',$userId);
      $this->db->delete('user',[ 'status' => $status ]);
      return true;
    }

   // Add User
   function addUser($data){
     $this->db->insert('user',[
       'username' => $data['username'],
       'email'    => $data['email'],
       'password' => md5($data['password']),
       'status'   => $data['status'],
     ]);
     $this->db->insert('userDetail',[
       'user_id'    => $this->db->insert(),
       'first_name' => $data['first_name'],
       'last_name'  => $data['last_name']
     ]);
     return true;
   }

   // Check user's account status
   function accountStatus($userId){
     $query = $this->db->select('status')->from('user')->where('id',$userId)->get();
     return @$query->result_array()[0]['status'];
   }

   function userSetting($userId){
     $query = $this->db->select('setting')->from('userDetail')->where('user_id',$userId)->get();
     return @$query->result_array()[0]['setting'];
   }

}
?>
