<ul class="list-group">
 <li class="list-group-item alert-info openMenu <?php echo ($this->uri->segment(1) == "welcome") ? "bg-info" : "";?>" data-href="<?php echo base_url();?>welcome"><h4>Dashboard</h4></li>
 <li class="list-group-item openMenu <?php echo ($this->uri->segment(1) == "courses") ? "bg-info" : "";?>" data-href="<?php echo base_url();?>courses">Browse All Course<br><small><?php echo $reports['total_course'];?>+ courses available</small></li>
 <li class="list-group-item openMenu <?php echo ($this->uri->segment(1) == "quiz") ? "bg-info" : "";?>" data-href="<?php echo base_url();?>quiz">Take Quiz <br><small><?php echo $reports['total_quiz'];?>+ questions available</small><span class="badge badge-info float-right"><?php echo $reports['total_quiz'];?></span></li>
 <li class="list-group-item openMenu <?php echo ($this->uri->segment(1) == "my-course") ? "bg-info" : "";?>" data-href="<?php echo base_url();?>my-course">My Course <span class="badge badge-info float-right"><?php echo $reports['course_taken'];?></span></li>
 <li class="list-group-item openMenu <?php echo ($this->uri->segment(1) == "my-quiz") ? "bg-info" : "";?>" data-href="<?php echo base_url();?>my-quiz">Quiz History<span class="badge badge-info float-right"><?php echo $reports['quiz_taken'];?></span></li>
 <!-- <li class="list-group-item openMenu <?php //echo ($this->uri->segment(1) == "my-exam") ? "bg-info" : "";?>" data-href="<?php //echo base_url();?>my-exam">Take Exams <span class="badge badge-info float-right">0</span></li>
 <li class="list-group-item openMenu <?php //echo ($this->uri->segment(1) == "my-certification") ? "bg-info" : "";?>" data-href="<?php //echo base_url();?>my-certification">Certification <span class="badge badge-info float-right">0</span></li>
 <li class="list-group-item openMenu <?php //echo ($this->uri->segment(1) == "bookmark") ? "bg-info" : "";?>" data-href="<?php //echo base_url();?>bookmark">Bookmarks <span class="badge badge-info float-right">0</span></li> -->

</ul>
