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


}
 ?>
