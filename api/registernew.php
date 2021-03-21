<?php
header("Access-Control-Allow-Origin: *");
include_once('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Get data from the REST client

	$username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : "";
	$password = isset($_POST['password']) ? $conn->real_escape_string($_POST['password']) : "";
	$firstName = isset($_POST['firstName']) ? $conn->real_escape_string($_POST['firstName']) : "";
	$lastName = isset($_POST['lastName']) ? $conn->real_escape_string($_POST['lastName']) : "";

	if (is_null($firstName) || empty($firstName)) {
		$firstName = "User";
	}
	
	$check_usernames = $conn->query("SELECT username FROM users WHERE username = '$username'");
	if (!is_null($username) && !empty($username) && !is_null($password) && !empty($password)) {


	if ($check_usernames && count($check_usernames->fetch_row())==0) {
		// Insert data into database
		$sql = "INSERT INTO users (uuid, username, password, firstName, lastName) VALUES(uuid(), '$username', '$password', '$firstName', '$lastName');";
		$post_data_query = $conn->query($sql);
		if($post_data_query){
			$json = array("status" => 1, "Success" => "You have been registered!");
		}
		else{
			$json = array("status" => 0, "Error" => "Error registering! Please try again! Update query did not go through.");
		}
	} else if ($check_usernames) {
		$json = array("status" => 0, "Error" => "A user with that username already exists!");
	} else {
		$json = array("status" => 0, "Error" => "Error registering! Please try again! Username check query did not go through." );
	}
	} else {
		$json = array("status" => 0, "Error" => "Error registering! Username and password must be filled in." );
	}

	
}
else{
	$json = array("status" => 0, "Info" => "Request method not accepted!");
}
$conn->close();
// Set Content-type to JSON
header('Content-type: application/json');
echo json_encode($json);

?>