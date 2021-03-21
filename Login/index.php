<?php

?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<title>Login Form Design</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function login() {
            <?php
            $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://packhacks2021.srinath.tech/api/login");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                "username=${_POST['username']}&password=${_POST['password']}"
                );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        $jsonOutput = json_decode($server_output, true);
        if (intval($jsonOutput['status']) == 1 && !empty($_POST['password'])) {
            //Placeholder url to be navigated to on succesful authentication
            //Javscript code
            $expire = time()+60*60*24;
            setcookie("user", $_POST['username'], $expire, "/");
            header("Location: http://packhacks2021.srinath.tech/Landing/SiteInfo.php");
        }
        curl_close ($ch);
            ?>

        }

        function signup() {
            <?php
            $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://packhacks2021.srinath.tech/api/registernew");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                "username=${_POST['username']}&password=${_POST['password']}&firstName=User&lastName=Name"
                );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
            ?>
        }
    </script>

<body>
    

    <div class="wrapper">
        <div class="card">
            <div id="container">
                <form method="post" id="loginForm">
                    <h1>Login Form</h1>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button id="post-btn" onclick="login">Login</button>
                    <button id="post-btn2" onclick="signup">Sign Up</button>
                </form>

            </div>    
        </div>  
     </div>
    </body>
    <!-- <script src="main.js"></script> -->


</head>
</html>