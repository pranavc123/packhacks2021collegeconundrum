<?php
header("Access-Control-Allow-Origin: *");
include_once('config.php');

function validTransaction($pUsername, $pTitle, $pPayDate, $pAmount, $pDescription) {
    
    $validArgs = 1;
    
    if (!is_null($pUsername) && !empty($pUsername)) {
        $validArgs++;
    }
    if (!is_null($pTitle) && !empty($pTitle)) {
        $validArgs++;
    }
    if (!is_null($pPayDate) && !empty($pPayDate)) {
        $validArgs++;
    }
    if (!is_null($pAmount) && !empty($pAmount)) {
        $validArgs++;
    }
    
    return $validArgs;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Get data from the REST client

    $username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : "";
    $title = isset($_POST['title']) ? $conn->real_escape_string($_POST['title']) : "";
    $payDate = isset($_POST['payDate']) ? $conn->real_escape_string($_POST['payDate']) : "";
    $amount = isset($_POST['amount']) ? $conn->real_escape_string($_POST['amount']) : "";
    $description = isset($_POST['description']) ? $conn->real_escape_string($_POST['description']) : "";
    
    if (is_null($description) || empty($description)) {
        $description = "$title Transaction";
    }
    
    $uuidQuery = $conn->query("SELECT uuid FROM users WHERE username = '$username' ");
    
    if ($uuidQuery) {
    $uuid = $uuidQuery->fetch_row()[0];
    
    if (validTransaction($username, $title, $payDate, $amount, $description) == 5) {
    
        $sql = "INSERT INTO transactions (uuid, title, payDate, amount, description) VALUES('$uuid', '$title', '$payDate', '$amount', '$description');";
        $post_data_query = $conn->query($sql);
    
        if($post_data_query){
            $json = array("status" => 1, "Success" => "Successful Transaction!");
        }
        else{
            $json = array("status" => 0, "Error" => "Unsuccessful Transaction! Please try again! Update query did not go through.");
        }
    } else {
        $json = array("status" => 0, "Error" => "Null or empty key value");
    }
    } else {
        $json = array("status" => 0, "Error" => "User trying to add transaction does not exist.");
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