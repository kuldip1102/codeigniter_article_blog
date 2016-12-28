<?php require_once('admin_header.php') ?>

<div class="container">
	<table>
	 <thead>
	 	<th>Sr.No.</th>
		<th>Title</th>
		<th>Action</th>
	 </thead>
	<tbody>
		<?php 
		if (count($art)) {
		foreach ($art as $value){
		?>
		<tr>
			<td>1</td>
			<td><?= $value['title'] ?></td>
			<td>
				<button class="btn btn-primary">Edit</button>
				<button class="btn btn-danger">Delete</button>
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
</div>
<?php require_once('admin_footer.php') ?>