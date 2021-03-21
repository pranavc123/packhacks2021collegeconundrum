<?php
$currentUser = $_COOKIE["user"];
?>
<html>
  <head>
    <title>Subscriptions.io</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.5.5/jquery.smooth-scroll.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </head>
  <body>
    <link href='SiteInfo.css' rel='stylesheet' type='text/css'>
    <div class="navbar">
      <ul class="navbar-container">
        <li><a href="#" class="left-underline nav-button brand-logo">User: <?php echo $currentUser; ?></a></li>
        <li class="nav-item"><a href="http://packhacks2021.srinath.tech/Login/index" class="left-underline nav-button" data-scroll>Login</a></li>
        <li class="nav-item active"><a href="#section-1" class="left-underline nav-button" data-scroll>Home</a></li>
      </ul>
    </div>
    <div class="parallax p1" id="section-1">
      <hgroup>
        <h1>Subscriptions.io</h1>
      </hgroup>
    </div>
    <div class="container">
    <div class="row">
      <div class="col">
        <h2>Ongoing Subscriptions</h2>
        <?php
          
          $decodedSub = json_decode(file_get_contents("http://packhacks2021.srinath.tech/api/getsubscriptions?username=$currentUser"), true);
          for ($i = 0; $i < count($decodedSub["info"]); $i++) {
            $title = $decodedSub["info"][$i]["title"];
            $amount = $decodedSub["info"][$i]["amount"];
            ?>

            <div class="card border-success mb-3" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title"><?php echo $title; ?></h5>
            <p class="card-text">Paying $<?php echo $amount; ?> per month.</p>
            </div>
            </div>
            <?php
          }
          
        ?>
      </div>
      <div class="col">
        <h2>Recent Transactions</h2>
      </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col">
        <img src="../Images/finance.webp" width="400" height="300">
        <h1>[Insert Quote here]</h1>
      </div>
      <div class="col">
        <img src="../Images/subscriptions.jpg" width="400" height="300">
        <h1>[Insert Quote here]</h1>
      </div>
      <div class="col">
        <img src="../Images/calc.jpg" width="400" height="300">
        <h1>[Insert Quote here]</h1>
      </div>
    </div>
  </body>
</html>
