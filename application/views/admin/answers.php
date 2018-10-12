

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br><br>
         <?php if($section == "list"){ ?>
          <h2>Answers <a href="<?php echo base_url();?>admin/answer/create_answer" class="btn btn-secondary btn-sm float-right">Create New</a></h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Answer</th>
                    <th>Question</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($list as $key => $item){ ?>
                  <tr>
                    <th><?php echo $key ;?></th>
                    <th><?php echo $item['option_title'];?></th>
                    <th><?php echo $item['question_title'];?></th>
                    <th><?php echo $item['created'];?></th>
                    <th><?php echo $item['updated'];?></th>
                    <th><?php echo $item['status'];?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/answer/update_answer/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/answer/delete/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <h2>Create Answer</h2>
          <?php echo form_open('admin/answer/create_answer');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <th>Answer</th>
                    <th><input type="text" placeholder="Answer Title" name="title" class="form-control" required /></th>
               </tr>
               <tr>
                    <th>Question</th>
                    <th>
                      <select name="category_id" class="form-control">
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
                    <th><input type="text" value="<?php echo $item['question_title'];?>" class="form-control" /></th>
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
