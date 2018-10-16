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
    <ul class="list-group">
     <li class="list-group-item alert-info"><h4>Dashboard</h4></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>courses">Browse All Course<br><small>45+ courses available</small></li>
     <li class="list-group-item openMenu bg-info" data-href="<?php echo base_url();?>quiz">Take Quiz <br><small>76+ quiz available</small><span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>my-course">My Course <span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu " data-href="<?php echo base_url();?>my-quiz">My Quiz <span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>my-exam">Take Exams <span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>my-certification">Certification <span class="badge badge-info float-right">45</span></li>
     <li class="list-group-item openMenu" data-href="<?php echo base_url();?>bookmark">Bookmarks <span class="badge badge-info float-right">45</span></li>

    </ul>
    <br><br>
  </div>
  <div class="col-md-9">

    <div class="col-md-4 float-left placeThumbnail" data-target="<?php echo base_url();?>">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=MOLOKA'I" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">
          MOLOKA'I
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
             Occupancy : 160
            </div>
            <small class="text-muted">9 mins</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 float-left placeThumbnail" data-target="<?php echo base_url();?>">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=MOLOKA'I" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">
          MOLOKA'I
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
             Occupancy : 160
            </div>
            <small class="text-muted">9 mins</small>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 float-left placeThumbnail" data-target="<?php echo base_url();?>">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=MOLOKA'I" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">
          MOLOKA'I
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
             Occupancy : 160
            </div>
            <small class="text-muted">9 mins</small>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 float-left placeThumbnail" data-target="<?php echo base_url();?>">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=MOLOKA'I" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">
          MOLOKA'I
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
             Occupancy : 160
            </div>
            <small class="text-muted">9 mins</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 float-left">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text= + LOAD MORE" alt="Card image cap">
      </div>
    </div>
  </div>
</div>

</div>
