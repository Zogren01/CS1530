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
        <title>Class</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="text-align: center; background-color:lightblue">
        <h1 style="text-align:center;">Class Progress</h1>
        <?php
            $class = $curr['class'];
            $students = $db->query("SELECT * FROM profiles WHERE class = $class AND profileType = 0;");
            if($students->num_rows){
                echo "<table style='width:80%; background-color:white; margin-left:auto;
                margin-right:auto;' border='1'>
                    <tr>
                    <th>Student</th>
                    <th>Math Score</th>
                    <th>Science Score</th>
                    <th>History Score</th>
                    <th>English Score</th>
                    </tr>";
                while($row = $students->fetch_assoc()){
                    $name = $row['username'];
                    $m = $row['mathLevel'];
                    $s = $row['scienceLevel'];
                    $h = $row['historyLevel'];
                    $e = $row['englishLevel'];
                    echo "<tr>
                                <th>$name</th>
                                <th>$m</th>
                                <th>$s</th>
                                <th>$h</th>
                                <th>$e</th>
                                </th>";
                }
                echo "</table>";
            }
            else{
                echo "<h3>No students in class yet.</h3>";
            }  
        ?>
    </body>
</html>