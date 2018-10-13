<?php if(in_array($this->session->userdata('rolename'),array('admin'))) : ?>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="#">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(2) == 'category') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/category">
          <span data-feather="file"></span>
          Category
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(2) == 'courses') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/courses">
          &nbsp;&nbsp;<i class="fa fa-book"></i>
          Courses
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(2) == 'quiz') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/quiz">
          &nbsp;&nbsp;<i class="fa fa-code"></i>
          Quiz
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(2) == 'quiz') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/quiz">
          <i class="fa fa-files-o"></i>
          &nbsp;&nbsp;Quiz Results
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(2) == 'answer') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/answer">
        <i class="fa fa-th-large"></i>
          &nbsp;&nbsp;Options
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(2) == 'question') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/question">
          <i class="fa fa-clipboard"></i>
          &nbsp;&nbsp;Question Bank
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(2) == 'user') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/user">
          <i class="fa fa-user"></i>
          &nbsp;&nbsp;Users
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(3) == 'paid_subscribers') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/subscription/paid_subscribers">
          <span data-feather="layers"></span>
          Paid Subscribers
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(3) == 'plans') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/subscription/plans">
          <span data-feather="layers"></span>
          Subscription Plan
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(3) == 'payment') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/payment">
          <i class="fa fa-credit-card-alt"></i>
           &nbsp;&nbsp;Payment
          <a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(3) == 'setting') ? 'bg-primary' : '';?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/setting">
          <i class="fa fa-cog"></i>
            &nbsp;&nbsp;Setting
        </a>
      </li>

    </ul>

    <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Social Media</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
           This Month
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Last quarter
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Social engagement
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Year-end sale
        </a>
      </li>
    </ul> -->
  </div>
</nav>
<?php endif ?>
