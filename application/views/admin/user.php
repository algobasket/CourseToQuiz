

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br><br>
         <?php if($section == "list"){ ?>
          <h2>User <a href="<?php echo base_url();?>admin/user/create_user" class="btn btn-secondary btn-sm float-right">Create New</a></h2>
            <?php echo $this->session->flashdata('alert');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
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
                    <th><?php echo $item['first_name'].' '.$item['last_name'];?></th>
                    <th><?php echo $item['email'];?></th>
                    <th><?php echo $item['username'];?></th>
                    <th><?php echo $item['rolename'];?></th>
                    <th><?php echo $item['created'];?></th>
                    <th><?php echo $item['updated'];?></th>
                    <th class="<?php echo getStatusBgClassName($item['status']);?>"><?php echo getStatusName($item['status']);?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/user/update_user/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/user/delete/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <h2>Create User</h2>
          <?php echo $this->session->flashdata('alert');?>
          <?php echo form_open('admin/user/create_user');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <th>First Name</th>
                    <th><input type="text" oninvalid="this.setCustomValidity('Please Enter Your First Name')" oninput="setCustomValidity('')" placeholder="First Name" name="first_name" class="form-control" required /></th>
               </tr>
               <tr>
                    <th>Last Name</th>
                    <th><input type="text" oninvalid="this.setCustomValidity('Please Enter Your Last Name')" oninput="setCustomValidity('')" placeholder="Last Name" name="last_name" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>Email</th>
                    <th><input type="text" oninvalid="this.setCustomValidity('Please Enter Your Valid Email')" oninput="setCustomValidity('')" placeholder="Email" name="email" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>Password</th>
                    <th><input type="text" oninvalid="this.setCustomValidity('Please Enter Your Password')" oninput="setCustomValidity('')" placeholder="Password" name="password" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>Username</th>
                    <th><input type="text" oninvalid="this.setCustomValidity('Please Enter Your Username')" placeholder="Username" name="username" class="form-control"/></th>
               </tr>
               <tr>
                    <th>Role</th>
                    <th>
                      <select class="form-control" name="rolename">
                        <option value="customer">Customer</option>
                        <option value="admin">Admin</option>
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
                      <th>Send Email</th>
                      <th><input type="checkbox" name="send_email" checked/></th>
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
          <h2>Update User</h2>
          <?php echo form_open('admin/user/update_user/'.$this->uri->segment(4));?>
          <div class="table-responsive">
            <?php foreach($one as $item){ } ?>
            <table class="table table-striped table-sm">
                <tr>
                    <th>First Name</th>
                    <th><input type="text" value="<?php echo $item['first_name'];?>" oninvalid="this.setCustomValidity('Please Enter Your First Name')" oninput="setCustomValidity('')" placeholder="First Name" name="first_name" class="form-control" required /></th>
               </tr>
               <tr>
                    <th>Last Name</th>
                    <th><input type="text" value="<?php echo $item['last_name'];?>" oninvalid="this.setCustomValidity('Please Enter Your Last Name')" oninput="setCustomValidity('')" placeholder="Last Name" name="last_name" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>Email</th>
                    <th><input type="text" value="<?php echo $item['email'];?>" oninvalid="this.setCustomValidity('Please Enter Your Valid Email')" oninput="setCustomValidity('')" placeholder="Email" name="email" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>Password</th>
                    <th><input type="text" value="<?php echo $item['password'];?>" oninvalid="this.setCustomValidity('Please Enter Your Password')" oninput="setCustomValidity('')" placeholder="Password" name="password" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>Username</th>
                    <th><input type="text" value="<?php echo $item['username'];?>" oninvalid="this.setCustomValidity('Please Enter Your Username')" placeholder="Username" name="username" class="form-control"/></th>
               </tr>
               <tr>
                    <th>Role</th>
                    <th>
                      <select class="form-control" name="rolename">
                        <option value="customer" <?php echo ($item['rolename'] == "customer") ? "selected" : "";?> >Customer</option>
                        <option value="admin" <?php echo ($item['rolename'] == "admin") ? "selected" : "";?> >Admin</option>
                      </select>
                    </th>
               </tr>
                <tr>
                     <th>Status</th>
                    <th>
                       <select class="form-control" name="status">
                         <?php foreach($status as $s) : ?>
                         <option value="<?php echo $s['id'];?>"  <?php echo ($item['status'] == $s['id']) ? "selected" : "";?>><?php echo $s['status_name'];?></option>
                       <?php endforeach ?>
                       </select>
                    </th>
                 </tr>
                 <tr>
                      <th>Send Email</th>
                      <th><input type="checkbox" name="send_email" checked/></th>
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
