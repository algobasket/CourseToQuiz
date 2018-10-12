<?php
class Question_answer_model extends CI_Model{
   function __construct(){
     parent::__construct();
   }

   // Get User Info
    function getAllQuestion(){
       $q = $this->db->select('questions.*,course.course_title,category.category_title')
                     ->from('questions')
                     ->join('category','category.id = questions.category_id','left')
                     ->join('course','course.id = questions.course_id','left')
                     ->get();
     return $q->result_array();
    }

    function getOneQuestion($id){
       $q = $this->db->select('questions.*,course.course_title,category.category_title')
                     ->from('questions')
                     ->join('category','category.id = questions.category_id','left')
                     ->join('course','course.id = questions.course_id','left')
                     ->where('questions.id',$id)
                     ->get();
     return $q->result_array();
    }

    function getRandomOptions($questionId){
      $q = $this->db->select('question_options.*,course.course_title,category.category_title')
                    ->from('question_options')
                    ->join('category','category.id = questions.category_id','left')
                    ->join('course','course.id = questions.course_id','left')
                    ->where('course','course.id = questions.course_id','left')
                    ->get();
    return $q->result_array();
    }

    function getAllAnswers(){
      $q = $this->db->select('options.*,questions.question_title')
                    ->from('options')
                    ->join('questions','questions.id = options.question_id','left')
                    ->get();
    return $q->result_array();
    }

    function getOneAnswer($id){
      $q = $this->db->select('options.*,questions.question_title')
                    ->from('options')
                    ->join('questions','questions.id = options.question_id','left')
                    ->where('questions.id',$id)
                    ->get();
    return $q->result_array();
    }


}
 ?>
