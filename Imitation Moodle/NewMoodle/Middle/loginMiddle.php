<?php


$name = $_POST['name'];
$pass = $_POST['pass'];
$account = $_POST['account'];

$post = 'name='.$name.'&pass='.$pass.'&account='.$account;

    $url = "web.njit.edu/~dp257/NewMoodle/Back/loginBack.php";

    $ch = curl_init();//initialize

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURL_POST, true); //true = 1
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post is the date of name value pair
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//get data bak = true

    $response = curl_exec($ch); //execute and get back data

    curl_close($ch);// close all curl connections

    echo $response;
?>



