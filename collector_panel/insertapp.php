<?php
include('connection.php');
 	
	$weight=$_POST['iweight'];
	$price=$_POST['iprice'];
	$appid=$_POST['appid'];
	$itemid=$_POST['itemid'];
  
	 
$query = "insert into tbl_collected_items (app_id	,item_id,	item_weight	,item_price) values('$appid','$itemid','$weight','$price')";
 
 $insert=mysqli_query($conn,$query);
        if($insert)
        {
					 $query2= "SELECT tbl_items.item_name, tbl_collected_items.item_price
FROM tbl_collected_items
INNER JOIN tbl_items
ON tbl_items.item_id=tbl_collected_items.item_id where tbl_collected_items.app_id='$appid'";


$result = mysqli_query($conn, $query2);
 
if(mysqli_num_rows($result) >	 0)
{
	   
while($row = mysqli_fetch_array($result))
{
   echo'<tr>';
   echo'<td>'.$row[0].'</td> <td>'.$row[1].'</td>';
   
   echo'</tr>';
 
 
}
$result = mysqli_query($conn, "select sum(item_price) from tbl_collected_items where app_id='$appid'");
while($row = mysqli_fetch_array($result))
{echo'<td><h1>Total</h1></td> <td><h1>'.$row[0].'</h1></td>';}

		}}
 
 
	 
		?>