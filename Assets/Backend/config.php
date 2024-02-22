

<?php
$servername = "localhost";
// $serverport = 82;
$username = "root";
$password = "";
$db = "firstproject";
// Create connection
$conn = mysqli_connect($servername ,$username, $password,$db);
// Check connection
if (!$conn) {
echo("Connection failed: " . mysqli_connect_error());
}
?>