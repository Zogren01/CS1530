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
        <title>History game</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            canvas {
                border:1px solid #d3d3d3;
                background-color: #f1f1f1;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);  
            }
            html{
                height: 100%;
                width: 100%;
            }
            body{
                min-height: 98%;
                min-width: 99%;
                background-image: url("./generic_bg.png");
                text-align: center;
            }
        </style>
    </head>
    <!--Eventually change this so that the student has to select an assignment before the game starts-->
    <body>
        <h1>History</h1><br><br>
        <?php
            $class = $curr['class'];
            $_SESSION['subject'] = 'history';
            $assignments = $db->query("SELECT * FROM assignments WHERE class = $class AND subjectType = '2';");
            if($assignments->num_rows){
                echo "<table style='width:80%; background-color:white; margin-left:auto;
                margin-right:auto;' border='1'>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    </tr>";
                while($row = $assignments->fetch_assoc()){
                    $name = $row['name'];
                    $id = $row['assignID'];
                    echo "<tr>
                        <th>$id</th>
                        <th>$name</th>
                        </tr>";
                }
                echo "</table>";
            }
            else{
                echo "<h3>No assignments for your class yet</h3>";
            }
        ?>
        <form action="game.php" method="post">
            <label for="assig"><h3>Enter assignment ID</h3></label><br>
            <textarea id='assig' name='assig' rows='1' cols='1'></textarea><br>
            <button name="submit">Click here to start game</button><br>
        </form>
        <script src="./gameScript.js"></script>
    </body>
</html>
