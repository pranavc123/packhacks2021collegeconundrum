<?php
	include_once('config.php');

	$username = isset($_GET['username']) ? $conn->real_escape_string($_GET['username']) :  "";

	$uuidQuery = $conn->query("SELECT uuid FROM users WHERE username = '$username';");

    if ($uuidQuery) {
    	$uuid = $uuidQuery->fetch_row()[0];
		$sql = "SELECT * FROM subscriptions WHERE uuid = '$uuid'";

		$get_data_query = $conn -> query($sql) or die($conn -> error($conn));
			if($get_data_query -> num_rows!=0){
			$result = array();
			
			while($r = $get_data_query -> fetch_array(MYSQLI_ASSOC)){
				extract($r);
				$result[] = array("uuid" => $uuid, "title" => $title, "freq" => $freq, "payDate" => $payDate, "amount" => $amount, "lastDate" => $lastDate, "description" => $description);
			}
			$json = array("status" => 1, "info" => $result);
		}
		else{
			$json = array("status" => 0, "error" => "Subscriptions not found!");
		}
	}
    else {
		$json = array("status" => 0, "error" => "User does not exist!");
	}
$conn->close();
// Set Content-type to JSON
header('Content-type: application/json');
echo json_encode($json);

?> 