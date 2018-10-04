

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br><br>
         <?php if($section == "list"){ ?>
          <h2>Subscription Plan <a href="<?php echo base_url();?>admin/subscription/create_plan" class="btn btn-secondary btn-sm float-right">Create New</a></h2>
          <?php echo $this->session->flashdata('alert');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Plan Name</th>
                    <th>Json</th>
                    <th>Status</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($list as $key => $item){ ?>
                  <tr>
                    <th><?php echo $key + 1 ;?></th>
                    <th><?php echo $item['plan_title'];?></th>
                    <th>
                      <?php
                        $json = json_decode($item['json'],true);
                        //print_r($json);
                        foreach($json as $jkey => $j){
                          if(is_array($j)){
                            echo $jkey .' : '. str_replace(',','<br>',implode(',',$j));
                          }else{
                            echo $jkey . ' : ' . $j . '<br>';
                          }

                        }
                      ?>
                    </th>
                    <th><?php echo $item['status_name'];?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/subscription/update_plan/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/subscription/delete_plan/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <h2>Create Plan</h2>
          <?php echo form_open('admin/subscription/create_plan');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <th>Plan Title</th>
                    <th><input type="text" name="plan_title" placeholder="Plan Title" name="title" class="form-control" autocomplete="off" required /></th>
               </tr>
               <tr>
                   <th>JSON Detail</th>
                   <th>
                     <textarea class="form-control" style="height:200px;fontSize:10px" name="json">
                     <?php $json = [
                                     "monthly" => "24",
                                     "currency" => "USD",
                                     "features" => [
                                          "10 Real Quiz",
                                          "Unlimited Test Quiz",
                                          "Preparation Notes",
                                          "Video Notes"
                                    ]];
                          echo jsonPreetify($json);
                       ?>
                    </textarea>
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
                      <input type="submit" name="create" value="Create Subscription" class="btn btn-primary btn-sm" />

                     </th>
                  </tr>
            </table>
          </div>
          <?php echo form_close();?>
        <?php }elseif($section == "update"){ ?>
          <h2>Update Plan</h2>
          <?php echo form_open('admin/subscription/update_plan/'.$this->uri->segment(4));?>
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
