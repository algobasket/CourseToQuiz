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
  <div class="col-md-3">
    <ul class="list-group">
     <li class="list-group-item alert-info"><h4>Dashboard</h4></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>courses">Browse All Course<br><small>45+ courses available</small></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>quiz">Take Quiz <br><small>76+ quiz available</small><span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>my-course">My Course <span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>my-quiz">My Quiz <span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>my-exam">Take Exams <span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>my-certification">Certification <span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>bookmark">Bookmarks <span class="badge badge-info float-right">45</span></li>

    </ul>
    <br><br>
  </div>
  <div class="col-md-9">
   <?php foreach($data as $r){
     $course_title = $r['course_title'];
   } ?>

    <div class="card">
  <h5 class="card-header"><?php echo $course_title ;?></h5>
  <div class="card-body">
    <h5 class="card-title"><?php echo $course_title ;?></h5>
    <p class="card-text">
    <?php echo $r['course_description'];?>
    </p>
    <a href="#" class="btn btn-success">Buy this course</a>
    <a href="#" class="btn btn-primary">Take Free Quiz</a>
  </div>
</div>
<br>
 <h4>&nbsp;&nbsp;&nbsp;Course Description</h4>

 <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Chapter #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Chapter #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Chapter #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
 <br>
  <h4>&nbsp;&nbsp;&nbsp;Course Videos</h4>
  <div class="row">
<div class="col-sm-6">
 <div class="card">
   <div class="card-body">
     <h5 class="card-title">Special title treatment</h5>
     <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
     <a href="#" class="btn btn-primary">Go somewhere</a>
   </div>
 </div>
</div>
<div class="col-sm-6">
 <div class="card">
   <div class="card-body">
     <h5 class="card-title">Special title treatment</h5>
     <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
     <a href="#" class="btn btn-primary">Go somewhere</a>
   </div>
 </div>
</div>
</div>
  </div>
</div>

</div>
<br><br>
