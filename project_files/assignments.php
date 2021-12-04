<?php
    include 'header.php';
    $curr = $_SESSION['userinfo'];
    $user = 'root';
    $pass = '';
    $db = 'scisthelimit';

    $db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Assignments Page</title>
        <link rel="stylesheet" href="./style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body{
                background-image: url(./generic_bg.png);
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Assignments</h1>
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
                    <th>
                        <a href="./studentHome.php">Home</a>
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
          <div onclick ="document.getElementById('mySidenav').style.width = '250px';" id = "unopen_sidenav" id = "unopen_sidenav">
            <!--Add some image used for button to open menu-->
            menu
          </div>
          <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
          <div id="main" style="padding:30px">
                <?php
                    $class = $curr['class'];
                    $assignments = $db->query("SELECT * FROM assignments WHERE class = $class;");
                    if($assignments->num_rows){
                        echo "<table style='width:80%; background-color:white; margin-left:auto;
                        margin-right:auto;' border='1'>
                            <tr>
                            <th>Subject</th>
                            <th>Name</th>
                            </tr>";
                        while($row = $assignments->fetch_assoc()){
                            $name = $row['name'];
                            $subject = $row['subjectType'];
                            if($subject == '0'){
                                $subject = "Math";
                            }
                            else if($subject == '1'){
                                $subject = "Science";
                            }
                            else if($subject == '2'){
                                $subject = "History";
                            }
                            else{
                                $subject = "English";
                            }
                            echo "<tr>
                                <th>$subject</th>
                                <th>$name</th>
                                </th>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "<h3>No assignments for your class yet</h3>";
                    }
                ?>
          </div>
    </body>
</html>