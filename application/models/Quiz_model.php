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

    function forkCourse($courseName,$userId){
       $courseId = $this->getCourseIdFromCourseName($courseName);
       $query = $this->db->where('course_id',$courseId)->get('user_course');
       if($query->num_rows() == 0){
          $this->db->insert('user_course',[
            'user_id'   => $userId,
            'course_id' => $courseId,
            'created'   => date('d-m-Y h:i:s'),
            'updated'   => date('d-m-Y h:i:s'),
            'status'    => 1,
          ]);
       }
    }

    function isCourseForked($courseName,$userId){
      $courseId = $this->getCourseIdFromCourseName($courseName);
      $query = $this->db->where(['course_id' => $courseId,'user_id' => $userId])->get('user_course');
      if($query->num_rows() == 1){
        return true;
      }
    }

    function courseSubscribers($courseName){
      $courseId = $this->getCourseIdFromCourseName($courseName);
      $query = $this->db->where('course_id',$courseId)->get('user_course');
      return $query->num_rows();
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

    function total_questions($courseName){
       $course_id = $this->getCourseIdFromCourseName($courseName);
       $query = $this->db->where('course_id',$course_id)->get('questions');
       return $query->num_rows();
    }

    function isCourseQuizAvailable($courseId){
      $query = $this->db->where('course_id',$courseId)->get('questions');
      if($query->num_rows() > 0){
        return true;
      }
    }

    function isCorrectOption($optionId){
       $query = $this->db->where(array('id' => $optionId,'is_answer' => 1))->get('options');
       if($query->num_rows() == 1){
         return 1;
       }else{
         return 0;
       }
    }

    function quizHistory($userId){
        $query = $this->db->query("select * from quiz where user_id = ?",array($userId));
        if($query->num_rows() > 0){
           foreach($query->result_array() as $r){
               $quizDate              = $r['created'];
               $quiz_session_id       = $r['quiz_session_id'];
               $course_detail         = $this->getCourseFromId($r['course_id']);
               $totalQuestionSelected = $this->totalQuestionSelected($r['quiz_session_id']);
               $totalQuizTime         =  $r['time_started'];
               $timeTakenForQuiz      = $r['time_ended'];
               $questionAttempted     = $r['no_of_questions_attempted'];
               $correctAnswered       = $this->correctAnswered($r['quiz_session_id']);
               $wrongAnswered         = $this->wrongAnswered($r['quiz_session_id']);
               $scored                = round($this->scored($correctAnswered,$totalQuestionSelected),2);

               $data[] = [
                 'quizDate'              => $quizDate,
                 'quizSessionId'         => $quiz_session_id,
                 'course_detail'         => $course_detail,
                 'totalQuestionSelected' => $totalQuestionSelected,
                 'totalQuizTime'         => $totalQuizTime,
                 'timeTakenForQuiz'      => $timeTakenForQuiz,
                 'questionAttempted'     => $questionAttempted,
                 'correctAnswered'       => $correctAnswered,
                 'wrongAnswered'         => $wrongAnswered,
                 'scored'                => $scored
               ];
           }
           return $data;
        }
    }

    function quizHistoryReport($userId,$quizSessionId){
        $query = $this->db->query("select * from quiz where user_id = ? AND quiz_session_id = ?",array($userId,$quizSessionId));
        if($query->num_rows() > 0){
           foreach($query->result_array() as $r){
               $quizDate              = $r['created'];
               $quiz_session_id       = $r['quiz_session_id'];
               $course_detail         = $this->getCourseFromId($r['course_id']);
               $totalQuestionSelected = $this->totalQuestionSelected($r['quiz_session_id']);
               $totalQuizTime         =  $r['time_started'];
               $timeTakenForQuiz      = $r['time_ended'];
               $questionAttempted     = $r['no_of_questions_attempted'];
               $correctAnswered       = $this->correctAnswered($r['quiz_session_id']);
               $wrongAnswered         = $this->wrongAnswered($r['quiz_session_id']);
               $scored                = round($this->scored($correctAnswered,$totalQuestionSelected),2);
               $questionsAnswers      = $this->questionsAnswersFromSessionId($quiz_session_id);

               $data[] = [
                 'quizDate'              => $quizDate,
                 'quizSessionId'         => $quiz_session_id,
                 'course_detail'         => $course_detail,
                 'totalQuestionSelected' => $totalQuestionSelected,
                 'totalQuizTime'         => $totalQuizTime,
                 'timeTakenForQuiz'      => $timeTakenForQuiz,
                 'questionAttempted'     => $questionAttempted,
                 'correctAnswered'       => $correctAnswered,
                 'wrongAnswered'         => $wrongAnswered,
                 'scored'                => $scored,
                 'questionsAnswers'      => $questionsAnswers
               ];
           }
           return $data;
        }
    }

    function questionsAnswersFromSessionId($sessionId){
      $query = $this->db->select('question_json,answer_json')
                        ->where('quiz_session_id',$sessionId)
                        ->from('user_answers')
                        ->get();
      return $query->result_array();
    }

    function scored($correctAnswered,$totalQuestionSelected){
      return $correctAnswered / $totalQuestionSelected * 100;
    }

    function totalQuestionSelected($quiz_session_id){
      $query = $this->db->where('quiz_session_id',$quiz_session_id)->get('user_answers');
      return $query->num_rows();
    }

    function correctAnswered($quiz_session_id){
      $query = $this->db->where(['quiz_session_id' => $quiz_session_id,'is_correct' => 1])
                        ->get('user_answers');
      return $query->num_rows();
    }

    function wrongAnswered($quiz_session_id){
      $query = $this->db->where(['quiz_session_id' => $quiz_session_id,'is_correct' => 0])
                        ->get('user_answers');
      return $query->num_rows();
    }

    function getCourseFromId($courseId){
      $query = $this->db->where('id',$courseId)->get('course');
      return $query->result_array();
    }

    function saveUserQuizData(){

    }

}
 ?>
