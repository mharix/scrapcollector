<?php

include('connection.php');
if(isset($_POST['btnLogin']))
{
	$email=$_POST['email'];
	$pass=$_POST['pass'];


        $insert=mysqli_query($conn,"select user_id,uname,role from tbl_users where email='$email' and pass='$pass'");
		$row = mysqli_fetch_row($insert);
        if($row)
        {session_start();


			$_SESSION["uid"] = $row[0];
			$_SESSION["uname"] = $row[1];
			$_SESSION["role"] = $row[2];




		if($_SESSION["role"]=='admin'){header("Refresh:0; url=admin_panel\assignapp.php");}
		else if($_SESSION["role"]=='collector'){header("Refresh:0; url=collector_panel\appointments.php");}
		else if($_SESSION["role"]=='')
		{
			echo '<script type="text/javascript">';
			echo ' alert("Your Request is Under Process Try again Later!")';
			echo '</script>';
			header("Refresh:0; url=collector_panel\logout.php");
			}
		else if($_SESSION["role"]=='user'){header("Refresh:0; url=user_panel\myappointments.php");}



        }
        else
        {
        	echo '<script type="text/javascript">';
			echo ' alert("Invalid login credentials !")';
			echo '</script>';
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
						Sign In
					</span>
                    <p>admin@admin.com</p>
                    <p>collector@collector.com</p>
                    <p>user@user.com</p>
                    <p>1122</p>
                    <h5>Email:</h5>
					<div class="wrap-input100 validate-input m-b-16" >
						  <input class="input100" type="email" required name="email">
					</div>

					<h5>Password:</h5>
					<div class="wrap-input100 validate-input m-b-16" >
						  <input class="input100" type="Password"  required name="pass">
					</div>

					<br><br>

					<div class="container-login100-form-btn">

                        <input class="login100-form-btn" type="submit" name="btnLogin">
					</div>

					<div class="flex-col-c p-t-90 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="signup.php" class="txt3">
							Sign up now
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
