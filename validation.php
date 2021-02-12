<?php
session_start();
header('location:signUp.html');

$con = mysqli_connect("localhost","id15737082_mohamadhabach","#9W{BM<jQ>2]K0w@");
if(!$con)
die("Could not connect to the server. ".mysqli_connect_error());


$DBcon = mysqli_select_db($con,"id15737082_webproject");
if(!$DBcon)
die("Could not connect to db ".mysqli_connect_error());

$name = $_POST['username'];
$pass = $_POST['password'];
//$age = $_POST['age'];
//$email = $_POST['email'];

$s = "SELECT * from User where username = '$name' && password = '$pass' ";
$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num == 1){
    header('location:home.php');
    $_SESSION['username'] = $name;
}
    
else{
    header('location:login.html');
}

?>