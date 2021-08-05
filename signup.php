<?php

include('connection.php');
if(isset($_POST['btrReg']))
{
		$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$age=$_POST['age'];
	$role=NULL;
	$img="default.png";
  if($_POST['role']=='user'){$role="user";}


	 $emailcheck=mysqli_query($conn,"select email from tbl_users where email ='$email'");

            if (mysqli_num_rows($emailcheck) > 0) {


			echo '<script type="text/javascript">';
			echo ' alert("Email Already Exists !")';
			echo '</script>';
        }
        else
        {

				 $insert=mysqli_query($conn,"INSERT INTO tbl_users(uname,email,pass,phone,age,address,role,image) VALUES ('$name','$email','$pass','$phone','$age','$address','$role','$img')");
        if($insert)
        {header("Refresh:0; url=login.php");
			echo '<script type="text/javascript">';
			echo ' alert("Signup Successful!")';
			echo '</script>';
			
        }
        else
        {

			echo '<script type="text/javascript">';
			echo ' alert("Sign Up Error!")';
			echo '</script>';
        }
        }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Scrap Collector</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="#">
					<span class="login100-form-title">
						Sign Up
					</span>

				<h5>Name:</h5>
					<div class="wrap-input100 validate-input m-b-16" >
						  <input class="input100" type="text" name="name" required maxlength="50" pattern="[a-zA-z ]{1,50}">
					</div>


                    <h5>Email:</h5>
					<div class="wrap-input100 validate-input m-b-16" >
						  <input class="input100" type="email" name="email" required maxlength="50"  >

					</div>
					<h5>Password:</h5>
					<div class="wrap-input100 validate-input m-b-16" >
						  <input class="input100" type="password" name="pass" required maxlength="15" pattern="[a-zA-Z0-9@#$*+]{1,15}">
					</div>

					<h5>Phone:</h5>
					<div class="wrap-input100 validate-input m-b-16" >
						  <input class="input100" type="number" name="phone" required maxlength="11" pattern="[0-9]{1,11}">
					</div>

					<h5>Age:</h5>
					<div class="wrap-input100 validate-input m-b-16" >
						  <input class="input100" type="number" name="age" required min="0" max="200"  pattern="[0-9]{1,3}" onKeyPress="if(this.value.length==3) return false;">
					</div>

					<h5>Address:</h5>
					<div class="wrap-input100 validate-input m-b-16" >
						 <textarea class="input100" type="text" name="address" placeholder="address" required maxlength="200" pattern="[a-zA-Z0-9 -\/()]{1,200}"> </textarea>
					</div>


                    <div class="wrap-  validate-input" data-validate = "Please choose role">


						<h5>Choose Your Role:</h5>

					 <div class="wrap-input100 validate-input m-b-16"  >

                       &nbsp  &nbsp  &nbsp <input  type="radio" name="role" value="collector">Collector	<hr>
                        &nbsp &nbsp &nbsp <input  type="radio" name="role" value="user" checked >User
						<span class="focus-input100"></span>
					</div>

					</div>

<br><br>



					<div class="container-login100-form-btn">

                        <input class="login100-form-btn" type="submit" value="Signup" name="btrReg">
					</div>

					<div class="flex-col-c p-t-90 p-b-40">
						<span class="txt1 p-b-9">
							 have an account?
						</span>

						<a href="login.php" class="txt3">
							Sign in now
						</a>
						<hr>
						<a href="index.php" class="txt3">
							<i class="fa fa-home"></i> Back to Home
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
