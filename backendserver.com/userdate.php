<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$_GET['user']=mysql_real_escape_string($_GET['user']);
$sql = "SELECT DATE_FORMAT(lastdate, '%d-%m-%Y') as lastdate FROM users where user_id ='".$_GET['user']."'" ;
$result = $conn->query($sql);
$data=$result->fetch_assoc();
if ($result->num_rows > 0) {
	echo $data['lastdate'];
    $sql = "UPDATE users SET lastdate=NOW() WHERE id='".$_GET['user']."'";
} else {
$sql = "INSERT INTO users (user_id,lastdate) VALUES ('".$_GET['user']."',NOW())";
}
$conn->query($sql);

$conn->close();
?>
