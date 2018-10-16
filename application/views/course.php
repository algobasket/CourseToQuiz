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
   <?php $this->load->view('sidebar');?>
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
      <input type="text" placeholder="Search your course.." class="form-control searchCourse" aria-label="Large" aria-describedby="inputGroup-sizing-sm">

    </div>
    <ul class="list-group searchCourseDisplay" style="display:none;position:absolute;z-index:999;width:60%;margin-left:170px">

    </ul>
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
