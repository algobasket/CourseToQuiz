

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br><br>

         <?php if($section == "list"){ ?>

          <div class="alert alert-dark" role="alert">
            <h5>Answers <a href="<?php echo base_url();?>admin/answer/create_answer" class="btn btn-secondary btn-sm float-right">Create New</a></h5>
         </div>
            <?php echo $this->session->flashdata('alert');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Answer Option</th>
                    <th>Is Correct</th>
                    <th>Question</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;foreach($list as $key => $item){ ?>
                  <tr>
                    <th><?php echo $i ;?></th>
                    <th><?php echo $item['option_title'];?></th>
                    <th class="text-center <?php echo getStatusBgClassName($item['is_answer']);?>"><?php echo ($item['is_answer'] == 1) ? "Yes" : "No";?></th>
                    <th><?php echo $item['question_title'];?></th>
                    <th><?php echo $item['created'];?></th>
                    <th><?php echo $item['updated'];?></th>
                    <th class="<?php echo getStatusBgClassName($item['status']);?> text-center"><?php echo ucfirst(getStatusName($item['status']));?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/answer/update_answer/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/answer/delete/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php $i++;} ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <div class="alert alert-dark" role="alert">
            <h5>Create Answer</h5>
         </div>
            <?php echo $this->session->flashdata('alert');?>
          <?php echo form_open('admin/answer/create_answer');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <!-- <tr>
                    <th>Answer</th>
                    <th><input type="text" placeholder="Answer Title" name="title" class="form-control" required /></th>
               </tr> -->
               <tr>
                    <th>Question</th>
                    <th>
                      <select name="question_id" class="form-control">
                           <option disabled selected>Select Question</option>
                        <?php foreach($question as $q){ ?>
                           <option value="<?php echo $q['id'];?>"><?php echo $q['question_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
               <tr>
                    <th>Category</th>
                    <th>
                      <select name="category_id" class="form-control">
                           <option disabled selected>Select Category</option>
                        <?php foreach($category as $c){ ?>
                           <option value="<?php echo $c['id'];?>"><?php echo $c['category_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
               <tr>
                    <th>Course</th>
                    <th>
                      <select name="course_id" class="form-control">
                           <option disabled selected>Select Course</option>
                        <?php foreach($courses as $course){ ?>
                           <option value="<?php echo $course['id'];?>"><?php echo $course['course_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
               <tr>
                    <th>Answer</th>
                    <th>
                    <textarea class="form-control" name="answer"></textarea>
                    <br>
                         Random Options : <input type="radio" name="option_type" value="random" checked/> |
                         Specific Options : <input type="radio" name="option_type" value="specific"/>
                    </th>
               </tr>
               <tr>
                    <th>Is Answer</th>
                    <th>
                     <input type="checkbox" name="is_answer" /> (If this answer is correct then check)
                    </th>
               </tr>
                <tr>
                     <th>Status</th>
                    <th>
                       <select class="form-control" name="status">
                         <option value="1" >Active</option>
                         <option value="0" >Disable</option>
                       </select>
                    </th>
                 </tr>
                 <tr>
                      <th></th>
                     <th>
                      <input type="submit" name="create_answer" value="Create Answer Option" class="btn btn-primary btn-sm" />

                     </th>
                  </tr>
            </table>
          </div>
          <?php echo form_close();?>
        <?php }elseif($section == "update"){ ?>
          <div class="alert alert-dark" role="alert">
            <h5>Update Answer</h5>
         </div>
            <?php echo $this->session->flashdata('alert');?>
          <?php echo form_open('admin/answer/update_answer/'.$this->uri->segment(4));?>
          <div class="table-responsive">
            <?php foreach($one as $item){ } ?>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Question</th>
                    <th><h4><?php echo $item['question_title'];?></h4></th>
               </tr>
               <tr>
                    <th>Option Title</th>
                    <th>
                      <input type="text" name="title" value="<?php echo $item['option_title'];?>" class="form-control" />
                    </th>
               </tr>
               <tr>
                    <th>Is Answer</th>
                    <th>
                     <input type="checkbox" name="is_answer" <?php echo ($item['is_answer'] == 1) ? "checked" : "";?> />
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
