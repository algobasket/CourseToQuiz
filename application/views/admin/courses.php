

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br><br>
         <?php if($section == "list"){ ?>
          <div class="alert alert-dark" role="alert">
            <h4>Courses <a href="<?php echo base_url();?>admin/courses/create_course" class="btn btn-secondary btn-sm float-right">Create New</a></h4>
         </div>
          <?php echo $this->session->flashdata('alert');?>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Title</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;foreach($list as $key => $item){ ?>
                  <tr>
                    <th><?php echo $i  ;?></th>
                    <th><?php echo $item['course_title'];?></th>
                    <th><?php echo $item['course_name'];?></th>
                    <th><?php echo $item['category_title'];?></th>
                    <th><?php echo $item['created'];?></th>
                    <th class="<?php echo getStatusBgClassName($item['status']);?>"><?php echo ucfirst(getStatusName($item['status']));?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/courses/update_course/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/courses/delete/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php $i++ ;} ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <div class="alert alert-dark" role="alert">
            <h4>Create Course</h4>
         </div>
          <?php echo form_open_multipart('admin/courses/create_course');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <th>Course Title</th>
                    <th><input type="text" placeholder="Course Title" name="title" class="form-control" required /></th>
               </tr>
               <tr>
                    <th>Course Name</th>
                    <th><input type="text" placeholder="Course Name" name="name" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>Category</th>
                    <th>
                      <select name="category_id" class="form-control">
                           <option disabled selected>Select Category</option>
                        <?php foreach($list as $item){ ?>
                           <option value="<?php echo $item['id'];?>"><?php echo $item['category_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
               <tr>
                    <th>Course Image <br>(Choose any one)</th>
                    <th>
                      External Link:(using external image link)<input type="text" placeholder="Course Image Thumbnail" name="image_link_external" class="form-control"/>
                      <br>
                      Upload Image:(upload raw image)<input type="file" name="image_link_raw" class="form-control" />
                      <br>
                      Google Autoload:(autoload from google)
                      <input type="checkbox" name="image_google_autoload"/>   <br>
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
            <h4>Update Course <a href="<?php echo base_url();?>admin/courses/update_course_detail/<?php echo $this->uri->segment(4);?>/chapter_video" class="btn btn-primary btn-sm float-right">Update Course Detail</a></h4>
         </div>
          <?php echo form_open_multipart('admin/courses/update_course/'.$this->uri->segment(4));?>
          <div class="table-responsive">
            <?php foreach($one as $item){ } ?>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Course Title</th>
                    <th><input type="text" value="<?php echo $item['course_title'];?>" class="form-control" name="title" /></th>
               </tr>
               <tr>
                    <th>Course Name</th>
                    <th><input type="text" value="<?php echo $item['course_name'];?>" class="form-control" name="name" /></th>
               </tr>
               <tr>
                    <th>Category Name</th>
                    <th>
                      <select name="category_id" class="form-control">
                        <?php foreach($list as $item2){
                         $select = ($item2['id'] == $item['category_id']) ? "selected" : "" ;
                        ?>
                       <option value="<?php echo $item2['id'];?>" <?php echo $select;?> ><?php echo $item2['category_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
               <tr>
                    <th>Course Image <br></th>
                    <th>
                      <img src="<?php echo $item['image_link'];?>" class="thumbnail" />
                      <label class="badge badge-warning">Keep it blank if you don't want to change course thumbnail</label><br>
                      External Link:(using external image link)<input type="text" placeholder="Course Image Thumbnail" name="image_link_external" class="form-control"/>
                      <br>or
                      Upload Image:(upload raw image)<input type="file" name="image_link_raw" class="form-control" />
                      <br>or
                      Google Autoload:(autoload from google)
                      <input type="checkbox" name="image_google_autoload" <?php echo ($item['is_google_autoload'] == 1) ? "checked" :"" ;?> />   <br>
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
