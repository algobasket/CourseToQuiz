</div>

</div>
<br>
<hr>
<div class="container">
<center>
  <h6>Made With <i class="fa fa-heart" style="font-size:20px;color:#af4456;"></i> - Algobasket Production</h6>
</center>
<br>
</div>
<!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script> -->

   <script src="<?php echo base_url();?>assets/js/jquery-slim.js"></script>
   <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
   <script src="<?php echo base_url();?>assets/js/holder.js"></script>
   <!-- Icons -->
   <script src="<?php echo base_url();?>assets/js/feather.min.js"></script>
   <script>
     feather.replace()
   </script>
   <!-- Custom SCript -->
    <script src="<?php echo base_url();?>assets/js/script.js"></script>  
   <!-- Graphs -->
   <script src="<?php echo base_url();?>assets/js/chart.js"></script>
   <script>
     var ctx = document.getElementById("myChart");
     var myChart = new Chart(ctx, {
       type: 'line',
       data: {
         labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
         datasets: [{
           data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
           lineTension: 0,
           backgroundColor: 'transparent',
           borderColor: '#007bff',
           borderWidth: 4,
           pointBackgroundColor: '#007bff'
         }]
       },
       options: {
         scales: {
           yAxes: [{
             ticks: {
               beginAtZero: false
             }
           }]
         },
         legend: {
           display: false,
         }
       }
     });
   </script>

 </body>
</html>
