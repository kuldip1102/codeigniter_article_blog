<?php require_once('admin_header.php') ?>

<div class="container">
<div class="row">
	<div class="col-lg-6 col-lg-offset-6">
	<?= anchor('admin/add_article','Add Article',['class'=>'btn btn-primary pull-right']); ?>
	</div>
</div>
<?php if($feedback = $this->session->flashdata('feedback')):
   $feedback_class = $this->session->flashdata('feedback_class'); ?>
    <div class="col-lg-6 col-lg-offset-3">
      <div class=" alert alert-dismissible <?= $feedback_class ?>">
        <?= $feedback ?>
    </div>
    </div>
  <?php endif; ?>
  <div class="clearfix"></div>
	<table class="table">
	 <thead>
	 	<th>Sr.No.</th>
		<th>Title</th>
		<th>Action</th>
	 </thead>
	<tbody>
		<?php 
		if (count($art)) {
			$count = $this->uri->segment(3);
		foreach ($art as $value){
		?>
		<tr>
			<td><?= ++$count ?></td>
			<td><?= $value->title ?></td>
			<td>
			<?= anchor("admin/edit_article/{$value->id}",'Edit',['class'=>'btn btn-primary']); ?>
				<?= anchor("admin/delete_article/{$value->id}",'Delete',['class'=>'btn btn-danger']); ?>
				
			</td>
		</tr>
	<?php 
		}
	}else{
	echo "<tr><td colspan='3'> No Records Found </td></tr>";
	}
	 ?>

	</tbody>	
	</table>
	<?= $this->pagination->create_links(); ?>
</div>
<?php require_once('admin_footer.php') ?>