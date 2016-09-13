<?php

echo 'Database access test.<br>';

// The following is needed to get GoDaddy site to produce error warnings.
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

/* Sample Database Connection Syntax for PHP and MySQL.
This code came from 
https://uk.godaddy.com/help/connecting-to-a-mysql-database-on-your-linux-hosting-account-using-php-249
*/

//Connect To Database
$hostname="localhost";
$username="tonyd";
$password="password";
$dbname="edanalytics_database";
$usertable="users";
$yourfield = "email";

echo $hostname, $username, $password, $dbname, '<br>';
$connection = mysqli_connect($hostname, $username, $password, $dbname);
echo '$connection<br>';
var_dump($connection);
if (!connection){
  die( "Failed to connect to MySQL: " . mysqli_connect_error());
  }
$query = "SELECT * FROM $usertable";
$result = mysqli_query($connection, $query);
echo '$result<br>';
var_dump($result);
echo '<br>';

if($result)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$name = $row["$yourfield"];
		echo "Name: ".$name."<br>";
}
}
mysqli_close($connection);

