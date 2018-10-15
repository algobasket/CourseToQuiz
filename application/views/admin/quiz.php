
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         <br><br>
         <?php if($section == "list"){ ?>

          <div class="alert alert-dark" role="alert">
            <h5>Quiz <a href="<?php echo base_url();?>admin/quiz/create_quiz" class="btn btn-secondary btn-sm float-right">Create New</a></h5>
         </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Quiz Title</th>
                    <th>Quiz Name</th>
                    <th>Course</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($list as $key => $item){ ?>
                  <tr>
                    <th><?php echo $key ;?></th>
                    <th><?php echo $item['quiz_title'];?></th>
                    <th><?php echo $item['quiz_name'];?></th>
                    <th><?php echo $item['course_name'];?></th>
                    <th><?php echo $item['created'];?></th>
                    <th><?php echo $item['status'];?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/quiz/update_quiz/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/quiz/delete/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <div class="alert alert-dark" role="alert">
            <h5>Create Quiz</h5>
         </div>
          <?php echo form_open('admin/quiz/create_quiz');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <th>Quiz Title</th>
                    <th><input type="text" placeholder="Quiz Title" name="title" class="form-control" required /></th>
               </tr>
               <tr>
                    <th>Quiz Name</th>
                    <th><input type="text" placeholder="Quiz Name" name="name" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>For Course</th>
                    <th>
                      <select name="parent_id" class="form-control">
                           <option disabled selected>Select Course</option>
                        <?php foreach($list as $item){ ?>
                           <option value="<?php echo $item['id'];?>"><?php echo $item['course_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
                <tr>
                     <th>Status</th>
                    <th>
                       <select class="form-control" name="status">
                         <option value="1"  >Active</option>
                         <option value="0" >Disable</option>
                       </select>
                    </th>
                 </tr>
                 <tr>
                      <th></th>
                     <th>
                      <input type="submit" name="create" value="Create" class="btn btn-primary btn-sm" />
                     </th>
                  </tr>
            </table>
          </div>
          <?php echo form_close();?>
        <?php }elseif($section == "update"){ ?>
          <div class="alert alert-dark" role="alert">
            <h5>Update Quiz</h5>
         </div>
          <?php echo form_open('admin/quiz/update_quiz/'.$this->uri->segment(4));?>
          <div class="table-responsive">
            <?php foreach($one as $item){ } ?>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Quiz Title</th>
                    <th><input type="text" value="<?php echo $item['quiz_title'];?>" class="form-control" /></th>
               </tr>
               <tr>
                    <th>Quiz Name</th>
                    <th><input type="text" value="<?php echo $item['quiz_name'];?>" class="form-control" /></th>
               </tr>
               <tr>
                    <th>Course</th>
                    <th>
                      <select name="course_id" class="form-control">
                        <?php foreach($list as $item){ ?>
                           <option value="<?php echo $item['id'];?>"><?php echo $item['course_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
                <tr>
                     <th>Status</th>
                    <th>
                       <select class="form-control" name="status">
                         <option value="1" <?php echo ($item['status'] == 1) ? "selected" : "";?> >Active</option>
                         <option value="0" <?php echo ($item['status'] == 0) ? "selected" : "";?>>Disable</option>
                       </select>
                    </th>
                 </tr>
                 <tr>
                      <th></th>
                     <th>
                      <input type="submit" name="update" value="Update" class="btn btn-primary btn-sm" />
                     </th>
                  </tr>
            </table>
          </div>
            <?php echo form_close();?>
        <?php } ?>
        </main>
