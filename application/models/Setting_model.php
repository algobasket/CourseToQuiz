<?php
class Setting_model extends CI_Model{

   function maintainance(){}

   function quizTime(){
     $query = $this->db->where(['setting_type' => 'quiz_time'])->get('setting');

      if($query->num_rows() > 0){
        foreach($query->result_array() as $r)
        return json_decode($r['json_data'],true);
      }
    }



}
 ?>
