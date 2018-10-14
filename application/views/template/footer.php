
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
    overlay:'http://vegas.jaysalvat.com/js/vegas/dist/overlays/09.png'
});
</script>
<script src="<?php echo base_url();?>assets/js/star-rating.js"></script>
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
    var redirectLink ="<?php echo base_url();?>start-quiz/?level=" + selectLevel +'&course=' + course + '&QuizType=' + QuizType;
    $('.confirmQuizLink').attr('href',redirectLink);
    $('#startQuizPop').modal('show');
 });
});


</script>

<script>
var starts = 0;
var questionNo = 1;
function getQuizContinue() {

    console.log(starts);
    $.post('<?php echo base_url();?>quiz/quizData',{"start" : starts,"questionNo":questionNo},function(data,status){
      $('.dynamicChanges').html(data).show();
      starts += 1;questionNo++;
      if(starts == 1){
        var timerInterv = setInterval(doCountDown,1000);
        doCountDown(timerInterv);
      }


    });
}

var mins=15;
var secs = mins*60;
//var timerInterv = setInterval(doCountDown,1000);
var outMins,outSecs;
function doCountDown(timerInterv)
{
    --secs;
    if (secs<=0)
    { outMins=outSecs=0;
    clearInterval(timerInterv);
    return;
    }
    outMins = parseInt(secs/60);
    outSecs = secs%60;
    document.getElementById('RemainingQuizTimer').innerHTML="Remaining Time : "+outMins+":"+outSecs;
    if(outMins == 0 && outSecs==1){
      //window.location.href='https://google.com/';
    }
}
</script>
</body>
</html>
