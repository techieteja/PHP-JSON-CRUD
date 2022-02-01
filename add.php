<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add - JSON File using PHP</title>
</head>
<body>
<form method="POST">
	<a href="index.php">Back</a>
	<p>
		<label for="firstname">Firstname</label>
		<input type="text" id="firstname" name="firstname">
	</p>
	<p>
		<label for="lastname">Lastname</label>
		<input type="text" id="lastname" name="lastname">
	</p>
	<p>
		<label for="address">Address</label>
		<input type="text" id="address" name="address">
	</p>
	<p>
		<label for="gender">Gender</label>
		<input type="text" id="gender" name="gender">
	</p>
	<input type="submit" name="save" value="Save">
</form>

<?php
	if(isset($_POST['save'])){
		// Open the json file
		$data = file_get_contents('members.json');

		// Decode into php array
		$data = json_decode($data);

		// Fetch each row
		foreach($data as $row){
			$row_num = $row->id;
		}

		// Find if row num less than one
		if($row_num < 1){
			$row_num = 1;
		}else{
			$row_num = $row_num;
		}

		// Data in out POST
		$input = array(
			'id' => $row_num,
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'address' => $_POST['address'],
			'gender' => $_POST['gender']
		);

		// Append the input to our array
		$data[] = $input;

		// Encode back to json
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('members.json', $data);

		// Redirect to location
		header('location: index.php');
	}
?>
</body>
</html>