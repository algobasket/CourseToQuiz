
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br>
            <div class="row">
              <h2> &nbsp;&nbsp;&nbsp;Dashboard</h2>
            </div>

            <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">User Report</h5>
                  <p class="card-text">Total User - <?php echo count($userReports['total_user']);?> | Blocked User -<?php echo count($userReports['blocked_user']);?> | Online User - <?php echo count($userReports['online_user']);?></p>
                  <a href="#" class="btn btn-primary">User Report</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Quiz</h5>
                  <p class="card-text">Total Quiz - <?php echo count($quizReports['total_quiz']);?> | Total Questions - <?php echo count($quizReports['total_questions']);?> | Total Answers Given - <?php echo count($quizReports['total_answers_given']);?></p>
                  <a href="#" class="btn btn-primary">Quiz Report</a>
                </div>
              </div>
            </div>
          </div><br>
          <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Course</h5>
                <p class="card-text">Total Course - <?php echo count($courseReports['total_course']);?> | Total Course Subscribed - <?php echo count($courseReports['total_course_subscribed']);?></p>
                <a href="#" class="btn btn-primary">Course Report</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Payments</h5>
                <p class="card-text">Total Payment - <?php echo count($paymentReports['total_payment']);?>$ | Pending Payment - <?php echo count($paymentReports['pending_payment']);?>$ | Failed Payment - <?php echo count($paymentReports['failed_payment']);?>$</p>
                <a href="#" class="btn btn-primary">Payments Report</a>
              </div>
            </div>
          </div>
          </div>

        </main>
