<?PHP

include('header.php');
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}



 include('connection.php');


 	if(isset($_POST['btnAdd']))
{
	 $id=$_POST['uid'];
	   $query="update tbl_users set role='collector' where user_id='$id'";
		 $insert=mysqli_query($conn,$query);
        if($insert)
        {  header("Refresh:0; url=addcollector.php"); }
        else
        { echo '<script type="text/javascript">';
			echo ' alert("Add collector Error!")';
			echo '</script>'; }
 }


  	if(isset($_POST['btnRemove']))
{
	 $id=$_POST['uid'];
	   $query="delete from tbl_users   where user_id='$id'";
		 $insert=mysqli_query($conn,$query);
        if($insert)
        {  header("Refresh:0; url=addcollector.php"); }
        else
        { echo '<script type="text/javascript">';
			echo ' alert("Remove collector Error!")';
			echo '</script>'; }
 }




?>
<div class="outter-wp">
  <table   class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name </th>
      <th class="th-sm">Phone</th>
      <th class="th-sm">Email </th>
	  <th class="th-sm">Image </th>
	  <th class="th-sm">Actions </th>

    </tr>
  </thead>
  <tbody>
  <?php
  include('connection.php');




  $query= "SELECT user_id,uname,phone,email,image FROM tbl_users where role=''";

$fetch=mysqli_query($conn,$query);


  while($row=mysqli_fetch_array($fetch))
  {
	  echo" <tr>";
      echo" <td> $row[1]</td>";
     echo"  <td>$row[2]</td>";
	 echo"  <td>$row[3]</td>";
	  echo'<td><img src="../uploads/'.$row[4].'" alt="item picture" height="70" width="70"></td>';
	  echo'     <form method="post" action="#">
	<input type="hidden" name="uid" value="'.$row[0].'"  />
	  <td>   <button class="btn btn-lg btn-success warning_1"       type="submit" name="btnAdd"><i class="fa fa-plus"></i> Add</button>
	   <button class="btn btn-lg  btn-danger"     type="submit" name="btnRemove"><i class="fa fa-minus"></i> Remove</button> </td>
	  </form>
	  ';
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
