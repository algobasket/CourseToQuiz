
    <main role="main">

      <section class="jumbotron text-center bgImageJumbotron image-container shadow-lg">
        <div class="overlay"></div>
        <div class="container">
          <br><br>
          <h1 class="jumbotron-heading display-4" style="color:white">Learn With Fun</h1>
          <p class="lead text-muted" style="color:white !important">Our platform covers all your needs</p>
          <p>
            <a href="<?php echo base_url();?>browse-course" class="btn btn-primary my-2">Browse Our Course</a>
            <a href="<?php echo base_url();?>browse-quiz" class="btn btn-success my-2">Free Fun Quiz</a>
          </p>
          <a href="<?php echo base_url();?>membership-plan" class="btn btn-secondary my-3">Get Certified Today</a>
        </div>
      </section>
      <br><br><br>
       <center><h3 style="font-weight:bold">The world’s largest selection of courses and free quiz</h3></center>
       <center><h5>Choose from over 80,000 online video courses with new additions published every month</h5></center>
       <center><h5>Select your course and get started.</h5></center>
      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

           <?php foreach($courses as $course) : ?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=af4456&fg=eceeef&text=<?php echo $course['course_title'];?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?php echo $course['course_title'];?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="<?php echo base_url();?>show-course/<?php echo $course['course_name'];?>" class="btn btn-sm btn-outline-secondary">Take Course</a>
                      <a href="<?php echo base_url();?>show-quiz/<?php echo $course['course_name'];?>" class="btn btn-sm btn-info">Take Quiz</a>
                    </div>
                    <small class="text-muted"><?php echo date('d,M Y',strtotime($course['created']));?></small>
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
         <a href="../../components/navbar/" role="button"><img src="./assets/img/playicon.png" width="150px" /></a>
         <a href="../../components/navbar/" role="button"><img src="./assets/img/apple.png" width="170px"/></a>
       </div>
     </div>
<br><br>
