

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <br><br>
    <?php if($section=='list'){ ?>
    <div class="alert alert-dark" role="alert">
      <h5>Quiz Settings  <a href="<?php echo base_url();?>admin/setting/quiz/create" class=" btn btn-primary btn-sm float-right">Add New Quiz Setting</a></h5>
   </div>
   <?php echo $this->session->flashdata('alert');?>
   <div class="container">
     <table class="table">
       <thead class="thead-dark">
       <tr>
         <th scope="col">#</th>
         <th scope="col">Setting Name</th>
         <th scope="col">Json</th>
         <th scope="col">Created/Updated</th>
         <th scope="col">Status</th>
         <th scope="col"></th>
         <th></th>
      </tr>
      </thead>
      <tbody>
        <?php
        if(is_array($list) && count($list) > 0){
        $i = 1;foreach($list as $r){ ?>
      <tr>
        <td scope="row"><?php echo $i;?></td>
        <td><?php echo $r['setting_name'];?></td>
        <td><?php echo substr($r['json_data'],0,50);?>....<a href="<?php echo base_url();?>admin/setting/quiz/view/<?php echo $r['id'];?>">Show</a></td>
        <td><?php echo date('d,M Y',strtotime($r['created']));?><br><?php echo date('d,M Y',strtotime($r['updated']));?></td>
        <td><?php echo getStatusName($r['status']);?></td>
        <td>
          <a href="<?php echo base_url();?>admin/setting/quiz/view/<?php echo $r['id'];?>" class="btn btn-primary btn-sm">View</a> |
          <a href="<?php echo base_url();?>admin/setting/quiz/edit/<?php echo $r['id'];?>" class="btn btn-primary btn-sm">Edit</a> |
          <a href="<?php echo base_url();?>admin/setting/quiz/delete/<?php echo $r['id'];?>" class="btn btn-primary btn-sm">Del</a>
        </td>
      <?php $i++;} }else{ ?>
       <td style="height:270px"></td>
      <?php } ?>
     </tr>
   </tbody>
     </table>
   </div>
 <?php }elseif($section=='create'){ ?>
   <div class="alert alert-dark" role="alert">
     <h5>Create New Quiz</h5>
  </div>
  <div class="container">
  <?php echo form_open('admin/setting/quiz/create') ;?>
   <div class="form-group">
     <label for="exampleInputEmail1">Quiz Setting Name</label>
     <input type="text" class="form-control" placeholder="Enter Quiz Setting Name" name="setting_name"/>
     <small id="emailHelp" class="form-text text-muted">Use quiz setting name specific to the features and functionalities</small>

   </div>
   <div class="form-group">
   <label for="exampleInputPassword1">JSON</label>
     <?php $array = [
                      "quiz_timeout_in_minute" => "30",
                      "instant_quiz_result"    => "" ,
                      "max_free_quiz_per_day_per_user" => ""
                      ];
          $json = json_encode($array, JSON_PRETTY_PRINT);
       ?>
     <textarea class="form-control" name="json_data" style="height:150px"><?php echo $json;?></textarea>
   </div>
   <div class="form-group">
   <label for="exampleInputPassword1">Status</label>
     <select class="form-control" name="status">
       <?php foreach($status as $s){ ?>
       <option value="<?php echo $s['id'];?>"><?php echo $s['status_name'];?></option>
     <?php } ?>
     </select>
   </div>

   <input type="submit" class="btn btn-primary" value="Submit" name="create" />
  <?php echo form_close() ;?>
</div>
<?php }elseif($section=='edit'){ foreach($one as $r){};?>
   <div class="alert alert-dark" role="alert">
     <h5>Edit Frontend Setting</h5>
  </div>
  <div class="container">
  <?php echo form_open('admin/setting/frontend/edit/'.$this->uri->segment(5)) ;?>
   <div class="form-group">
     <label for="exampleInputEmail1">Frontend Name</label>
     <input type="text" class="form-control" placeholder="Enter Frontend Name" name="setting_name" value="<?php echo $r['setting_name'];?>"/>
     <small id="emailHelp" class="form-text text-muted">Use frontend specific to that page layout</small>
   </div>
   <div class="form-group">
   <label for="exampleInputPassword1">JSON</label>
     <textarea class="form-control" name="json_data"><?php echo $r['json_data'];?></textarea>
   </div>
   <div class="form-group">
   <label for="exampleInputPassword1">Status</label>
     <select class="form-control" name="status">
       <?php foreach($status as $s){ ?>
       <option value="<?php echo $s['id'];?>"><?php echo $s['status_name'];?></option>
     <?php } ?>
     </select>
   </div>

   <input type="submit" class="btn btn-primary" value="Submit" name="edit" />
  <?php echo form_close() ;?>
  </div>
<?php }elseif($section=='view'){ ?>
    <div class="alert alert-dark" role="alert">
      <h5>Frontend Detail</h5>
   </div>
   <div class="container">
     <?php
     $json = json_encode($one[0],true);
     //echo jsonReadableHuman($json);
     echo str_replace(array("{", "}", '","'), array("{<br />&nbsp;&nbsp;&nbsp;&nbsp;", "<br />}", '",<br />&nbsp;&nbsp;&nbsp;&nbsp;"'),$json);
     ?>
   </div>
  <?php } ?>
  </main>
