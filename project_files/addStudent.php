<?php
include 'header.php';

$user = 'root';
$pass = '';
$db = 'scisthelimit';

$db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");
$curr = $_SESSION['userinfo'];
if ( isset( $_POST['submit'] ) ){
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $confpassword = $_REQUEST["confpassword"];
    if(strlen($username) < 5 || strlen($username) > 20){
        echo "Please enter a username between 5 and 20 charachters in length <br> Press back arrow to navigate back to account creation page";
    }
    else if(strlen($password) != 6){
        echo "Invalid password length <br> Press back arrow to navigate back to account creation page";
    }
    else if($password != $confpassword){
        echo "Passwords do not match <br> Press back arrow to navigate back to account creation page";
    }
    else{
        $users = $db->query("SELECT * FROM profiles");
        $newID = 0;
        if($users->num_rows){
            while($row = $users->fetch_assoc() ){
                if($newID == $row['userID']){
                    $newID++;
                }
            }
        }
        $newClass = $curr['class'];
        $db->query("INSERT INTO profiles (userID, username, password, profileType, class) 
			VALUES($newID, '$username', '$password', 0, $newClass);");
        header('Location: ./teacherHome.html');
    }
}
$db->close();
?>