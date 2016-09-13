<?php
// prints e.g. 'Current PHP version: 4.1.1'
echo 'Current PHP version: ' . phpversion();

$con = mysqli_connect("localhost","tonyd","password","edanalytics_database");

//$con = mysqli_connect("localhost","root","root","target");
var_dump($con);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
echo "Yay! Connected successfully!<br>"
?>
