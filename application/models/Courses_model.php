<?php
class Courses_model extends CI_Model{
   function __construct(){
     parent::__construct();
   }

   // Get User Info
    function getAllCourses(){
       $q = $this->db->select('course.*,category.category_title')
                     ->from('course')
                     ->join('category','category.id = course.category_id','left')
                     ->get();
     return $q->result_array();
    }

    function oneCourse($id){
      $q = $this->db->select('course.*,category.category_title')
                    ->from('course')
                    ->join('category','category.id = course.category_id','left')
                    ->where('course.id',$id)
                    ->get();
    return $q->result_array();
    }


    function oneCourseFromName($name){
      $q = $this->db->select('course.*,category.category_title')
                    ->from('course')
                    ->join('category','category.id = course.category_id','left')
                    ->where('course.course_name',$name)
                    ->get();
    return $q->result_array();
    }

    function searchCourse($text){
      $q = $this->db->select('course.*,category.category_title,category.category_name')
                    ->from('course')
                    ->join('category','category.id = course.category_id','left')
                    ->like('course.course_title',$text,'both')
                    ->or_like('category.category_title',$text,'both')
                    ->get();
    return $q->result_array();
    }

    function coursesByCategory($name){
      $q = $this->db->select('course.*,category.category_title')
                    ->from('course')
                    ->join('category','category.id = course.category_id','left')
                    ->or_like('category.category_name',$name,'both')
                    ->get();
    return $q->result_array();
    }

    function trendingCoursesByCategory(){
      $q = $this->db->select('course.*,category.category_title')
                    ->from('course')
                    ->join('category','category.id = course.category_id','left')
                    ->get();
    return $q->result_array();
    }

    function searchCourseByCategoryAjax($cat_name,$text){
      $q = $this->db->select('course.*,category.category_title,category.category_name')
                    ->from('course')
                    ->join('category','category.id = course.category_id','left')
                    ->where('category.category_name',$cat_name)
                    ->like('course.course_title',$text,'both')
                    ->get();
    return $q->result_array();
    }

    function getCourseIdFromCourseName($courseName){
       $query = $this->db->query('select id from course where course_name = ?',array($courseName));
       return $query->result_array()[0]['id'];
    }

    function getCourseChapters($courseName){
       $courseId = $this->getCourseIdFromCourseName($courseName);
       $query = $this->db->select('course_chapters.*,status.status_name as statusName')
                         ->from('course_chapters')
                         ->join('status','status.id = course_chapters.status','left')
                         ->where('course_chapters.course_id',$courseId)
                         ->get();
        return $query->result_array();
    }

    function getCourseVideos($courseName){
       $courseId = $this->getCourseIdFromCourseName($courseName);
       $query = $this->db->select('course_videos.*,status.status_name as statusName')
                         ->from('course_videos')
                         ->join('status','status.id = course_videos.status','left')
                         ->where('course_videos.course_id',$courseId)
                         ->get(); 
        return $query->result_array();
    }

    function userCourse($userId){
      $query = $this->db->select('course.*')
                        ->from('user_course')
                        ->join('course','course.id = user_course.course_id','left')
                        ->join('status','status.id = user_course.status','left')
                        ->where('user_course.user_id',$userId)
                        ->get();
       return $query->result_array();
    }

}
 ?>
