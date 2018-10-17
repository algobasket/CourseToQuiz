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
    <div class="row">
      <h3> &nbsp;&nbsp;&nbsp;Recent Activity</h3>
    </div>
    <div class="row">
          <div class="card text-white bg-info mb-3" style="max-width: 18rem;float:left;margin-left:10px">
         <div class="card-header">Quiz Score Board</div>
         <div class="card-body">
           <h2 class="card-title">Score - 34 %</h2>
           <p class="card-text">Total average score of all the quiz given</p>

         </div>
       </div>
       <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;float:left;margin-left:10px">
         <div class="card-header">Course Board</div>
         <div class="card-body">
           <h2 class="card-title">Watch - 34 Min</h2>
           <p class="card-text"> Engagement on course study and time spent</p>

         </div>
       </div>
       <div class="card text-white bg-success mb-3" style="max-width: 18rem;float:left;margin-left:10px">
         <div class="card-header">Discussion Board</div>
         <div class="card-body">
           <h2 class="card-title">Reply - 45% </h2>
           <h2 class="card-title">Asked - 56% </h2>
           <p class="card-text"> Your engagement and responsiveness on various discussion</p>

         </div>
       </div>
    </div>
    <hr>
    <div class="row">
      <h3> &nbsp;&nbsp;&nbsp;Report</h3>
    </div>




  </div>

</div>

</div>
