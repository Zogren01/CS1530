<?php
    include 'header.php';
    $curr = $_SESSION['userinfo'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student Home</title>
        <link rel="stylesheet" href="./style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body{
                background-image: url(./title.png);
            }
        </style>
    </head>
    <body>
        <!--div that is the side navigation menu-->
        <div id="mySidenav" class="sidenav">
            <!--Link for button to close sidenav-->
            <a href="javascript:void(0)" class="closebtn" onclick="document.getElementById('mySidenav').style.width = '0';">&times;</a>
            <!--Table with contents of menu-->
            <table style="width:100%;">
                <tr>
                    <th>
                        <?php
                            echo $curr['username'];
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>Math Score:
                        <?php
                            echo $curr['mathLevel'];
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>Science Score:
                        <?php
                            echo $curr['scienceLevel'];
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>History Score:
                        <?php
                            echo $curr['historyLevel'];
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>English Score:
                        <?php
                            echo $curr['englishLevel'];
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        <a href="./assignments.php">Assignments Page</a>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p onclick="chat()">Chat</p>
                    </th>
                </tr>
                <tr>
                    <th>
                        <a href="./login.html">Logout</a>>
                    </th>
                </tr>
            </table>
        </div>

          <!-- Use any element to open the sidenav -->
        <div onclick ="document.getElementById('mySidenav').style.width = '250px';" id = "unopen_sidenav">
            <!--Add some image used for button to open menu-->
            menu
        </div>
        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">
            <div id="linkSection">
                <div class="quadrant">
                    <button type="button" class="l"  style=background-color:blue; 
                    onclick= "window.location.href = 'mathGame.php';">
                        Math
                    </button>
                </div>
                <div class="quadrant">
                    <button type="button" class="l" style=background-color:green;
                    onclick="window.location.href = 'scienceGame.php';">
                        Science
                    </button>
                </div>
                <div class="quadrant">
                    <button type="button" class="l" style=background-color:red;
                    onclick="window.location.href = 'historyGame.php';">
                        History
                    </button>
                </div>
                <div class="quadrant">
                    <button type="button" class="l" style=background-color:purple;
                    onclick="window.location.href = 'englishGame.php';">
                        English
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>