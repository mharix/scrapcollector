<?PHP
 include('connection.php');
  if(!isset($_SESSION))
    {

session_start();
    }
$uid=$_SESSION["uid"];

$query= "SELECT user_id,uname,age,phone,email,pass,address,image FROM tbl_users where user_id = $uid";

$fetch=mysqli_query($conn,$query);

 $row=mysqli_fetch_array($fetch);
   $uname=$row[1];
	 $uemail=$row[4];
	   $uimage=$row[7];
	  ?>


	 <!--footer section start-->
										<footer>
										   <p>&copy 2016 Augment . All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts.</a></p>
										</footer>
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1></h1></span>
					<!--<img id="logo" src="" alt="Logo"/>-->
				  </a>
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			<div class="down">
									  <a ><img src="../uploads/<?php echo"$uimage" ?>" alt="avatar" height="152" width="152"></a>
									  <a><span class=" name-caret"><?php echo"$uname" ?></span></a>


									<ul>
									<li><a class="tooltips" href="profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>

										<li><a class="tooltips" href="logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>

						<!--//down-->
                           <div class="menu">
									<ul id="menu" >
										<li><a href="booking.php"><i class="fa fa-plus" ></i> <span>Book Appointment</span></a></li>
										<li><a href="rates.php"><i class="fa fa-dollar"></i> <span>View Rates</span></a></li>
										<li><a href="myappointments.php"><i class="fa fa-calendar"></i> <span>View Appointment</span></a></li>


									  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>
							</div>
							<script>
							var toggle = true;

							$(".sidebar-icon").click(function() {
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }

											toggle = !toggle;
										});
							</script>
<!--js -->
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
