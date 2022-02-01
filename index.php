<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD Operation on JSON File using PHP</title>
</head>
<body>
<a href="add.php">Add</a>
<table border="1">
	<thead>
		<th>ID</th>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Address</th>
		<th>Gender</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php
			// Fetch data from json
			$data = file_get_contents('members.json');

			// Decode into php array
			$data = json_decode($data);
		?>
		<?php foreach($data as $row): ?>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->firstname; ?></td>
				<td><?php echo $row->lastname; ?></td>
				<td><?php echo $row->address; ?></td>
				<td><?php echo $row->gender; ?></td>
				<td>
					<a href='edit.php?id=<?php echo $row->id; ?>'>Edit</a>
					<a href='delete.php?id=<?php echo $row->id; ?>'>Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>