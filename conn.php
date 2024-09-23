
<?php
$servername = "localhost";
$username = "root";
$password = "";
$table = "request_history";//ชื่อฐานข้อมูล
// Create connection
$conn= mysqli_connect($servername, $username, $password,$table);   
$conn->set_charset("utf8");
date_default_timezone_set('Asia/Bangkok');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

?>