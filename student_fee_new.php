<!DOCTYPE HTML>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  <title>Student Fee Portal</title>
</head>
<body>
<form action="student_fee_new.php" method="POST"> 
<div class="sidenav">
         <div class="login-main-text">
           <h5>STUDENT</h5>
            <h1>FEE PORTAL</h1>
            <h5>G-pay <img src="https://cdn3.iconfinder.com/data/icons/object-emoji/50/Wallet-512.png" width = "30px"/></h5>
            <button type="submit" class="btn btn-black" name="Pay_button">PAY</button>
           
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               
              
<!--                   <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" placeholder="User Name" name="id" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="Password" required>
                  </div> -->
                      <table id = "table_fee" border = '1'>
	                    <tr>
		                  <th>ID</th>
		                  <th>Name</th>
		                  <th>Fee ID</th>
		                  <th>Amount</th>
		                  <th>Due Date</th>
		                  <th>Status</th>
                      </tr>
                           
<!--                   <button type="submit" class="btn btn-black">Login</button> -->
               </form>
            </div>
         </div>
      </div>


</body>
</html>

<style>
  body {
    font-family: "Lato", sans-serif;
}

.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 50%;
        margin-left:30%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

#table_fee {
  border-spacing: 5px;
  padding : 20px;
  width: 150%;
   
}  
 th {
  height: 70px;
}
  
.btn-black{
    /*background-color: #000 !important;*/
    color: #fff;
    background-color: #DDD9D9;
  border: solid black;
  border-radius : 5px;
  color: black;
  padding: 12px 75px;
  cursor: pointer;
  font-size: 20px;
}
.btn-black:hover {
  /* Darker background on mouse-over */
  background-color: black;
  color : gold;
  boder-style  : solid;
  border-color : white;
  border-width: 2px;
}
    
  
</style>

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
#$id = $_POST["id"];
$id = $_SESSION['userID'];

//$query = "select r.username,f.fee_id,tf.amount,f.due_date from register r inner join fee f on r.id = f.id inner join tuition_fee tf on tf.fee_id = f.fee_id"; 

$query = "select r.id, r.username, f.fee_id, tf.amount, f.due_date, f.status from register r, fee f, tuition_fee tf where r.id = f.id and tf.fee_id = f.fee_id";


$result = mysqli_query($conn,$query);


while($row = mysqli_fetch_assoc($result))
{
  if($row['id'] == $id) {
    ?>
    <tr>

      <td> <?php echo $row['id']?> </td>
      <td> <?php echo $row['username']?> </td>
      <td> <?php echo $row['fee_id']?> </td>
      <td> <?php echo $row['amount']?> </td>
      <td> <?php echo $row['due_date']?> </td>
      <td> <?php echo $row['status']?> </td>
    </tr>
     
    <?php

}
}
?>

   <?php

    if (isset($_POST['Pay_button'])) {
    
    mysqli_query($conn,"UPDATE fee SET status = 'Paid' WHERE id = ".$id." ");
     

?>
  <script>
    alert('fee payment successful');
  </script>
  <?php

}
?>
