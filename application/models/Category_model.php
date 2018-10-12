<?php
class Category_model extends CI_Model{
   function __construct(){
     parent::__construct();
   }

   // Get User Info
    function getAllCategory(){

    }

    function create($data){
       $this->db->insert('category');
    }


}
 ?>
