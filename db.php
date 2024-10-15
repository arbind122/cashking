<?php

$servername="localhost";
$dbname = "u289937012_cash";
$username = "u289937012_cash";
$password = "Cash@123";

$link=mysqli_connect($servername,$username, $password,$dbname);

if(!$link)
{
    echo "error";
}

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);



?>

