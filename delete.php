<?php
	// Get the id
	$id = $_GET['id']-1;

	// Fetch data from json
	$data = file_get_contents('members.json');

	// Decode into php array
	$data = json_decode($data);

	// Delete the row with the id
	unset($data[$id]);

	// Encode back to json
	$data = json_encode($data, JSON_PRETTY_PRINT);
	file_put_contents('members.json', $data);

	// Redirect to location
	header('location: index.php');
?>