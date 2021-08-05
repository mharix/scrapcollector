<?php

   include('connection.php');
 @ob_start();
session_start();
if(isset($_POST['btnapp']))
{
	$apptime=$_POST['apptime'];
	$uid=$_SESSION["uid"];
	$instructions=$_POST['appinstructions'];


$query="insert into tbl_app(customer_id,app_instructions,app_date,app_status) values('$uid','$instructions','$apptime','booked')";
        $insert=mysqli_query($conn,$query);
        if($insert)
        {

        	echo '<script type="text/javascript">';
			echo ' alert("Your Appointment Booked!")';
			echo '</script>';
			header("Refresh:0; url=myappointments.php");
        }
        else
        {
        	echo '<script type="text/javascript">';
			echo ' alert("Error During Appointment Booking!")';
			echo '</script>';


        }

}


?>





<?PHP
include('header.php');
 ?>

<div class="outter-wp">


							 <div class="container bootstrap snippet">

    <div class="row">

    	<div class="col-sm-10">

          <div class="tab-content">
            <div class="tab-pane active" id="home">
			   <form class="form" action="#" method="post"    >
                      <div class="form-group">


                      <div class="form-group">

                              <label for="email"><h4>Date/Time</h4></label>
							 <input class="form-control" required type="datetime-local" min="2015-10-28" id="bookdate"   name="apptime">

<!--<script>


$( "#bookdate" ).change(function() {

  var dtToday = new Date();

  var sdate=$('#bookdate').val();
  setdate.setDate(sdate.getDate()+2);
  if( new Date(sdate )< new Date(dtToday)  ){
    //setdate.setDate(sdate.getDate() + 2);

    alert('less');
  $( "#bookdate" ).val("");
}




});
</script>
-->

						  <BR>
                              <label for="email"><h4>Appointment Instructions:</h4></label>
                               <textarea  class="form-control"  type="text" name="appinstructions"   required maxlength="200" pattern="[a-zA-Z0-9 -\/()]{1,200}"></textarea>
                          </div>
                      </div>



                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success warning_1" type="submit" name="btnapp">Book My Appointment</button>

                            </div>
                      </div>
              	</form>

              <hr>

             </div><!--/tab-pane-->

              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->


										<!--//outer-wp-->
									</div>
<?PHP
include('footer.php');
?>
