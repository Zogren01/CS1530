<?php

$user = 'root';
$pass = '';
$db = 'scisthelimit';

$db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");

if ( isset( $_POST['submit'] ) ){
    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $confpassword = $_REQUEST["confpassword"];
    if(strlen($username) < 5 || strlen($username) > 20){
        echo "Please enter a username between 5 and 20 charachters in length <br> Press back arrow to navigate back to account creation page";
    }
    else if(strlen($email) < 5 || strlen($email) > 50){
        echo "Please enter a valid email <br> Press back arrow to navigate back to account creation page";
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
        $newClass = 0;
        if($users->num_rows){
            while($row = $users->fetch_assoc() ){
                if($newID == $row['userID']){
                    $newID++;
                }
                if($newClass == $row['class']){
                    $newClass++;
                }
            }
        }
        echo $newID . "<br>" . $newClass;
        
        // the variables to use are $newID, $username, $password, 1, $newClass, $email
        //$newID and $newID are correctly set from the loop above
        
        //this code does not work
        $db->query("INSERT INTO profiles (userID, username, password, email, profileType, class) 
			VALUES($newID, '$username', '$password', '$email', 1, $newClass);");
        
        header('Location: ./login.html');
    }
}
$db->close();
?>