<?php foreach($one as $r){} ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container">
  <br>
  <div class="row">
   <h4><?php echo $r['course_title'];?></h4>
  </div>
  <div class="row">
  <div class="btn-group">
   <a href="<?php echo base_url();?>admin/courses/update_course_detail/<?php echo $this->uri->segment(4);?>/add_chapter" class="btn btn-dark btn-sm"> <i class="fa fa-plus"></i> Add New Chapter</a>
   <a href="<?php echo base_url();?>admin/courses/update_course_detail/<?php echo $this->uri->segment(4);?>/add_video" class="btn btn-danger btn-sm"> <i class="fa fa-play"></i> Add New Video</a>
  </div>
</div>
<br>
  <?php echo $this->session->flashdata('alert');?>
  <?php if($section == "chapter_video") : ?>
    <br>
   <div class="row"><br><h4><i class="fa fa-book"></i> Chapters</h4></div>
  <table class="table">
   <thead>
   <tr>
     <th>Chapter Title</th>
     <th>Description</th>
     <th>Attachment</th>
     <th>Updated</th>
     <th>Status</th>
     <th></th>
   </tr>
   </thead>
   <tbody>
   <?php foreach($chapters as $r){ ?>
   <tr>
      <td><?php echo $r['chapter_title'];?></td>
      <td><?php echo $r['description'];?></td>
      <td><?php echo $r['attachments'];?></td>
      <td><?php echo $r['updated'];?></td>
      <td class="text-center <?php echo getStatusBgClassName($r['status']);?>"><?php echo getStatusName($r['status']);?></td>
     <th>
       <a href="<?php echo base_url();?>admin/courses/update_course_detail/1/edit_chapter/<?php echo $r['id'];?>">
         <i class="fa fa-pencil-square-o" title="Edit"></i>
       </a> &nbsp;| &nbsp;
       <a href="javascript:void(0)" class="chapterDelete" data-delete="<?php echo base_url();?>admin/courses/update_course_detail/1/delete_chapter/<?php echo $r['id'];?>">
         <i class="fa fa-trash-o" title="Delete"></i>
       </a>
    </th>
   </tr>
   <?php } ?>
 </tbody>
  </table>
  <h4><i class="fa fa-play"></i> Videos</h4>
  <table class="table">
    <thead>
    <tr>
      <th>Video Title</th>
      <th>File Name</th>
      <th>External Link</th>
      <th>Updated</th>
      <th>Status</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($videos as $r2){ ?>
    <tr>
       <td><?php echo $r2['video_title'];?></td>
       <td><?php echo $r2['file_name'];?></td>
       <td><?php echo $r2['external_link'];?></td>
       <td><?php echo $r2['updated'];?></td>
       <td class="text-center <?php echo getStatusBgClassName($r2['status']);?>"><?php echo getStatusName($r2['status']);?></td>
       <td></td>
    </tr>
    <?php } ?>
  </tbody>
  </table>
  <?php endif ?>
  <?php if($section == "edit_chapter") : ?>

     <?php echo form_open_multipart('admin/courses/update_course_detail/'.$this->uri->segment(4)."/edit_chapter/".$this->uri->segment(4));?>

        <h4>Edit Chapter</h4>
        <?php foreach($chapters as $r){} ?>
         <div class="form-group">
           <label>Chapter Title</label>
           <input type="text" class="form-control" value="<?php echo $r['chapter_title'];?>" name="title" placeholder="Chapter Title" required/>
         </div>
         <div class="form-group">
             <label>Chapter Description</label>
             <textarea class="form-control" style="height:300px" name="description" placeholder="Chapter Description" required><?php echo $r['description'];?></textarea>
          </div>

           <?php if($r['attachments']){ ?>
           <div class="form-group">
              <label>Chapter Attachment</label>
               <br>Recent File : <?php echo $r['attachments'];?> <br>
              <input type="file" name="attachment" class="form-control" />
           </div>
           <?php } ?>

           <div class="form-group">
             <label>Status</label>
             <select class="form-control" name="status">
               <option value="1">Active</option>
               <option value="0">Inactive</option>
             </select>
           </div>
          <div class="form-group">
               <input type="submit" name="edit_chapter" value="Edit Chapter" class="btn btn-primary"/>
          </div>
     <?php echo form_close();?>
  <?php endif ?>
  <?php if($section == "add_chapter") : ?>
  <br>
   <?php echo form_open_multipart('admin/courses/update_course_detail/'.$this->uri->segment(4).'/add_chapter');?>
      <br><br>
       <div class="form-group">
         <label>Chapter Title</label>
         <input type="text" class="form-control" name="title" placeholder="Chapter Title" required/>
       </div>
       <div class="form-group">
           <label>Chapter Description</label>
           <textarea class="form-control" style="height:300px" name="description" placeholder="Chapter Description" required></textarea>
        </div>
        <div class="form-group">
            <label>Chapter Attachment</label>
            <input type="file" name="attachment" class="form-control" />
         </div>
         <div class="form-group">
           <label>Status</label>
           <select class="form-control" name="status">
             <option value="1">Active</option>
             <option value="0">Inactive</option>
           </select>
         </div>
        <div class="form-group">
             <input type="submit" name="edit" value="create chapter" class="btn btn-primary"/>
        </div>
   <?php echo form_close();?>
  <?php endif ?>

  <?php if($section == "add_video") : ?>
  <br>
   <?php echo form_open_multipart('admin/courses/update_course_detail/'.$this->uri->segment(4).'/add_video');?>
      <br><br>
       <div class="form-group">
         <label>Video Title</label>
         <input type="text" class="form-control" name="title" placeholder="Video Title" required/>
       </div>
       <div class="form-group">
           <label>Video upload</label>
           <input type="file" name="video_file" class="form-control" />
        </div>
        <div class="form-group">
            <label>Or - External Video Link</label>
            <input type="text" name="video_link_ex" class="form-control" placeholder="External Video Link"/>
         </div>
         <div class="form-group">
           <label>Status</label>
           <select class="form-control" name="status">
             <option value="1">Active</option>
             <option value="0">Inactive</option>
           </select>
         </div>
        <div class="form-group">
             <input type="submit" name="video_upload" value="Upload video" class="btn btn-primary"/>
        </div>
   <?php echo form_close();?>
  <?php endif ?>

</div>
</main>
<div class="modal chapterDeletePop" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you want to remove this chapter ?</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary modalDeleteLink">Confirm Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
