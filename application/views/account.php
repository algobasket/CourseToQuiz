<style>
.starter-template {
  padding: 3rem 1.5rem;
}
</style>
<?php if($section == "myAccount"): ?>
  <main role="main" class="container">
         <?php foreach($profile as $user){} ?>
        <div class="starter-template">
          <h1>Account Info</h1>
          <div class="form">
            <div class="form-group">
             <label>First Name</label>
              <h3><?php echo $user['first_name'];?></h3>
            </div>
            <div class="form-group">
             <label>Last Name</label>
              <h3><?php echo $user['last_name'];?>  </h3>
            </div>
            <div class="form-group">
             <label>Username</label>
               <h3><?php echo $user['username'];?> </h3>
            </div>
            <div class="form-group">
             <label>Email ID </label>
             <h3><?php echo $user['email'];?> </h3>
            </div>
            <div class="form-group">
              <a href="<?php echo base_url();?>welcome/myProfile" class="btn btn-secondary">Change My Profile</a>
            </div>
          </div>
        </div>

      </main>
<?php endif ?>

<?php if($section == "myProfile"): ?>
  <?php foreach($profile as $user){} ?>
  <main role="main" class="container">

    <div class="starter-template">
      <h1>My Profile</h1>
      <?php echo $this->session->flashdata('alert');?>
      <div class="form">
        <?php echo form_open('welcome/myProfile');?>
          <div class="form-group">
           <label>First Name</label>
           <input type="text" class="form-control" value="<?php echo $user['first_name'];?>" name="first_name" placeholder="First Name" required/>
          </div>
          <div class="form-group">
           <label>Last Name</label>
           <input type="text" class="form-control" value="<?php echo $user['last_name'];?>" name="last_name" placeholder="Last Name" required/>
          </div>
          <div class="form-group">
           <label>Username - <a href="#" id="checkUsername">Check Availability</a><span id="checkUsernameAlert"></span></label>
           <input type="text" class="form-control usernameProfile" value="<?php echo $user['username'];?>" name="username" placeholder="Username" required/>
          </div>
          <div class="form-group">
           <label>Email ID - <a href="#" id="checkEmail">Check Availability</a><span id="checkEmailAlert"></span></label>
           <input type="email" class="form-control emailProfile" value="<?php echo $user['email'];?>" name="email" placeholder="Email" required/>
          </div>
          <div class="form-group">
           <label>Password </label>
             <a href="javascript:void(0)" class="btn btn-secondary" onclick="$('.openPasswordChangeModal').modal('show')">Change Password</a>
          </div>
          <div class="form-group">
           <label></label>
            <input type="submit" name="profileSubmit" class="btn btn-dark" value="Update Account"/>
          </div>
          <?php echo form_close();?>
      </div>
    </div>

   </main>

    <div class="modal openPasswordChangeModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <span id="passwordChangeAlert"></span>
             <div class="form-group">
              <label>New Password</label>
              <input type="text" class="form-control" id="new_password" placeholder="Enter Your Secured New Password"/>
             </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <a href="javascript:void(0)" class="btn btn-primary btn-sm changePassword">Change Password</a>
          </div>
        </div>
      </div>
    </div>
<?php endif ?>

<?php if($section == "setting"): ?>
  <main role="main" class="container">
   <?php $setting = json_decode($setting,true);?>
    <div class="starter-template">
      <h1>Setting</h1><br>
        <?php echo $this->session->flashdata('alert');?>
      <div class="form">
        <?php echo form_open('welcome/setting');?>
          <div class="form-group">
           <input type="checkbox" name="notification" <?php echo ($setting['notification'] == 1) ? "checked" : "";?> />
           <label> - Notification On</label> (If disabled notification of email or news updated won't be send)
          </div>
          <div class="form-group">
           <input type="checkbox" name="mobNotification" <?php echo ($setting['mobNotification'] == 1) ? "checked" : "";?> />
           <label> - Mobile Notification </label> (Send every payment notifications on my registered phone)
          </div>
          <div class="form-group">
           <input type="checkbox"  name="userQuizPublic" <?php echo ($setting['userQuizPublic'] == 1) ? "checked" : "";?> />
          <label> - Quiz Result Public</label> (All your quiz report will be public and users can see it)
          </div>
          <div class="form-group">
           <input type="checkbox"  name="deactivateAccount" <?php echo ($setting['deactivateAccount'] == 1) ? "checked" : "";?> />
            <label> - Deactivate</label> (Account will remain deactive for 30 days and you can also reactivate it in between)
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-secondary" name="changeUserSetting" value="Update Setting" />
          </div>
          <?php echo form_close();?>
      </div>
    </div>

      </main>
<?php endif ?>
