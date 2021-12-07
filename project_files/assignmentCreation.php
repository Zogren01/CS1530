<?php
    include 'header.php';
    $curr = $_SESSION['userinfo'];
    $user = 'root';
    $pass = '';
    $db = 'scisthelimit';

    $db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");

  
    if ( isset( $_POST['submit'] ) ){
        $len = 1;
        $class = $curr['class'];
        $id = 0;
        $subject = $_REQUEST["subject"];
        $name = $_REQUEST["name"];
        $assignments = $db->query("SELECT * FROM assignments;");
        if($assignments->num_rows){
            while($row = $assignments->fetch_assoc()){
                if($id == $row['assignID']){
                    $id++;
                }
            }
        }
        $db->query("INSERT INTO assignments (assignID, class, subjectType, name) 
			VALUES($id, $class, '$subject', '$name');");
        
        $db->query("CREATE TABLE `$id` 
                ( `questions` VARCHAR(150) NOT NULL , `answers` VARCHAR(50) NOT NULL ) ENGINE = InnoDB;");
        
        while($len < 11){
            $question = $_REQUEST["q".$len];
            $answer = $_REQUEST["a".$len];
            if($question == NULL || $answer == NULL){
                break;
            }
            $db->query("INSERT INTO `$id` (questions, answers) VALUES ('$question', '$answer');");
            $len++;
        }
        header('Location: ./teacherHome.html');
    }
    $db->close();
?>