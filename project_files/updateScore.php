<?php
include 'header.php';

    $user = 'root';
    $pass = '';
    $db = 'scisthelimit';
    $index = 0;
    $db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");

    $curr = $_SESSION['userinfo'];
    $usr = $curr['username'];
    $sub = $_SESSION['subject'];
    $sub = $sub . 'Level';
    $score = $curr[$sub];
    $score = $score + 1;
    
    $db->query("UPDATE profiles SET `$sub` = $score WHERE username = '$usr';");

    header("location: ./studentHome.php");
?>