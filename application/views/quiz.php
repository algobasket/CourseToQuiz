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
     <?php echo $this->load->view('sidebar');?>
    <br><br>
  </div>
  <div class="col-md-9">


    <?php foreach($courses as $course) : ?>
     <?php $image_link = ($course['is_google_autoload'] == 1) ? imageSearch("udemy+HD+".$course['course_name']) : $course['image_link'];?>
      <?php if(isCourseQuizAvailable($course['id']) == true) : ?>
     <div class="col-md-4 float-left placeThumbnail" onclick='window.location.href="<?php echo base_url();?>show-quiz/<?php echo $course['course_name'];?>"'>
       <div class="card mb-4 box-shadow">
         <img class="card-img-top" height="135" src="<?php echo $image_link;?>" data-src="holder.js/100px135?theme=thumb&bg=55595c&fg=eceeef&text=<?php echo $course['course_title'];?>" alt="Card image cap">
         <div class="card-body">
           <p class="card-text">
       <?php echo substr($course['course_title'],0,30);?>
           </p>
           <div class="d-flex justify-content-between align-items-center">
             <div class="btn-group">
               <?php $rating = rand(1,4);$rating2 = rand(0,4);?>
               <?php $ratingUsers = rand(1,10);?>
               <div class="rating">
                 <?php for($i = 1;$i<= 5 - round($rating);$i++){ ?>
                 <label>1 star</label>
                 <?php } ?>
                 <?php for($i = 1;$i<= round($rating);$i++){ ?>
                   <label style="color:yellow">1 star</label>
                 <?php } ?>
              </div>
                &nbsp;<small><?php echo $rating . '.'.$rating2;?> (<?php echo $ratingUsers;?>)</small>
             </div>
             <small class="text-muted">9 mins</small>
           </div>
         </div>
       </div>
     </div>
   <?php endif ?>
     <?php endforeach ?>

    <!-- <div class="col-md-4 float-left">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text= + LOAD MORE" alt="Card image cap">
      </div>
    </div> -->
  </div>
</div>

</div>
