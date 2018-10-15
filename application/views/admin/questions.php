

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br><br>
         <?php if($section == "list"){ ?>

          <div class="alert alert-dark" role="alert">
            <h5>Questions <a href="<?php echo base_url();?>admin/question/create_question" class="btn btn-secondary btn-sm float-right">Create New</a></h5>
         </div>
         <?php echo $this->session->flashdata('alert');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Category</th>
                    <th>Real or Test</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach($list as $key => $item){ ?>
                  <tr>
                    <th><?php echo $i ;?></th>
                    <th><?php echo $item['question_title'];?></th>
                    <th><?php echo $item['category_title'];?></th>
                    <th><?php echo ($item['real_or_test'] == 1) ? "Real" : "Test";?></th>
                    <th><?php echo $item['created'];?></th>
                    <th><?php echo $item['updated'];?></th>
                    <th class="text-center <?php echo getStatusBgClassName($item['status']);?>"><?php echo getStatusName($item['status']);?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/question/update_question/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/question/delete/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php $i++;} ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <h2>Create Question</h2>
          <?php echo form_open('admin/question/create_question');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <th>Question</th>
                    <th><input type="text" placeholder="Question Title" name="title" class="form-control" required /></th>
               </tr>
               <tr>
                    <th>Category</th>
                    <th>
                      <select name="category_id" class="form-control">
                           <option disabled selected>Select Category</option>
                        <?php foreach($category as $item){ ?>
                           <option value="<?php echo $item['id'];?>"><?php echo $item['category_title'];?></option>
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
                    <th>Level</th>
                    <th>
                    <select name="level" class="form-control">
                      <option value="easy">Easy</option>
                      <option value="medium">Medium</option>
                      <option value="hard">Hard</option>
                      <option value="complex">Complex</option>
                    </select>
               </tr>
               <tr>
                    <th>Real or test</th>
                   <th>
                      <select class="form-control" name="real_or_test">
                        <option value="1"  >Real Quiz Question</option>
                        <option value="0" >Practise Quiz Question</option>
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
                      <input type="submit" name="create" value="Create Only Question" class="btn btn-primary btn-sm" />
                      <input type="submit" name="create_answer" value="Create Question With Answers" class="btn btn-primary btn-sm" />
                     </th>
                  </tr>
            </table>
          </div>
          <?php echo form_close();?>
        <?php }elseif($section == "update"){ ?>
          <h2>Update Question</h2>
          <?php echo form_open('admin/question/update_question/'.$this->uri->segment(4));?>
          <div class="table-responsive">
            <?php foreach($one as $item){ } ?>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Question</th>
                    <th><input type="text" name="title" value="<?php echo $item['question_title'];?>" class="form-control" /></th>
               </tr>
               <tr>
                    <th>Category</th>
                    <th>
                      <select name="category_id" class="form-control">
                           <option disabled selected>Select Category</option>
                        <?php foreach($category as $c){
                            $select_c = ($item['category_id'] == $c['id']) ? "selected" : "";
                        ?>
                           <option value="<?php echo $c['id'];?>" <?php echo $select_c ;?>><?php echo $c['category_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
               <tr>
                    <th>Course</th>
                    <th>
                      <select name="course_id" class="form-control">
                           <option disabled selected>Select Course</option>
                        <?php foreach($courses as $course){
                            $select_c2 = ($item['course_id'] == $course['id']) ? "selected" : "";
                        ?>
                           <option value="<?php echo $course['id'];?>" <?php echo $select_c2 ;?> ><?php echo $course['course_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
               <tr>
                    <th>Real Or Test</th>
                    <th>
                     <input type="checkbox" name="real_or_test" <?php echo ($item['real_or_test'] == 1) ? "checked" : "";?> />
                     <small>Check for real</small>
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
