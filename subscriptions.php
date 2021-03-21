<?php
$currentUser = $_COOKIE["user"];
if (!empty($_POST["comment"])) {
            $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://packhacks2021.srinath.tech/api/addsubscription");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                "title=${_POST['title']}&payDate=${_POST['trip-start']}&amount=${_POST['amount']}&description=${_POST['comment']}&username=${currentUser}"
                );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
            
}

?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="transactions.css">
</head>

<body>


    <h2>Subscription Editor</h2>
    <form method="post" id="usrform">
        <label for="title">Subscription Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <br><br>
        <label for="start">Date paid:</label>
        <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2022-12-31">
        <br><br>
        <label for="amount">Amount paid:</label><br>
        <input type="text" id="amount" name="amount"><br><br>
        <textarea rows="4" cols="50" name="comment" form="usrform">
            Enter description here...</textarea>
        <br><br>
        <input type="submit" value="Submit">

    </form>

</body>

</html>