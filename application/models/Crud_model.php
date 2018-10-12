<?php
class Crud_model extends CI_Model{
   function __construct(){
     parent::__construct();
   }

   // Creating CRUD Operation

    function getAllRecord($tableName){
      $query = $this->db->select($tableName.'.*,status.status_name')
                        ->from($tableName)
                        ->join('status',$tableName.'.status = status.id','left')
                        ->get();
      return $query->result_array();
    }

    function getAllRecordNoJoin($tableName){
      $query = $this->db->select($tableName.'.*')
                        ->from($tableName)
                        ->get();
      return $query->result_array();
    }

    function getOneRecord($tableName,$query){
      $query = $this->db->select('*')
                       ->from($tableName)
                       ->where($query)
                       ->get();
      return $query->result_array();
    }

    function create($tableName,$insertArray){
       $this->db->insert($tableName,$insertArray);
       return true;
    }

    function update($tableName,$query,$updateArray){
       $this->db->where($query);
       $this->db->update($tableName,$updateArray);
       return true;
    }

    function delete($tableName,$query){
       $this->db->where($query);
       $this->db->delete($tableName);
       return true;
    }


}
?>
