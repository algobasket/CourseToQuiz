<?php
class Welcome extends Base
{
   use checkAuth;

  function __construct()
  {
    parent::__construct();
  }

  function index(){
    $this->page(['page' => 'admin/dashboard']);
  }

}
?>
