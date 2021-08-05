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
        <th class="th-sm">Status</th>
      <th class="th-sm"> User</th>
      <th class="th-sm">Appointment Date </th>
		<th class="th-sm">Collector </th>

    </tr>
  </thead>
  <tbody>
  <?php
  include('connection.php');




  $query= "SELECT tbl_app.app_id,tbl_app.app_status, tbl_users.uname,tbl_app.app_date
FROM tbl_app
INNER JOIN tbl_users
ON tbl_users.user_id=tbl_app.customer_id where tbl_app.app_status='assigned'||tbl_app.app_status='collected'  ORDER BY tbl_app.app_date ASC ";


$fetch=mysqli_query($conn,$query);

 echo'    <form method="post" action="#">';

  while($row=mysqli_fetch_array($fetch))
  {
	  echo" <tr>";
      echo" <td> $row[0]</td>";
     echo"  <td>$row[1]</td>";
	 echo"  <td>$row[2]</td>";
   echo"  <td>$row[3]</td>";




$query2="SELECT tbl_users.uname
FROM tbl_users
INNER JOIN tbl_app
ON tbl_users.user_id=tbl_app.collector_id where tbl_app.app_id=$row[0] ";



    $collectors=mysqli_query($conn,$query2);
	   while($row2=mysqli_fetch_array($collectors))
  {
	  echo'<td>'.$row2[0].'</td>';
  }
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
