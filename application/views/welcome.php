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
    <h3>Profile Summary</h3>
    <hr>
    <div class="row">

      <div class="card" style="width: 18rem;">
        <div class="card-body">
         <h3 class="card-title">Score Card</h3><hr>
        <h6 class="card-subtitle mb-2 text-muted">Total Quiz Score</h6>
        <h2><?php echo round($reports['total_quiz_score'],2);?>%</h2>
        <h5>Total Quiz Taken - <?php echo $reports['quiz_taken'];?></h5>
        <a href="./my-quiz" class="card-link">Check Detail</a>
        </div>
      </div>

    </div>
  </div>
</div>

</div>
