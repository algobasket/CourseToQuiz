<style>
.list-group-item:hover{
  background-color:#ddd;
}
</style>

<div class="container-fluid">
<br>
  <h4 style="background:#ddd">&nbsp;&nbsp;&nbsp;&nbsp;
    <span>Welcome <?php echo $this->session->userdata('displayname') ? $this->session->userdata('displayname') : "Guest";?></span></h4>
  <br>
  <div class="row">

  <div class="col-md-12">
   <?php foreach($course as $r){
     $course_title = $r['course_title'];
     $course_name = $r['course_name'];
   } ?>

    <div class="card">
  <h5 class="card-header">QUIZ - <?php echo $course_title ;?></h5>
  <div class="card-body">
    <h3 class="card-title"><?php echo $course_title ;?><span class="float-right">Time 00:15:00</span></h3>
    <h5> - <?php echo $total_questions;?> multiple choice questions available</h5>
    <h5> - 15 minutes test time</h5>
    <p class="card-text">
    <?php echo $r['course_description'];?>
    </p>
     <h5>Select Difficult Level</h5>
     <select class="btn btn-outline-secondary btn-lg selectLevel">
       <option value="easy" select>Easy - Level One</option>
       <option value="medium">Medium - Level Two</option>
       <option value="hard">Hard - Level Three</option>
       <option value="complex">Complex - Level Four</option>
     </select>

     <h5>Select Number Of Questions</h5>
     <select class="btn btn-outline-secondary btn-lg selectLevel">
        <option disable>No Of Questions</option>
        <?php for($i = 1;$i<= $total_questions;$i++) : ?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php endfor ?>
     </select>
  </div>
</div>
<br>
  <?php
  if($this->session->userdata('userId')){
    if(hasSubscription() == true){
      $popupDiv = "QuizReadyConfirmation";
    }else{
      $popupDiv = "SubscriptionPopup";
    }
  }else{
      $popupDiv = "QuizReadyConfirmation";
  }
  ?>

  <h4>&nbsp;&nbsp;&nbsp;</h4>
  <div class="row">
<div class="col-sm-6">
 <div class="card">
   <div class="card-body">
     <h5 class="card-title">Real Quiz on <?php echo $course_title ;?></h5>
     <p class="card-text">After taking this live quiz you will get certified and you score will be stored</p>
     <a href="javascript:void(0)" data-quiztype="real"  class="btn btn-success QuizReadyConfirmation">Start Real Quiz</a>
     <span>&nbsp;&nbsp;&nbsp;Membership is required</span>
   </div>
 </div>
</div>

<div class="col-sm-6">
 <div class="card">
   <div class="card-body">
     <h5 class="card-title">Practise Quiz on <?php echo $course_title ;?></h5>
     <p class="card-text">Use this quiz option if you want to practise</p>
     <a href="javascript:void(0)" data-quiztype="practise" class="btn btn-warning QuizReadyConfirmation">Go Test Quiz</a>
   </div>
 </div>
</div>
</div>
<br>

  </div>
</div>
<input type="hidden" id="courseSelected" value="<?php echo $course_name;?>" />
</div>
<br><br>
<div class="modal fade" id="startQuizPop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you ready to start this quiz ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h3>Quiz - <?php echo $course_name;?> <img src="<?php echo base_url();?>assets/img/quiz.png" width="80"/></h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Not Right Now</button>
        <a href="#" class="btn btn-primary confirmQuizLink">Yes,I'm ready</a>
      </div>
    </div>
  </div>
</div>
