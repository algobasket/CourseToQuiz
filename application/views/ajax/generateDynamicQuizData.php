<?php
if(is_array($getQuizData) && isset($getQuizData)){
  $questions = $getQuizData['questions'];
  $answers = $getQuizData['answers'];
   foreach($questions as $question){};

 ?>
<div class="row">
  <h3>
   <label class="badge badge-primary">Question <?php echo $question_number;?></label> :
   <?php echo $question['question_title'];?>
</h3>
</div>
<div class="row" style="margin-left:140px">
   <?php foreach($answers as $ans){ ?>
    <div class="col-md-6">
      <label class="radio"> <?php echo $ans['option_title'];?>
       <input type="radio" name="is_company">
       <span class="checkround"></span>
     </label>
     </div>
   <?php } ?>
</div>
<hr>
<div class="row" style="margin-left:140px">
    <button type="button" class="btn btn-primary btn-lg" onclick="getQuizContinue()">Confirm And Next</button>
</div>
<?php }else{ ?>
  <div class="row" style="margin-left:140px">
      Sorry There is limited quiz data in the backend
  </div>
<?php } ?>
