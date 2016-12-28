<!DOCTYPE html>
<html>
<head>
	<title>Blog Index</title>
</head>
<body>
<form>
	
	<table border="1">
		<tr>
			<th>Id</th>
			<th>Item Name</th>
			<th>Item Description</th>
		</tr>
		<?php foreach ($array_model as $key => $values): ?>	
		<tr>
		
			<td><?= $values['item_id'] ?></td>
			<td><?= $values['item_name'] ?></td>
			<td><?= $values['item_desc'] ?></td>
		<?php endforeach; ?>
		</tr>
	</table>

</form>
</body>
</html>