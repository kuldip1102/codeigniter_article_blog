<?php include_once('public_header.php'); ?>

<div class="container">
	<?php echo form_open('login/admin_login');;?>
	<form class="form-horizontal">
  <fieldset>
    <legend>Admin Login</legend>
    <?php if($error = $this->session->flashdata('login_faild')): ?>
    <div>
      <div class="col-lg-6 alert alert-dismissible alert-danger">
        <?= $error ?>
    </div>
    </div>
  <?php endif; ?>
    <div class="clearfix"></div>
    <div class="form-group col-lg-6">
      <label for="inputEmail" class="col-sm-2 control-label">Username</label>
      <div class="col-lg-10">
      	<?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Email','value'=>set_value('username')]); ?>
      </div>
    </div>
    <div class="col-lg-6">
    	<?php echo form_error('username'); ?>
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-lg-6">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
      	<?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'password']); ?>
      </div>
    </div>
     <div class="col-lg-6">
    	<?php echo form_error('password'); ?>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      <?php
      	echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']),
      		 form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Login']);
       ?>
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php 
?>
<?php include_once('public_footer.php'); ?>
