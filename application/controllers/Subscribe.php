<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends Base {

  use checkAuth;

	function __construct(){
		parent::__construct();
		$this->load->model('welcome_model');
	}

  function plan(){

  }

}
  ?>
