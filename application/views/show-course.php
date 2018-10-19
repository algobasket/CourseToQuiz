<style>
.list-group-item:hover{
  background-color:#ddd;
}
</style>

<div class="container-fluid">
<br>
  <h4 style="background:#ddd">&nbsp;&nbsp;&nbsp;&nbsp;
    <span>Welcome <?php echo $this->session->userdata('displayname');?></span></h4>
  <br>
  <div class="row">

  <div class="col-md-12">
   <?php foreach($course as $r){
     $course_title = $r['course_title'];
   } ?>

    <div class="card">
  <h5 class="card-header"><?php echo $course_title ;?></h5>
  <div class="card-body">
    <h5 class="card-title"><?php echo $course_title ;?></h5>
    <p class="card-text">
    <?php echo $r['course_description'];?>
    </p>

    <?php if($isCourseForked == true) { ?>
      <a href="#" class="btn btn-dark">Forked <i class="fa fa-check-circle"></i></a>
    <?php }else{ ?>
      <a href="<?php echo base_url();?>show-course/<?php echo $r['course_name'];?>/?action=fork" class="btn btn-dark"><i class="fa fa-plus"></i> Fork this course</a>
    <?php } ?>

    <?php if(isCourseQuizAvailable($r['id']) == true){ ?>
       <a href="<?php echo base_url();?>show-quiz/<?php echo $r['course_name'];?>" class="btn btn-info">Take Free Quiz</a>
     <?php } ?>
     <a href="" class="btn btn-danger float-right"><?php echo $courseSubscribers;?> subscribers</a>
  </div>
</div>
<br>
 <h4>&nbsp;&nbsp;&nbsp;Course Description</h4>

 <div class="accordion" id="accordionExample">
  <?php
  if(is_array($courseChapters) && count($courseChapters) > 0){
  $i=1;foreach($courseChapters as $key => $chapter){ ?>
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" style="text-decoration:none;color:#000" type="button" data-toggle="collapse" data-target="#collapse<?php echo $key;?>" aria-expanded="true" aria-controls="collapse<?php echo $key;?>">
          <h4>Chapter#<?php echo $i;?> - <?php echo $chapter['chapter_title'];?></h4>
        </button>
      </h5>
    </div>

    <div id="collapse<?php echo $key;?>" class="collapse" aria-labelledby="heading<?php echo $key;?>" data-parent="#accordionExample">
      <div class="card-body">
       <?php echo $chapter['description'];?>
      </div>
    </div>
  </div>
  <?php $i++;?>
<?php } }else{ ?>
<div class="alert alert-info text-center">No Chapter Available Yet</div>
<?php } ?>

</div>
 <br>
  <h4>&nbsp;&nbsp;&nbsp;Course Videos</h4>
  <div class="row">

    <?php
    if(is_array($courseVideos) && count($courseVideos) > 0){
    $i=1;foreach($courseVideos as $key => $video){ ?>
    <div class="col-sm-6">
     <div class="card">
       <div class="card-body">
         <h5 class="card-title"><?php echo $video['video_title'];?></h5>
         <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
         <a href="#" class="btn btn-primary">Go Watch</a>
       </div>
     </div>
    </div>
    <?php $i++;?>
  <?php } }else{ ?>

       <div class="alert alert-info text-center" style="margin:20px;width:100%;">No Video Available Yet</div>

  <?php } ?>

</div>


<br>
<h3>Discussion</h3>
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://course2quiz-algobasket-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>




  </div>
</div>

</div>
<br><br>
