<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cricket_club";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection failed". mysqli_connect());
}

//echo "successfully connected!";

?>
