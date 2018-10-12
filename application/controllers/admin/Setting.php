<?php
class Setting extends Base{
   function __construct(){

   }

   function maintainance(){
      $this->page([
        'section' => 'list',
        'page'    => 'admin/maintainanceSetting'
      ]);
   }


   function payment(){
     $this->page([
       'section' => 'list',
       'page'    => 'admin/paymentSetting'
     ]);
   }

}
?>
