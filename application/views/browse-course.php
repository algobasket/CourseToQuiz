<style>
.list-group-item:hover{
  background-color:#ddd;
}
</style>

<div class="container-fluid">
<br>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url();?>browse-course">Browse</a></li>
  <?php if(@$_GET['category']) : ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo ucfirst($_GET['category']);?></li>
  <?php endif ?>
</ol>
</nav>
  <br>
  <div class="row">
  <div class="col-md-3">
    <ul class="list-group">
     <li class="list-group-item alert-info"><h4>Category</h4></li>
     <li class="list-group-item" data-href="<?php echo base_url();?>browse-course">Browse All Course<br><small><?php echo browseCourse()['total_course'];?>+ courses available</small></li>

     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>browse-quiz">Take Quiz <br><small><?php echo browseCourse()['total_quiz'];?>+ quiz available</small><span class="badge badge-info float-right"><?php echo browseCourse()['total_quiz'];?></span></li>

    <?php foreach($categories as $category) : ?>
    <li class="list-group-item openMenu" data-href="<?php echo base_url();?>browse-course/?category=<?php echo $category['category_name'];?>">
      <?php echo $category['category_title'];?>
      <br>

      <small><span class="badge badge-info"><?php echo getNoOfQuizInsideCategory($category['id']);?>+ </span> quiz questions</small>

      <span class="badge badge-info float-right"><?php echo getNoOfCourseInsideCategory($category['id']);?></span>
    </li>
   <?php endforeach ?>
    </ul>
    <br><br>
  </div>
  <div class="col-md-9">
   <div class="form-group">
    <!-- <input type="text" id="searchCourse" name="search" class="form-control" autocomplete="off" placeholder="SEARCH YOUR FAVOURITE COURSE...." style="height:50px;padding:20px;"/>
     -->
    <div class="input-group input-group-lg">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-lg">Browse Course</span>
      </div>
      <input type="text" placeholder="Search your course.." class="form-control searchCourse2" aria-label="Large" aria-describedby="inputGroup-sizing-sm">

    </div>
    <ul class="list-group searchCourseDisplay" style="display:none;position:absolute;z-index:999;width:60%;margin-left:170px">

    </ul>
   </div>


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

    <!-- <div class="col-md-4 float-left">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text= + LOAD MORE" alt="Card image cap">
      </div>
    </div> -->
  </div>
</div>

</div>
