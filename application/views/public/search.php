<?php include_once('public_header.php'); ?>
<div class="container">
<table class="table">
<h1>All Articles</h1>
<hr>
	<thead>
		<th>Sr. No</th>
		<th>Article Title</th>
		<th>Published On</th>
	</thead>
	<tbody>	
		<tr>
		<?php if(count($art_list)):
		 $count = $this->uri->segment(3 , 0);
		 foreach ($art_list as $value) { 
			?>	
			<td><?= ++$count ?></td>
			<td><?= $value->title;?></td>
			<td><?= "date" ?></td>
		</tr>
	 <?php	} ?>
	<?php else: ?>
	<tr>
		<td colspan="3">
			No Records Founds.
		</td>
	<?php endif; ?>
	</tr>
	</tbody>
</table>
</div>
<?php include_once('public_footer.php'); ?>
