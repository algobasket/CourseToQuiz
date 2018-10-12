<?php if($this->uri->segment(2)=="login") : ?>
<div class="bgImageJumbotron">
   <br><br><br>
	 <form class="form-signin" method="POST" action="<?php echo base_url(); ?>auth/login" style="background-color:#fff;padding:40px">
		 <h1 class="h3 mb-3 font-weight-normal text-center">Welcome back!</h1>
     <?php echo $this->session->flashdata('alert');?>
    <div class="form-group">
		  <label for="inputEmail" class="sr-only">Email address</label>
		  <input type="text" name="usernameOrEmail" id="inputEmail" class="form-control" placeholder="Email address or Username" required autofocus>
	   </div>
	   <div class="form-group">
		   <label for="inputPassword" class="sr-only">Password</label>
		   <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
     </div>
		 <div class="checkbox mb-3">
			 <label>
				 <input type="checkbox" value="remember-me"> Remember me
			 </label>
		 </div>
		 <input class="btn btn-lg btn-primary btn-block" style="background-color:#ff5a5e" type="submit" name="login" value="Sign In" />
    <center>-OR-</center>
		 <a href="<?php echo base_url();?>auth/facebook" class="btn btn-lg btn-primary btn-block" style="background-color:#2864a5">Facebook</a>
     <br>
		 <center>Don't have an account? <a href="<?php echo base_url();?>auth/register">SIGN UP</a></center>
      <br>
		 <center>Forgot your password? <a href="<?php echo base_url();?>auth/forgot">RESET IT</a></center>

	 </form>
 <br><br><br>
 </div>
<?php endif ?>

<?php if($this->uri->segment(2)=="register") : ?>
<div class="bgImageJumbotron">
   <br><br><br>
	 <form class="form-signin" method="POST" action="<?php echo base_url(); ?>auth/register" style="background-color:#fff;padding:40px">
		 <h1 class="h3 mb-3 font-weight-normal text-center">Create Account</h1>
		 <?php echo $this->session->flashdata('alert');?>
      <div class="form-group">
		 <label for="inputFirstName"  class="sr-only">First Name</label>
		 <input type="text" name="firstName" class="form-control form-control-lg" placeholder="First Name" required autofocus>
	    </div>
			  <div class="form-group">
		 <label for="inputLastName" class="sr-only">Last Name</label>
 		 <input type="text" id="inputLastName" name="lastName" class="form-control" placeholder="Last Name" required autofocus>
	 </div>
	    <div class="form-group">
		 <label for="inputEmail" class="sr-only">Email</label>
		 <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
	 </div>
	   <div class="form-group">
		 <label for="inputPassword" class="sr-only">Create Password</label>
		 <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
	 </div>
	   <div class="form-group">
		 <label for="inputRepeatPassword" class="sr-only">Repeat Password</label>
 		 <input type="password" id="inputRepeatPassword" name="re-password" class="form-control" placeholder="Repeat Password" required>
	 </div>
		 <div class="checkbox mb-3">
			 <label>
				 <input type="checkbox" value="remember-me"> <small>I have read and agree to the Terms of Service</small>
			 </label>
			 <label>
				 <input type="checkbox" value="remember-me"> <small>Send me notifications about new property and news updates</small>
			 </label>
		 </div>
		 <input class="btn btn-lg btn-primary btn-block" style="background-color:#ff5a5e" type="submit" value="SIGN UP" name="signup"/>
    <center>-OR-</center>
		 <button class="btn btn-lg btn-primary btn-block" style="background-color:#2864a5" type="submit">FACEBOOK</button>
     <br>
		 <center>Don't have an account? <a href="<?php echo base_url();?>auth/register">SIGN UP</a></center>
      <br>
		 <center>Forgot your password? <a href="<?php echo base_url();?>auth/forgot">RESET IT</a></center>

	 </form>
 <br><br><br>
 </div>
<?php endif ?>
