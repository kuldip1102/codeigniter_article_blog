<?php 
	include_once('admin_header.php');
?>

<div class="container">
	<?php echo form_open('admin/store_article',['class'=>'form-horizontal']);?>
	<?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>
	<form class="form-horizontal">
  <fieldset>
    <legend>Add article</legend>
    <div class="form-group col-lg-6">
      <label for="inputEmail" class="col-sm-4 control-label">Article Title</label>
      <div class="col-lg-8">
      	<?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Article Title','value'=>set_value('title')]); ?>
      </div>
    </div>
    <div class="col-lg-6">
    	<?php echo form_error('title'); ?>
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-lg-6">
      <label for="inputPassword" class="col-lg-4 control-label">Article Body</label>
      <div class="col-lg-8">
      	<?php echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Article Body','value'=>set_value('body')]); ?>
      </div>
    </div>
     <div class="col-lg-6">
    	<?php echo form_error('body'); ?>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      <?php
      	echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']),
      		 form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Submit']);
       ?>
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php validation_errors(); ?>

<?php 
	include_once('admin_footer.php');
?>