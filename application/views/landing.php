

    <main role="main">

      <section class="jumbotron text-center bgImageJumbotron image-container shadow-lg sliderVegas" style="border-radius:0">
        <div class="overlay"></div>
        <div class="container">
          <br><br>
          <h1 class="jumbotron-heading display-4" style="color:white">Learn With Fun</h1>
          <p class="lead text-muted" style="color:white !important">Our platform covers all your needs</p>
          <p>
            <a href="<?php echo base_url();?>browse-course" class="btn btn-primary my-2">Browse Our Course <i class="fa fa-search"></i></a>
            <a href="<?php echo base_url();?>browse-quiz" class="btn btn-success my-2">Free Fun Quiz <i class="fa fa-bell"></i></a>
          </p>
          <a href="<?php echo base_url();?>membership-plan" class="btn btn-secondary my-3">Get Certified Today <i class="fa fa-check-circle"></i></a>
        </div>
      </section>

    <div class="how-udemy-works-container">
      <div class="container">
        <div class="row">
        <div class="col-md-4 text-center how_works_text">
           <b><i class="fa fa-podcast fa-3x" style="position:relative;line-height:80px;float:left;"></i>
             <big style="margin-right:90px"><?php echo $total_course;?>+ online courses</big></b>
       </div>
        <div class="col-md-4 text-center how_works_text">
          <b><i class="fa fa-code fa-3x" style="position:relative;line-height:80px;float:left;margin-left:90px"></i>
            <big style="margin-right:90px"><?php echo $total_quiz;?>+ Quiz </big></b></div>
        <div class="col-md-4 text-center how_works_text">
          <b><i class="fa fa-connectdevelop fa-3x" style="position:relative;line-height:80px;float:left;margin-left:90px"></i>
             <big style="margin-right:60px"><?php echo $total_member;?>+ Member </big></b>
        </div>
      </div>
      </div>
    </div>




      <br><br><br>
       <center><h3 style="font-weight:bold">The world’s largest selection of courses and free quiz</h3></center>
       <center><h5>Choose from over 80,000 online video courses with new additions published every month</h5></center>
       <center><h5>Select your course and get started.</h5></center>
      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

           <?php foreach($courses as $course) : ?>
            <?php $image_link = ($course['is_google_autoload'] == 1) ? imageSearch("udemy+HD+".$course['course_name']) : $course['image_link'];?>

            <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" height="135" src="<?php echo $image_link;?>" data-src="holder.js/100px135?theme=thumb&bg=af4456&fg=eceeef&text=<?php echo $course['course_title'];?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?php echo substr($course['course_title'],0,30);?></p>
                  <p>


                    <div class="rating">
                        <?php
                         $rating = round(courseRating($course['id'])['rating']);
                         $nonrating = 5 - $rating;
                         for($j=1;$j<=$nonrating;$j++){
                           echo '<label>1 star</label>';
                         }
                         for($i=1;$i<=$rating;$i++){
                           echo '<label style="color:yellow">1 star</label>';
                         }

                        ?>



                   </div>
                     &nbsp;<small><?php echo courseRating($course['id'])['rating'];?> (<?php echo courseRating($course['id'])['count'];?>)</small></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="<?php echo base_url();?>show-course/<?php echo $course['course_name'];?>" class="btn btn-sm btn-outline-secondary">Take Course</a>
                       <?php if(isCourseQuizAvailable($course['id']) == true){ ?>
                         <a href="<?php echo base_url();?>show-quiz/<?php echo $course['course_name'];?>" class="btn btn-sm btn-success">Take Quiz <i class="fa fa-search"></i></a>
                       <?php }else{ ?>
                          <a href="#" class="btn btn-sm btn-dark">Quiz Not Available</a>
                       <?php } ?>
                    </div>
                    <small class="text-muted"></small>
                  </div>
                </div>
              </div>
            </div>

          <?php endforeach ?>



          </div>
          <center><a href="<?php echo base_url();?>browse-course" class="btn btn-outline-secondary btn-lg btn-block">Browse More</a></center>
        </div>
      </div>

    </main>

    <br>
    <div class="container">
       <div class="jumbotron mt-3 bgImageJumbotron2" >
         <h1 style="color:#FFF">Download Our Mobile App app</h1>
         <p class="lead" style="color:#FFF">
           Take courses on any of your devices
           Go at your own pace with lifetime access
         </p>
          <h4 style="color:#FFF">Learn anytime, anywhere</h4>
         <a href="https://play.google.com/store/apps/details?id=com.course2quiz.android" target="blank_" role="button"><img src="./assets/img/playicon.png" width="150px" /></a>
         <a href="https://itunes.apple.com/in/app/course2quiz/id577476493" target="blank_" role="button"><img src="./assets/img/apple.png" width="170px"/></a>
       </div>
     </div>
<br><br>
