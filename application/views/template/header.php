<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>CourseToQuiz</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/album.css" rel="stylesheet">

    <!-- Custom css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vegas/vegas.min.css">
    <style>
      .btn{
        border-radius:0 !important;
      }
    </style>
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Recent News</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
                <li>
                  <a href="<?php echo base_url();?>auth/login" class="btn btn-primary">Login</a>
                  <a href="<?php echo base_url();?>auth/register" class="btn btn-primary">Signup</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="<?php echo base_url();?>" class="navbar-brand d-flex align-items-center">
            <strong><i class="fa fa-code"></i> CourseToQuiz</strong>
          </a>
          <?php if($this->session->userdata('userId')){ ?>
            <div class="dropdown">
             <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
               Account
             </button>
             <div class="dropdown-menu">
               <a class="dropdown-item" href="<?php echo base_url();?>welcome">Dashboard</a>
               <a class="dropdown-item" href="<?php echo base_url();?>welcome/myAccount">My Account</a>
               <a class="dropdown-item" href="<?php echo base_url();?>welcome/myProfile">My Profile</a>
               <a class="dropdown-item" href="<?php echo base_url();?>welcome/setting">Setting</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="<?php echo base_url();?>Logout">Signout</a>
             </div>
           </div>

        <?php }else{ ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <?php } ?>
        </div>
      </div>
    </header>

         <?php
         if($this->session->userdata('rolename')){
           $this->load->view('template/sidebar');
         }
         ?>
