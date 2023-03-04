<?php 
include "./connect.php";
$ip_address = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['REQUEST_URI'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO visitors (ip_address, page, user_agent, date) VALUES ('$ip_address', '$page', '$user_agent', '$date')";
mysqli_query($conn, $sql);
?>