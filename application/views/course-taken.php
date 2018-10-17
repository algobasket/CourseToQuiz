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

    <?php foreach($courses as $course) : ?>
     <?php $image_link = ($course['is_google_autoload'] == 1) ? imageSearch("udemy+HD+".$course['course_name']) : $course['image_link'];?>

     <div class="col-md-4 float-left placeThumbnail courseSelected" data-target="<?php echo base_url();?>show-course/<?php echo $course['course_name'] ; ?>">
       <div class="card mb-4 box-shadow">
         <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=<?php echo $course['course_title'] ; ?>" alt="Card image cap">
         <div class="card-body">
           <p class="card-text">
         <?php echo substr($course['course_title'],0,30);?>
           </p>
           <div class="d-flex justify-content-between align-items-center">
             <div class="btn-group">
              <a href="" class="btn btn-dark btn-sm">Subscriber <?php echo courseSubscribers($course['course_name']);?></a>
              <?php if(isCourseQuizAvailable($course['id'])) : ?>
              <a href="<?php echo base_url();?>show-quiz/<?php echo $course['course_name'];?>" class="btn btn-info btn-sm">Take Quiz</a>
            <?php endif ?>
             </div>
             <small class="text-muted"><?php time_stamp(strtotime($course['updated']));?></small>
           </div>
         </div>
       </div>
     </div>
   <?php endforeach ?>


  </div>
</div>

</div>
