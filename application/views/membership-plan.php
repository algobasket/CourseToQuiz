<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h2 class="display-4">Membership & Get Certified</h2>
      <p class="lead">Get all the benefits with our membership plan and get certified</p>
      <?php if($this->session->flashdata('alert')) : ?>
       <div class="lead">
         <?php echo $this->session->flashdata('alert');?>
       </div>
      <?php endif ?>
    </div>


    <div class="container">
      <div class="card-deck mb-3 text-center">
          <?php foreach($membership_plans as $member) : ?>
            <?php $json = json_decode($member['json'],true);?>
            <div class="card mb-4 shadow-sm">
              <div class="card-header">
                <h4 class="my-0 font-weight-normal"><?php echo $member['plan_title'];?></h4>
              </div>
              <div class="card-body">
                <h3 class="card-title pricing-card-title"><?php echo $json['monthly'];?> <?php echo $json['currency'];?> /mon</h3>
                <ul class="list-unstyled mt-3 mb-4">
                 <?php foreach($json['features'] as $f) : ?>
                  <li><?php echo $f;?></li>
                <?php endforeach ?>
                </ul>
                <a href="<?php echo base_url();?>membership-plan/?payment=_&planID=<?php echo $member['id'];?>" class="btn btn-lg btn-block btn-outline-dark">
                  Sign up for free</a>
              </div>
            </div>
          <?php endforeach ?>
      </div>
      </div>
