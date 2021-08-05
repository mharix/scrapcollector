<?php
if(session_id() == '' || !isset($_SESSION)) {
   // session isn't started
   session_start();
}
   include('connection.php');
if(isset($_POST['btnprofileupdate']))
{
	$name=$_POST['name'];
	$uid=$_POST['uid'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$age=$_POST['age'];
	 $img=$_FILES['imageup']['name'];
	 $tempname=$_FILES['imageup']['tmp_name'];

	if($img!=null)
	{

	$query="update tbl_users set uname='$name',email='$email',pass='$pass',phone='$phone',address='$address',age='$age',image='$img' where user_id='$uid'";

		}
		else{


	$query="update tbl_users set uname='$name',email='$email',pass='$pass',phone='$phone',address='$address',age='$age' where user_id='$uid'";

		}

        $insert=mysqli_query($conn,$query);
        if($insert)
        {
			 move_uploaded_file($tempname,"../uploads/".$img);
			 header("Refresh:0; url=profile.php");
        	echo '<script type="text/javascript">';
			echo ' alert("Profile Updated !")';
			echo '</script>';
			
        }
        else
        {
        	echo '<script type="text/javascript">';
			echo ' alert("Profile Update Error!")';
			echo '</script>';

			ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
        }

}


?>







<?PHP
include('header.php');

				   //now here we get  prefillde data for profile update form
           if(session_id() == '' || !isset($_SESSION)) {
               // session isn't started
               session_start();
           }
$uid=$_SESSION["uid"];

$query= "SELECT user_id,uname,age,phone,email,pass,address,image FROM tbl_users where user_id = $uid";

$fetch=mysqli_query($conn,$query);

 $row=mysqli_fetch_array($fetch);
   $uname=$row[1];
	   $uage=$row[2];
	   $uphone=$row[3];
	   $uemail=$row[4];
	   $upass=$row[5];
	   $uaddress=$row[6];
	   $uimage=$row[7];
	  ?>

<div class="outter-wp">


							 <div class="container bootstrap snippet">

    <div class="row">

    	<div class="col-sm-10">

          <div class="tab-content">
            <div class="tab-pane active" id="home">
			   <form class="form" action="##" method="post" enctype="multipart/form-data"  >
                      <div class="form-group">
			  <div class="text-center">
        <img src="../uploads/<?php echo"$uimage" ?>" class="avatar img-circle img-thumbnail" alt="profile image" height="162px"width="162px">

        <input type="file" name="imageup" class="text-center center-block file-upload"/>
      </div></hr><br>
                <hr>


	                <div class="col-xs-6">
                              <label for="first_name"><h4>Name</h4></label>
                              <input value="<?php echo"$uname" ?>" type="text" class="form-control"   name="name" required maxlength="50" pattern="[a-zA-z ]{1,50}">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="phone"><h4>Age</h4></label>
                              <input value="<?php echo"$uage" ?>" type="number" class="form-control" min="0" max="200" name="age" required  pattern="[0-9]{1,3}" onKeyPress="if(this.value.length==3) return false;">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input value="<?php echo"$uphone" ?>" type="text" class="form-control" name="phone" required maxlength="11" pattern="[0-9]{1,11}">
                          </div>
                      </div>


                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input value="<?php echo"$uemail" ?>" type="email" class="form-control" name="email" required maxlength="50" >
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="email"><h4>Address</h4></label>
                               <textarea  class="form-control"  type="text" name="address" placeholder="address" required maxlength="200" pattern="[a-zA-Z0-9 -\/()]{1,200}">  <?php echo"$uaddress" ?></textarea>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input value="<?php echo"$upass" ?>" type="password" class="form-control" name="pass" required maxlength="15" pattern="[a-zA-Z0-9@#$*+]{1,15}">
                          </div>
                      </div>
                   <input type="hidden" name="uid" value="<?php echo"$uid" ?>">

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success warning_1" type="submit" name="btnprofileupdate"> Update</button>

                            </div>
                      </div>
              	</form>

              <hr>

             </div><!--/tab-pane-->

              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                            <script>
$(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</SCRIPT>

										<!--//outer-wp-->
									</div>
<?PHP
include('footer.php');
?>
