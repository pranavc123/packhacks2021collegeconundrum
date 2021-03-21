<?php

?>
<html>
  <head>
    <title>Parallax Template - uplusion23</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.5.5/jquery.smooth-scroll.min.js"></script>
  </head>
  <body>
    <link href='SiteInfo.css' rel='stylesheet' type='text/css'>
    <div class="navbar">
      <ul class="navbar-container">
        <li><a href="#" class="left-underline nav-button brand-logo">[Insert Brand Logo]</a></li>
        <li class="nav-item"><a href="http://packhacks2021.srinath.tech/Login/index" class="left-underline nav-button" data-scroll>Login</a></li>
        <li class="nav-item active"><a href="#section-1" class="left-underline nav-button" data-scroll>Home</a></li>
      </ul>
    </div>
    <div class="parallax p1" id="section-1">
      <hgroup>
        <h1>Subscriptions.io</h1>
      </hgroup>
    </div>
    <div class="row">
      <div class="column">
        <h2>Ongoing Subscriptions</h>
        <?php
          $currentUser = $_COOKIE["user"];
          $decodedSub = json_decode(file_get_contents("http://packhacks2021.srinath.tech/api/getsubscriptions?username=$currentUser"), true);
          for ($i = 0; $i < count($decodedSub["info"]); $i++) {
            $title = $decodedSub["info"][$i]["title"];
            ?>
            <h3><?php echo $title; ?></h3>
            <?php
          }
          
        ?>
      </div>
      <div class="column">
        <h2>Recent Transactions</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <img src="../Images/finance.webp" width="400" height="300">
        <h1>[Insert Quote here]</h1>
      </div>
      <div class="col-3">
        <img src="../Images/subscriptions.jpg" width="400" height="300">
        <h1>[Insert Quote here]</h1>
      </div>
      <div class="col-3">
        <img src="../Images/calc.jpg" width="400" height="300">
        <h1>[Insert Quote here]</h1>
      </div>
    </div>
  </body>
</html>
