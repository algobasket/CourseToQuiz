

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br><br>
         <?php if($section == "list"){ ?>

          <div class="alert alert-dark" role="alert">
            <h4>Category <a href="<?php echo base_url();?>admin/category/create_category" class="btn btn-secondary btn-sm float-right">Create New</a></h4>
         </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Title</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Parent Id</th>
                    <th scope="col">Created</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;foreach($list as $key => $item){ ?>
                  <tr>
                    <th><?php echo $i ;?></th>
                    <th><?php echo $item['category_title'];?></th>
                    <th><?php echo $item['category_name'];?></th>
                    <th><?php echo $item['parent_id'];?></th>
                    <th><?php echo $item['created'];?></th>
                    <th class="<?php echo getStatusBgClassName($item['status']);?> text-center"><?php echo ucfirst(getStatusName($item['status']));?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/category/update_category/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/category/delete/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php $i++ ;} ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <div class="alert alert-dark" role="alert">
            <h4>Create Category</h4>
         </div>
          <?php echo form_open('admin/category/create_category');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <th>Category Title</th>
                    <th><input type="text" placeholder="Category Title" name="title" class="form-control" required /></th>
               </tr>
               <tr>
                    <th>Category Name</th>
                    <th><input type="text" placeholder="Category Name" name="name" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>Parent Id</th>
                    <th>
                      <select name="parent_id" class="form-control">
                           <option disabled selected>Select Parent ID</option>
                           <option value="0">0</option>
                        <?php foreach($list as $item){ ?>
                           <option value="<?php echo $item['id'];?>"><?php echo $item['category_title'];?></option>
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
            <h4>Update Category</h4>
         </div>
          <?php echo form_open('admin/category/update_category/'.$this->uri->segment(4));?>
          <div class="table-responsive">
            <?php foreach($one as $item){ } ?>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Category Title</th>
                    <th><input type="text" value="<?php echo $item['category_title'];?>" class="form-control" /></th>
               </tr>
               <tr>
                    <th>Category Name</th>
                    <th><input type="text" value="<?php echo $item['category_name'];?>" class="form-control" /></th>
               </tr>
               <tr>
                    <th>Parent Id</th>
                    <th>
                      <select name="parent_id" class="form-control">
                        <?php foreach($list as $item){ ?>
                           <option value="<?php echo $item['id'];?>"><?php echo $item['category_title'];?></option>
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
