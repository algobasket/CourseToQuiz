<?php
 if( ! function_exists('jsonPreetify')){
   function jsonPreetify($data){ 
     return json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
   }
 }

 ?>
