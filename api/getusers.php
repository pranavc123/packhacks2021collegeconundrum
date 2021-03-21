<?php
	include_once('config.php');
	$sql = "SELECT * FROM users WHERE 1";

	$get_data_query = $conn -> query($sql) or die($conn -> error($conn));
		if($get_data_query -> num_rows!=0){
		$result = array();
		
		while($r = $get_data_query -> fetch_array(MYSQLI_ASSOC)){
			extract($r);
			$result[] = array("uuid" => $uuid, "username" => $username, "password" => $password, "firstName" => $firstName, "lastName" => $lastName);
		}
		$json = array("status" => 1, "info" => $result);
	}
	else{
		$json = array("status" => 0, "error" => "Users not found!");
	}
$conn->close();
// Set Content-type to JSON
header('Content-type: application/json');
echo json_encode($json);

?> 