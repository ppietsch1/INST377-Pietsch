<?php

$user = 'root';
$password = 'root';
$db = 'assingment2';
$host = 'localhost';
$port = 3306;

$link = mysqli_connect('localhost', 'root', 'root', 'assignment2');


if(!$link){
	die('Could not connect..');
}

$sql = "INSERT INTO userinfo(fname, lname, email) VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."')";

if($link->query($sql)===TRUE){
	echo "data inserted";
}

else{
	echo "failed";
}

$link->close();
?>

