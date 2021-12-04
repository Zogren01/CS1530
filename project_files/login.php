<?php
include 'header.php';
$user = 'root';
$pass = '';
$db = 'scisthelimit';

$db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");

if ( isset( $_POST['submit'] ) ){
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $users = $db->query("SELECT * FROM profiles WHERE username = '$username' AND password = '$password';");
    if($users->num_rows){
        $row = $users->fetch_assoc();
        $_SESSION["userinfo"] = $row;
        if($row['profileType'] == 1){
            header('Location: ./teacherHome.html');
        }
        else{
            header('Location: ./studentHome.php');
        }
    }
    else{
        echo "Invalid username or password <br> Press back arrow to navigate back to login page";
    }
}
$db->close();
exit();
?>
