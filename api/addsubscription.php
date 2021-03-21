<?php
header("Access-Control-Allow-Origin: *");
include_once('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Get data from the REST client

    $username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : "";
    $title = isset($_POST['title']) ? $conn->real_escape_string($_POST['title']) : "";
    $freq = isset($_POST['freq']) ? $conn->real_escape_string($_POST['freq']) : "";
    $payDate = isset($_POST['payDate']) ? $conn->real_escape_string($_POST['payDate']) : "";
    $amount = isset($_POST['amount']) ? $conn->real_escape_string($_POST['amount']) : "";
    $lastDate = isset($_POST['lastDate']) ? $conn->real_escape_string($_POST['lastDate']) : "";
    $description = isset($_POST['description']) ? $conn->real_escape_string($_POST['description']) : "";

    if (is_null($description) || empty($description)) {
        $description = "$title Subscription";
    }

    $uuidQuery = $conn->query("SELECT uuid FROM users WHERE username = '$username';");
    if ($uuidQuery) {

    $uuid = $uuidQuery->fetch_row()[0];
    $sql = "INSERT INTO subscriptions (uuid, title, freq, payDate, amount, lastDate, description) VALUES('$uuid', '$title', '$freq', '$payDate', '$amount', '$lastDate', '$description');";
    $post_data_query = $conn->query($sql);
    if($post_data_query){
       $json = array("status" => 1, "Success" => "Subscription has been added!");
    }
    else{
        $json = array("status" => 0, "Error" => "Error adding subscription! Please try again! Update query did not go through.");
    }
    } else {
        $json = array("status" => 0, "Error" => "User trying to add subscription does not exist.");
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