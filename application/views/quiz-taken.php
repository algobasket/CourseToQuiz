<style>
.list-group-item:hover{
  background-color:#ddd;
}
</style>

<div class="container-fluid">
<br>
  <h4 style="background:#ddd">&nbsp;&nbsp;&nbsp;&nbsp;
    Welcome <?php echo $this->session->userdata('displayname');?></h4>
  <br>
  <div class="row">
  <div class="col-md-3">
      <?php $this->load->view('sidebar');?>
    <br><br>
  </div>
  <div class="col-md-9">
  <div class="row"><h3>&nbsp;&nbsp;Quiz History</h3></div><hr>
  <div class="row">

<?php if($section == "quizTakenList") : ?>
 <?php
 foreach($quizHistory as $quiz){
    foreach($quiz['course_detail'] as $course){};
 ?>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $course['course_title'];?></h5>
        <p class="card-text">
          <h5>Date : <?php echo date('d,M Y',strtotime($quiz['quizDate']));?></h5>
          Total Question Selected : <?php echo $quiz['totalQuestionSelected'];?><br>
          Total Quiz Time : <?php echo $quiz['totalQuizTime'];?> <br>
          Time Taken For Quiz : <?php echo $quiz['timeTakenForQuiz'];?> <br>
          Question Attempted: <?php echo $quiz['questionAttempted'];?><br>
          Correct Answered : <?php echo $quiz['correctAnswered'];?> <br>
          Wrong Answered : <?php echo $quiz['wrongAnswered'];?> <br>
          <h5>Scored : <?php echo $quiz['scored'];?>%</h5>
        </p>
        <a href="<?php echo base_url();?>quiz-history-report/<?php echo $quiz['quizSessionId'];?>" class="btn btn-primary">Complete Report</a>
      </div>
    </div>
  </div>
<?php } ?>
<?php endif ?>

<?php if($section == "quizHistoryReport") : ?>
 <?php
 foreach($quizHistoryReport as $quiz){
    foreach($quiz['course_detail'] as $course){};
 ?>
  <div class="container">
    <a href="javascript:window.print();" class="btn btn-dark"><i class="fa fa-download"></i> Download Result</a>
    <br>  <br>
    <div class="form-group">
     <label><b>Quiz Session ID - </b></label>
      <?php echo $quiz['quizSessionId'];?>
    </div>
      <div class="form-group">
       <label><b>Quiz Taken For - </b></label>
        <?php echo $course['course_title'];?>
      </div>
      <div class="form-group">
       <label><b>Date - </b></label>
       <?php echo date('d,M Y',strtotime($quiz['quizDate']));?>
      </div>
      <div class="form-group">
       <label><b>Scored - </b></label>
       <?php echo $quiz['scored'];?>%
       <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:<?php echo $quiz['scored'];?>%;" aria-valuenow="<?php echo $quiz['scored'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $quiz['scored'];?>%</div>
      </div>
      </div>
      <div class="form-group">
        <p>
           <b>Total Question Selected - </b><?php echo $quiz['totalQuestionSelected'];?><br>
           <b>Total Quiz Time - </b><?php echo $quiz['totalQuizTime'];?> <br>
           <b>Time Taken For Quiz - </b><?php echo $quiz['timeTakenForQuiz'];?> <br>
           <b>Question Attempted - </b><?php echo $quiz['questionAttempted'];?><br>
           <b>Correct Answered - </b><?php echo $quiz['correctAnswered'];?> <br>
           <b>Wrong Answered - </b><?php echo $quiz['wrongAnswered'];?> <br> <br>
        </p>
      </div>

     <h5><b>Questions Attempted - </b></h5>
   <?php $i = 1;foreach($quiz['questionsAnswers'] as $r){ ?>
      <?php $question =  json_decode($r['question_json'],true);?>
      <?php $answer   =  json_decode($r['answer_json'],true);?>
     <div class="card">
     <div class="card-header">
       <?php echo $i .' - '. $question[0]['question_title'];?>
     </div>
     <div class="card-body">
       <blockquote class="blockquote mb-0">
         <p>
           <?php foreach($answer as $a){
             echo ' - ' . $a['option_title'];
             echo '<br>';
           } ?>
         </p>
       </blockquote>
     </div>
   </div>
   <br>
  <?php  $i++ ;} ?>



  </div>
      <?php } ?>
      <?php endif ?>
     </div>
    <br>
  </div>
</div>

</div>
