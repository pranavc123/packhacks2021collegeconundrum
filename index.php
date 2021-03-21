<?php
$currentUser = $_COOKIE["user"];
?>
<!DOCTYPE html>
<html>
<title>ap.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.apschools.com/apcss/4/ap.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Raleway", sans-serif
    }
</style>


<body class="ap-light-grey">

    <!-- Top container -->
    <div class="ap-bar ap-top ap-black ap-large" style="z-index:4">
        <button class="ap-bar-item ap-button ap-hide-large ap-hover-none ap-hover-text-light-grey" onclick="ap_open();"><i
        class="fa fa-bars"></i> Menu</button>
        <li class="nav-item"><a href="Login/index.html" class="left-underline nav-button" data-scroll>Login</a></li>
    </div>

    <!-- Sidebar/menu -->
    <nav class="ap-sidebar ap-collapse ap-white ap-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="ap-container ap-row">
            <div class="ap-col s4">
                <img src="/apimages/avatar2.png" class="ap-circle ap-margin-right" style="width:46px">
            </div>
            <div class="ap-col s8 ap-bar">
                <span>Welcome, <strong><?php echo $currentUser ?></strong></span><br>
                <a href="#" class="ap-bar-item ap-button"><i class="fa fa-envelope"></i></a>
                <a href="#" class="ap-bar-item ap-button"><i class="fa fa-user"></i></a>
                <a href="#" class="ap-bar-item ap-button"><i class="fa fa-cog"></i></a>
            </div>
        </div>
        <hr>
        <div class="ap-container">
            <h5> Subscription Dashboard</h5>
        </div>
        <div class="ap-bar-block">
            <a href="#" class="ap-bar-item ap-button ap-padding-16 ap-hide-large ap-dark-grey ap-hover-black" onclick="ap_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="#" class="ap-bar-item ap-button ap-padding ap-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
            <a href="#" class="ap-bar-item ap-button ap-padding"><i class="fa fa-eye fa-fw"></i>  Transactions</a>
            <!--             <a href="#" class="ap-bar-item ap-button ap-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
            <a href="#" class="ap-bar-item ap-button ap-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
            <a href="#" class="ap-bar-item ap-button ap-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
            <a href="#" class="ap-bar-item ap-button ap-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
            <a href="#" class="ap-bar-item ap-button ap-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
            <a href="#" class="ap-bar-item ap-button ap-padding"><i class="fa fa-history fa-fw"></i>  History</a>
            <a href="#" class="ap-bar-item ap-button ap-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br> -->
        </div>
    </nav>




    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="ap-overlay ap-hide-large ap-animate-opacity" onclick="ap_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <!-- !PAGE CONTENT! -->
    <div class="ap-main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->
        <header class="ap-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> Upcoming Transactions</b></h5>
        </header>

        <div class="ap-row-padding ap-margin-bottom">
            <div class="ap-quarter">
                <div class="ap-container ap-red ap-padding-16">
                    <div class="ap-left"><img src="Icons/number1.png" style="width:50px;height:50px;"></div>
                    <div class="ap-right">
                        <h5>Days Until Payment: 3</h5>
                    </div>
                    <div class="ap-clear"></div>
                    <h4>Netflix</h4>
                </div>
            </div>
            <div class="ap-quarter">
                <div class="ap-container ap-blue ap-padding-16">
                    <div class="ap-left"><img src="Icons/number2.png" style="width:50px;height:50px;"></div>
                    <div class="ap-right">
                        <h5>Days Until Payment: 5</h5>
                    </div>
                    <div class="ap-clear"></div>
                    <h4>Amazon Prime</h4>
                </div>
            </div>
            <div class="ap-quarter">
                <div class="ap-container ap-light-green ap-padding-16">
                    <div class="ap-left"><img src="Icons/number3.png" style="width:50px;height:50px;"></div>
                    <div class="ap-right">
                        <h5>Days Until Payment: 6</h5>
                    </div>
                    <div class="ap-clear"></div>
                    <h4>Hulu</h4>
                </div>
            </div>
            <div class="ap-quarter">
                <div class="ap-container ap-green ap-text-white ap-padding-16">
                    <div class="ap-left"><img src="Icons/number4.png" style="width:50px;height:50px;"></div>
                    <div class="ap-right">
                        <h5>Days Until Payment: 7</h5>
                    </div>
                    <div class="ap-clear"></div>
                    <h4>Spotify</h4>
                </div>
            </div>
        </div>

        <div class="ap-panel">
            <div class="ap-row-padding" style="margin:0 -16px">
                <div class="ap-container">
                    <h5>Most Expensive Subscriptions Past Month</h5>
                    <table class="ap-table ap-striped ap-white">
                        
                            <?php
          
          $decodedSub = json_decode(file_get_contents("http://packhacks2021.srinath.tech/api/getsubscriptions?username=$currentUser"), true);
          for ($i = 0; $i < count($decodedSub["info"]); $i++) {
            $title = $decodedSub["info"][$i]["title"];
            $amount = $decodedSub["info"][$i]["amount"];
            ?>
                            <tr>
                            <td><?php echo $title ?></td>
                            <td><i>$<?php echo $amount ?></i></td>
                            </tr>
                            <?php
          }
          
        ?>
                        
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <!--   <div class="ap-container">
            <h5>General Stats</h5>
            <p>Change in Spending</p>
            <div class="ap-grey">
                <div class="ap-container ap-center ap-padding ap-green" style="width:25%">+25%</div>
            </div>

            <p>New Users</p>
            <div class="ap-grey">
                <div class="ap-container ap-center ap-padding ap-orange" style="width:50%">50%</div>
            </div>

            <p>Bounce Rate</p>
            <div class="ap-grey">
                <div class="ap-container ap-center ap-padding ap-red" style="width:75%">75%</div>
            </div>
        </div>
        <hr>

        <div class="ap-container">
            <h5>Recent Transactions</h5>
            <table class="ap-table ap-striped ap-bordered ap-border ap-hoverable ap-white">
                <tr>
                    <td>United States</td>
                    <td>65%</td>
                </tr>
                <tr>
                    <td>UK</td>
                    <td>15.7%</td>
                </tr>
                <tr>
                    <td>Russia</td>
                    <td>5.6%</td>
                </tr>
                <tr>
                    <td>Spain</td>
                    <td>2.1%</td>
                </tr>
                <tr>
                    <td>India</td>
                    <td>1.9%</td>
                </tr>
                <tr>
                    <td>France</td>
                    <td>1.5%</td>
                </tr>
            </table><br>
            <button class="ap-button ap-dark-grey">Complete List of Recent Transactions <i
          class="fa fa-arrow-right"></i></button>
        </div> -->
        <!--   <hr>
  <div class="ap-container">
    <h5>Recent Users</h5>
    <ul class="ap-ul ap-card-4 ap-white">
      <li class="ap-padding-16">
        <img src="/apimages/avatar2.png" class="ap-left ap-circle ap-margin-right" style="width:35px">
        <span class="ap-xlarge">Mike</span><br>
      </li>
      <li class="ap-padding-16">
        <img src="/apimages/avatar5.png" class="ap-left ap-circle ap-margin-right" style="width:35px">
        <span class="ap-xlarge">Jill</span><br>
      </li>
      <li class="ap-padding-16">
        <img src="/apimages/avatar6.png" class="ap-left ap-circle ap-margin-right" style="width:35px">
        <span class="ap-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr> -->

        <!--         <div class="ap-container">
            <h5>Recent Comments</h5>
            <div class="ap-row">
                <div class="ap-col m2 text-center">
                    <img class="ap-circle" src="/apimages/avatar3.png" style="width:96px;height:96px">
                </div>
                <div class="ap-col m10 ap-container">
                    <h4>John <span class="ap-opacity ap-medium">Sep 29, 2014, 9:12 PM</span></h4>
                    <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
                </div>
            </div>

            <div class="ap-row">
                <div class="ap-col m2 text-center">
                    <img class="ap-circle" src="/apimages/avatar1.png" style="width:96px;height:96px">
                </div>
                <div class="ap-col m10 ap-container">
                    <h4>Bo <span class="ap-opacity ap-medium">Sep 28, 2014, 10:15 PM</span></h4>
                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
                </div>
            </div>
        </div> -->
        <br>
        <!-- <div class="ap-container ap-dark-grey ap-padding-32">
            <div class="ap-row">
                <div class="ap-container ap-third">
                    <h5 class="ap-bottombar ap-border-green">Demographic</h5>
                    <p>Language</p>
                    <p>Country</p>
                    <p>City</p>
                </div>
                <div class="ap-container ap-third">
                    <h5 class="ap-bottombar ap-border-red">System</h5>
                    <p>Browser</p>
                    <p>OS</p>
                    <p>More</p>
                </div>
                <div class="ap-container ap-third">
                    <h5 class="ap-bottombar ap-border-orange">Target</h5>
                    <p>Users</p>
                    <p>Active</p>
                    <p>Geo</p>
                    <p>Interests</p>
                </div>
            </div>
        </div>
 -->
        <!-- Footer -->
        <!-- <footer class="ap-container ap-padding-16 ap-light-grey">
            <h4>FOOTER</h4>
            <p>Powered by <a href="https://www.apschools.com/apcss/default.asp" target="_blank">ap.css</a></p>
        </footer> -->

        <!-- End page content -->
    </div>

    <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function ap_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function ap_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
    </script>

</body>

</html>