
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <p >
        Made With <i class="fa fa-heart" style="font-size:20px;color:#af4456;"></i> - Algobasket Production
         <a href="" style="text-decoration:none;color:#aaa;margin-left:10px" class="float-right"><i class="fa fa-facebook-square fa-2x"></i></a>
         <a href="" style="text-decoration:none;color:#aaa;margin-left:10px" class="float-right"><i class="fa fa-twitter-square fa-2x"></i></a>
         <a href="" style="text-decoration:none;color:#aaa" class="float-right"><i class="fa fa-youtube fa-2x"></i></a>
      </p>
    </p>
    <p>CourseToQuiz is &copy; Algobasket's product, all right reserved to the owner!</p>
    <p>
     <center>

         <a href="<?php echo base_url();?>license" style="text-decoration:none;color:#aaa">Licence</a> |
         <a href="<?php echo base_url();?>subscription" style="text-decoration:none;color:#aaa">Subscription</a> |
         <a href="<?php echo base_url();?>legal-notice" style="text-decoration:none;color:#aaa">Legal Notice</a> |
         <a href="<?php echo base_url();?>privacy-policy" style="text-decoration:none;color:#aaa">Privacy Policy</a> |
         <a href="<?php echo base_url();?>about" style="text-decoration:none;color:#aaa">About</a> |
         <a href="<?php echo base_url();?>contact" style="text-decoration:none;color:#aaa">Contact</a> |
         <a href="<?php echo base_url();?>faq" style="text-decoration:none;color:#aaa">FAQ</a>


     </center>
    </p>
  </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
<script src="<?php echo base_url();?>assets/js/holder.js"></script>
<script src="<?php echo base_url();?>assets/vegas/vegas.min.js"></script>
<script>
$(".sliderVegas").vegas({
    slides: [
        { src: "<?php echo base_url();?>assets/img/slider/slider1.jpg" },
        { src: "<?php echo base_url();?>assets/img/slider/slider2.jpg" },
        { src: "<?php echo base_url();?>assets/img/slider/slider3.jpg" }
    ],
    overlay:'https://vegas.jaysalvat.com/js/vegas/dist/overlays/05.png'
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [{
        label: "My First dataset",
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
          'rgba(105, 0, 132, .2)',
        ],
        borderColor: [
          'rgba(200, 99, 132, .7)',
        ],
        borderWidth: 2
      },
      {
        label: "My Second dataset",
        data: [28, 48, 40, 19, 86, 27, 90],
        backgroundColor: [
          'rgba(0, 137, 132, .2)',
        ],
        borderColor: [
          'rgba(0, 10, 130, .7)',
        ],
        borderWidth: 2
      }
    ]
  },
  options: {
    responsive: true
  }
});
</script>

<script src="<?php echo base_url();?>assets/js/star-rating.js"></script>
<script src="<?php echo base_url();?>assets/js/script.js"></script>

<script>
$(document).ready(function(){
  $('.openMenu').click(function(){
    var href = $(this).data('href');
    window.location.href= href;
  });
  $('.courseSelected').click(function(){
    var href = $(this).data('target');
    console.log(href);
    window.location.href= href;
  });
  $('.searchCourse').keyup(function(){
    var search = $(this).val();
    $.post('<?php echo base_url();?>courses/searchCourseAjax',{"text":search},function(data,status){
      $('.searchCourseDisplay').html(data).show();
    });
  });
  <?php if(@$_GET['category']) : ?>
  $('.searchCourse2').keyup(function(){
    var search = $(this).val();
    var category = '<?php echo @$_GET['category'];?>';
    $.post('<?php echo base_url();?>Home/searchCourseByCategoryAjax',{"category":category,"text":search},function(data,status){
      $('.searchCourseDisplay').html(data).show();
    });
  });
 <?php endif ?>

Holder.addTheme("bright", {
  bg: "red", fg: "gray", size: 12
});
 $('.QuizReadyConfirmation').click(function(){
    var QuizType = $(this).data('quiztype');
    var selectLevel = $('.selectLevel').val();
    var course = $('#courseSelected').val();
    var no_of_questions = $('.no_of_questions').val();
    var redirectLink ="<?php echo base_url();?>start-quiz/?level=" + selectLevel +'&course=' + course + '&QuizType=' + QuizType+'&noOfQuestions=' + no_of_questions;
    $('.confirmQuizLink').attr('href',redirectLink);
    $('#startQuizPop').modal('show');
 });
});


</script>
<script src="<?php echo base_url();?>bower_components/easytimer.js/dist/easytimer.min.js"></script>
<script>
var starts = 0;
var questionNo = 1;
function getQuizContinue() {
    var currentCount = '<?php echo $this->session->userdata('noOfQuestions');?>';
    var timer = new Timer();
    var questions_hidden = $('.questions_hidden').val();
    var answers_hidden   = $('.answers_hidden').val();
    var choosen_answer_option_id = $('.chooseAnswer:checked').val();
    if(questions_hidden && answers_hidden){
       var postData = {
         questions_hidden : questions_hidden,
         answers_hidden   : answers_hidden,
         choosen_answer_option_id : choosen_answer_option_id
       }
       $.post('<?php echo base_url();?>quiz/saveQuizEachQuestionAnswers',postData,function(data,status){
           console.log(data);
       });
    }
    $.post('<?php echo base_url();?>quiz/quizData',{"start" : starts,"questionNo":questionNo},function(data,status){
      $('.dynamicChanges').html(data).show();
      starts += 1;questionNo++;

      if(starts > currentCount){
        //alert(timer.getTimeValues().toString());
        var remainingTime = $('.RemainingQuizTimer').html();
        var minutes
        var postData2 = {
          no_of_questions_attempted : starts - 1,
          time_started : "<?php echo quizTime()['quiz_time'];?>",
          time_ended   :  remainingTime
        }
        $.post('<?php echo base_url();?>quiz/saveRemainingQuizTimer',postData2,function(data,status){
            console.log(data);
        });
        var html = '<h4>Quiz Completed Successfully</h4>'+
                   '<br>Your result will be saved to your quiz history<br>'+
                   'Thanks for using our platform<br>'+
                   '<a href="<?php echo base_url();?>quiz" class="btn btn-success">Try More Quiz</a><br>'+
                   '<h4>Your Rating & Quiz Experience Feedback Is Important For Us</h4><br>'+
                   '<span class="feedback_alert"><h5> 1 <input type="radio" class="feedback_rating" value="1" name="feedback_rating"/>  | 2 <input type="radio" class="feedback_rating" value="2" name="feedback_rating"/> | 3 <input type="radio" class="feedback_rating" value="3" name="feedback_rating"/> | 4 <input type="radio" class="feedback_rating" value="4" name="feedback_rating"/> | 5 <input type="radio" class="feedback_rating" value="5" name="feedback_rating"/></h5><br>'+
                   '<textarea class="form-control feedback_message"></textarea><br><button type="button" class="btn btn-success" onclick="send_feedback()">Send Feedback</button></span>';

        $('.dynamicChanges').html('<div class="alert alert-success">'+html+'</div>').show();
        // window.setTimeout(function(){
        //     // Move to a new location or you can do something else
        //     window.location.href = "<?php //echo base_url();?>/my-quiz";
        //   }, 5000);
      }
      timer.addEventListener('secondsUpdated', function (e) {
          $('.RemainingQuizTimer').html(timer.getTimeValues().toString(['minutes','seconds']));
      });
      timer.addEventListener('targetAchieved', function (e) {
         var html = '<h4>Quiz Completed Successfully</h4><br>Your result will be saved to your quiz history<br>Thanks for using our platform<br><a href="<?php echo base_url();?>/quiz" class="btn btn-success">Try More Quiz</a>';
         $('.dynamicChanges').html('<div class="alert alert-success">'+html+'</div>').show();
         window.setTimeout(function(){
             // Move to a new location or you can do something else
             window.location.href = "https://course2quiz.algobasket.com/welcome";
           }, 5000);
     });
      if(starts == 1){
        var totalInSeconds = "<?php echo quizTime()['totalInSeconds'];?>";
        timer.start({countdown: true, startValues: {seconds: parseInt(totalInSeconds)} ,target: {seconds: 0}});
        $('.RemainingQuizTimer').html(timer.getTimeValues().toString(['minutes','seconds']));
      }
    });
}
function stopTimer(timer){
  timer.stop();
}

// var mins=1;
// var secs = mins*60;
// //var timerInterv = setInterval(doCountDown,1000);
// var outMins,outSecs;
// function doCountDown(timerInterv,currentCount)
// {
//     --secs;
//     if (secs<=0)
//     { outMins=outSecs=0;
//     clearInterval(timerInterv);
//     return;
//     }
//     outMins = parseInt(secs/60);
//     outSecs = secs%60;
//     document.getElementById('RemainingQuizTimer').innerHTML="Remaining Time : "+outMins+":"+outSecs;
//     if(outMins == 0 && outSecs==1){
//       //window.location.href='https://google.com/';
//     }
// }
</script>
</body>
</html>
