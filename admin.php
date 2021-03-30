<?php

$servername ="localhost";
$username = "root";
$password = "root";
$dbname = "student_login";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$admin_id = $_POST["admin_id"];
$Password = $_POST["Password"];
//$salt = "weforvizag";
//$password_encrypted = sha1($password.$salt);


$sql = mysqli_query($conn, "SELECT count(*) as total from admin WHERE admin_id = '".$admin_id."' and 
	Password = '".$Password."'  ");

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
	?>
	<script>
		alert('Login successful');
	</script>
	
	<?php
	header("Location:admin_form_new.html");
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
}
?>