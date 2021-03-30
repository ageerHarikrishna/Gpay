<?php

$servername ="localhost";
$username = "root";
$password = "root";
$dbname = "student_login";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
$fee_id = $_POST['fee_id'];
$total_amount = $_POST['total_amount'];
$due_date = $_POST['due_date'];
$status = $_POST['status'];
//$id = 199;

$sql_1 = "INSERT INTO register (id, username, password, gender, email, phoneCode, phone) VALUES ('$id','$username', '$password', '$gender', '$email', '$phoneCode', '$phone')";

$sql_2 = "INSERT INTO fee (fee_id, total_amount, due_date, status, id) VALUES ('$fee_id','$total_amount','$due_date','$status',
'$id')";

$sql_3 = "INSERT INTO tuition_fee (amount, fee_id) VALUES ('$total_amount', '$fee_id')";

if($conn->query($sql_1) === TRUE ){
	if($conn->query($sql_2) === TRUE) {
		if($conn->query($sql_3) === TRUE) {
	?>
	<script>
		alert('DATABASE Updated');
	</script>
	<?php
}
}
}
else{
	?>
	<script>
		alert('DATABASE Not Updated');
	</script>
	<?php
}
?>