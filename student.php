<?php

$servername ="localhost";
$username = "root";
$password = "root";
$dbname = "student_login";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}
session_start();

$id = $_POST["id"];
$Password = $_POST["Password"];
//$salt = "weforvizag";
//$password_encrypted = sha1($password.$salt);
$_SESSION['userID'] = $id;

$sql = mysqli_query($conn, "SELECT count(*) as total from register WHERE id = '".$id."' and 
	Password = '".$Password."'  ");

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
	?>
	<script>
		alert('Login successful');
	</script>
	
	<?php
	header("Location:student_fee_new.php");
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
	
}
?>