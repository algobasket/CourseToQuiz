<?php if($section=="emailForm") : ?>
<div class="bgImageJumbotron">
   <br><br><br>
	 <form class="form-signin" method="POST" action="<?php echo base_url(); ?>auth/forgot" style="background-color:#fff;padding:40px">
		 <h1 class="h3 mb-3 font-weight-normal text-center">Reset Password</h1>
     <?php echo $this->session->flashdata('alert');?>
    <div class="form-group">
		  <label for="inputEmail" class="sr-only">Email address</label>
		  <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Enter Your Email Address" required autofocus>
	   </div>
		 <input class="btn btn-lg btn-primary btn-block" style="background-color:#ff5a5e" type="submit" name="submit" value="Send Verification Link" />
    <center>-OR-</center>

     <br>
		 <center>Don't have an account? <a href="<?php echo base_url();?>auth/register">SIGN UP</a></center>
      <br>
		 <center>Have Login ? <a href="<?php echo base_url();?>auth/login">SIGN IN</a></center>

	 </form>
 <br><br><br>
 </div>
<?php endif ?>

<?php if($section=="passwordForm") : ?>
<div class="bgImageJumbotron">
   <br><br><br>
	 <form class="form-signin" method="POST" action="<?php echo base_url(); ?>auth/newPassword/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>" style="background-color:#fff;padding:40px">
		 <h1 class="h3 mb-3 font-weight-normal text-center">Change Your Password</h1>
		 <?php echo $this->session->flashdata('alert');?>
      <div class="form-group">
		 <label for="inputFirstName"  class="sr-only">New Password</label>
		 <input type="text" name="newPassword" class="form-control form-control-lg" placeholder="New Password" required autofocus>
	    </div>

	   <div class="form-group">
		 <label for="inputRepeatPassword" class="sr-only">Repeat Password</label>
 		 <input type="password" id="inputRepeatPassword" name="re-newPassword" class="form-control" placeholder="Repeat Password" required>
	 </div>

		 <input class="btn btn-lg btn-primary btn-block" style="background-color:#ff5a5e" type="submit" value="UPDATE" name="submit"/>
    <center>-OR-</center>

		 <center>Don't have an account? <a href="<?php echo base_url();?>auth/register">SIGN UP</a></center>
      <br>

	 </form>
 <br><br><br>
 </div>
<?php endif ?>
