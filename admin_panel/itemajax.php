<?php
	include('connection.php');
		
		 $id=$_POST['itemid'];
		$query = "SELECT * FROM tbl_items where item_id='$id' ";
$result = mysqli_query($conn, $query);
 
if(mysqli_num_rows($result) >	 0)
{
while($row = mysqli_fetch_array($result))
{
  $id = $row['item_id'];
    $name = $row['item_name'];
    $rate = $row['item_rate'];
    $image = $row['item_image'];

    $return_arr[] = array("id" => $id,
                    "name" => $name,
                    "rate" => $rate,
                    "image" => $image);
}
}
else{
   $return_arr[] = array("id" => "null",
                    "name" => "null",
                    "rate" => "null",
                    "image" => "null");
}

echo json_encode($return_arr);
		?>