<?PHP
include('header.php');
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
 include('connection.php');


 	if(isset($_POST['btnAssign']))
{
	 $cid=$_POST['cid'];
	  $aid=$_POST['aid'];
	   $query="update tbl_app set collector_id='$cid',app_status='assigned' where app_id='$aid'";
		 $insert=mysqli_query($conn,$query);
        if($insert)
        {  header("Refresh:0; url=assignapp.php"); }
        else
        { echo '<script type="text/javascript">';
			echo ' alert("Assign collector Error!")';
			echo '</script>'; }
 }




?>
<div class="outter-wp">
  <table   class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">App Id </th>
      <th class="th-sm"> User</th>
      <th class="th-sm">Appointment Date </th>
		<th class="th-sm">Actions </th>

    </tr>
  </thead>
  <tbody>
  <?php
  include('connection.php');




  $query= "SELECT tbl_app.app_id, tbl_users.uname,tbl_app.app_date
FROM tbl_app
INNER JOIN tbl_users
ON tbl_users.user_id=tbl_app.customer_id where tbl_app.app_status='booked'  ORDER BY tbl_app.app_date ASC ";


$fetch=mysqli_query($conn,$query);

 echo'    <form method="post" action="#">';

  while($row=mysqli_fetch_array($fetch))
  {
	  echo" <tr>";
      echo" <td> $row[0]</td>";
     echo"  <td>$row[1]</td>";
	 echo"  <td>$row[2]</td>";

	  echo'
	  <td>  <input type="hidden" name="aid" value="'.$row[0].'"  />   ';
	  echo'<SELECT name="cid">';
	  $collectors=mysqli_query($conn,"select user_id,uname from tbl_users where role='collector'");
	   while($row2=mysqli_fetch_array($collectors))
  {
	  echo'<option value="'.$row2[0].'">'.$row2[1].'</option>';
  }
  echo'</SELECT>';

	  echo'<button class="btn btn-lg btn-success warning_1"       type="submit" name="btnAssign"><i class="fa fa-plus"></i> Assign</button>

	  </form>';

   echo"  </tr> ";
  }

  ?>


  </tbody>



</table>






<!--//outer-wp-->
</div>
<?PHP
include('footer.php');
?>
