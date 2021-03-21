<?php
header("Access-Control-Allow-Origin: *");
include_once('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Get data from the REST client

    $username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : "";
    $password = isset($_POST['password']) ? $conn->real_escape_string($_POST['password']) : "";

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";

    $post_data_query = $conn->query($sql);
    if($post_data_query){
        if (count($post_data_query->fetch_row()) > 0) {
            $json = array("status" => 1, "Success" => "User has been authenticated.");
        } else {
            $json = array("status" => 0, "Error" => "Invalid username or password.");
        }
    }
    else{
        $json = array("status" => 0, "Error" => "Error communicating with database.");
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