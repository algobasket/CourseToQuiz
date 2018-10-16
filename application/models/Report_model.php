<?php
class Report_model extends CI_Model{

  // ***** Users Reports  *******

  // Total Users
  function total_user(){
     $query = $this->db->get('user');
     return $query->num_rows();
  }

  // Blocked Users
  function blocked_user(){
     $query = $this->db->where('status',3)->get('user');
     return $query->num_rows();
  }

  // Online Users
  function online_user(){
     $query = $this->db->where('is_online',1)->get('user');
     return $query->num_rows();
  }

  // ***** Quiz Reports  *******

  // Total Quiz
  function total_quiz(){
     $query = $this->db->get('quiz');
     return $query->num_rows();
  }

  // Total Questions
  function total_questions(){
     $query = $this->db->get('questions');
     return $query->num_rows();
  }

  // Total Answers Given
  function total_answers_given(){
     $query = $this->db->get('user_answers');
     return $query->num_rows();
  }

  // ***** Course Reports  *******

  // Total Course
  function total_course(){
     $query = $this->db->get('course');
     return $query->num_rows();
  }

  // Total Course Taken
  function total_course_subscribed(){
     $query = $this->db->get('subscription');
     return $query->num_rows();
  }


  // ***** Payment Reports  *******

  // Total payments
  function total_payment(){
     $query = $this->db->get('payment');
     return $query->num_rows();
  }

  // Total pending payment
  function pending_payment(){
     $query = $this->db->where('status',5)->get('payment');
     return $query->num_rows;
  }

  // Payment Failed
  function failed_payment(){
     $query = $this->db->where('status',6)->get('payment');
     return $query->num_rows();
  }

  // QUiz
  function quiz_taken(){
    $query = $this->db->where([
      'status'  => 1,
      'user_id' => $this->session->userdata('userId')
      ])->get('quiz');
    return $query->num_rows();
  }

  function course_taken(){
    $query = $this->db->where([
      'status'  => 1,
      'user_id' => $this->session->userdata('userId')
      ])->get('user_course');
    return $query->num_rows();
  }

}
 ?>
