<?php if(in_array(@$this->session->userdata('rolename'),array('admin'))){ ?>
<?php $this->load->view('template/admin-header');?>
<?php }else{ ?>
 <?php $this->load->view('template/header');?>
<?php } ?>

<?php $this->load->view($page);?>

<?php if(in_array(@$this->session->userdata('rolename'),array('admin'))){ ?>
<?php $this->load->view('template/admin-footer');?>
<?php }else{ ?>
<?php $this->load->view('template/footer');?>
<?php } ?>
