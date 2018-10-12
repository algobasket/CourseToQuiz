

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br><br>
         <?php if($section == "list"){ ?>
          <h2>Membership Users <a href="<?php echo base_url();?>admin/subscription/paid_subscribers_create" class="btn btn-secondary btn-sm float-right">Create New</a></h2>
          <?php echo $this->session->flashdata('alert');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Plan</th>
                    <th>Start</th>
                    <th>Expiry</th>
                    <th>Status</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($list as $key => $item){ ?>
                  <tr>
                    <th><?php echo $key + 1 ;?></th>
                    <th><?php echo $item['fullName'];?></th>
                    <th><?php echo $item['plan_title'];?></th>
                    <th><?php echo $item['valid_from'];?></th>
                    <th><?php echo $item['valid_upto'];?></th>
                    <th><?php echo $item['status_name'];?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/subscription/paid_subscribers_update/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/subscription/paid_subscribers_delete/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <h2>Create Plan</h2>
          <?php echo form_open('admin/subscription/paid_subscribers_create');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <th>User</th>
                    <th>
                      <select class="form-control" name="user">
                        <?php foreach($user as $u){ ?>
                         <option value="<?php echo $u['user_id'];?>"><?php echo $u['fullName'] .'-'.$u['email'];?></option>
                       <?php } ?>
                      </select>
                    </th>
               </tr>
               <tr>
                   <th>Plans</th>
                   <th>
                     <select class="form-control" name="plan">
                         <?php foreach($plan as $p){ ?>
                         <option value="<?php echo $p['id'];?>"><?php echo $p['plan_title'];?></option>
                         <?php } ?>
                     </select>
                   </th>
              </tr>
                <tr>
                     <th>Status</th>
                    <th>
                       <select class="form-control" name="status">
                         <?php foreach($status as $s){ ?>
                         <option value="<?php echo $s['id'];?>"><?php echo $s['status_name'];?></option>
                         <?php } ?>
                       </select>
                    </th>
                 </tr>
                 <tr>
                      <th></th>
                     <th>
                      <input type="submit" name="create" value="Create Subscription" class="btn btn-primary btn-sm" />

                     </th>
                  </tr>
            </table>
          </div>
          <?php echo form_close();?>
        <?php }elseif($section == "update"){ ?>
          <h2>Update Plan</h2>
          <?php echo form_open('admin/subscription/paid_subscribers_update/'.$this->uri->segment(4));?>
          <div class="table-responsive">
            <?php foreach($one as $item){ } ?>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Plan Name</th>
                    <th><input type="text" name="plan_title" value="<?php echo $item['plan_title'];?>" class="form-control" /></th>
               </tr>
               <tr>
                    <th>JSON Detail</th>
                    <th>
                      <textarea class="form-control" style="height:200px;fontSize:10px" name="json">
                      <?php echo $item['json'];?>
                     </textarea>
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
