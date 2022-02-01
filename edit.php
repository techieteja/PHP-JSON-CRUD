<?php
// Get the id
$id = $_GET['id'];

// Open the json file
$data = file_get_contents('members.json');

// Decode into php array
$data = json_decode($data);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit - JSON File using PHP</title>
</head>
<body>
<form method="POST">
	<a href="index.php">Back</a>
	<?php foreach($data as $row): ?>
		<?php if($row->id == $id): ?>
			<p>
				<label for="id">ID</label>
				<input type="text" id="id" name="id" value="<?php echo $row->id; ?>">
			</p>
			<p>
				<label for="firstname">Firstname</label>
				<input type="text" id="firstname" name="firstname" value="<?php echo $row->firstname; ?>">
			</p>
			<p>
				<label for="lastname">Lastname</label>
				<input type="text" id="lastname" name="lastname" value="<?php echo $row->lastname; ?>">
			</p>
			<p>
				<label for="address">Address</label>
				<input type="text" id="address" name="address" value="<?php echo $row->address; ?>">
			</p>
			<p>
				<label for="gender">Gender</label>
				<input type="text" id="gender" name="gender" value="<?php echo $row->gender; ?>">
			</p>
			<input type="submit" name="save" value="Save">
		<?php endif; ?>
	<?php endforeach; ?>
</form>

<?php
	if(isset($_POST['save'])){
		//set the updated values
		$input = array(
			'id' => $_POST['id'],
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'address' => $_POST['address'],
			'gender' => $_POST['gender']
		);

		//update the selected index
		$data_array[$index] = $input;

		//encode back to json
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('members.json', $data);

		// Redirect to location
		header('location: index.php');
	}
?>
</body>
</html>