<?php
class Quiz_model extends CI_Model{
   function __construct(){
     parent::__construct();
   }

   // Get User Info
    function getAllQuiz(){
       $q = $this->db->select('quiz.*,course.course_title')
                     ->from('quiz')
                     ->join('course','course.id = quiz.course_id','left')
                     ->get();
     return $q->result_array();
    }

    function oneQuiz($id){
      $q = $this->db->select('quiz.*,course.course_title')
                    ->from('quiz')
                    ->join('course','course.id = quiz.course_id','left')
                    ->where('quiz.id',$id)
                    ->get();
    return $q->result_array();
    }

   function getCourseIdFromCourseName($courseName){
      $query = $this->db->query('select id from course where course_name = ?',array($courseName));
      return $query->result_array()[0]['id'];
   }

    function getQuizData($start){
       $course   = $this->session->userdata('course');
       $level    = $this->session->userdata('level');
       $quizType = $this->session->userdata('quizType');
       $course_id = $this->getCourseIdFromCourseName($course);

       $query = $this->db->select('questions.*')
                         ->from('questions')
                         ->where(['questions.course_id'=> $course_id,'questions.level' => $level,'real_or_test' => $quizType])
                         ->limit(1,$start)
                         ->get();
      $questionData = $query->result_array();

      //echo $this->db->last_query();
      //  print_r($questionData);die;

      foreach($questionData as $r)
      $question_id = $r['id']; 

      $query2 = $this->db->select('options.*')
                         ->from('options')
                         ->where(['is_answer' => 1,'question_id' => $question_id,'status' => 1])
                         ->get();
     $correctAnswerData = $query2->result_array();
      // Get Random Data
      $query3 = $this->db->select('options.*')
                         ->from('options')
                         ->where(['status' => 1])
                         ->order_by('id', 'RANDOM')
                         ->limit(3)
                         ->get();
      $randomAnswerData = $query3->result_array();
      $totalAnswerData = array_merge($randomAnswerData,$correctAnswerData);
      //shuffle($totalAnswerData);
      return array('questions' => $questionData ,'answers' => $totalAnswerData);
    }



    function saveUserQuizData(){

    }



}
 ?>
