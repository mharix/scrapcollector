<?PHP
include('header.php');


?>
<div class="outter-wp">
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"    >
  <thead>
    <tr>
      <th class="th-sm">Item Name </th>
      <th class="th-sm">Rate </th>
      <th class="th-sm">Image </th>


    </tr>
  </thead>
  <tbody>
  <?php
  include('connection.php');

  if(!isset($_SESSION))
    {

session_start(); 
    }


  $query= "SELECT item_id,item_name,item_rate,item_image FROM tbl_items";

$fetch=mysqli_query($conn,$query);


  while($row=mysqli_fetch_array($fetch))
  {
	  echo" <tr>";
      echo" <td> $row[1]</td>";
     echo"  <td>$row[2]</td>";
	  echo'<td><img src="../uploads/'.$row[3].'" alt="item picture" height="70" width="70"></td>';
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
