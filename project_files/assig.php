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
                background-color: lightblue;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Assignments</h1>
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