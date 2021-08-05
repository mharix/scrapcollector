<?PHP
include('header.php');

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
?>
<div class="outter-wp">
	<table id="example" class="display nowrap table table-striped table-bordered table-sm" style="width:100%">
          <thead>
              <tr>
                  <th>Appointment ID</th>

                    <th>Collector</th>
                  <th>Date</th>
                  <th>Items</th>
                  <th>Weight</th>
                  <th>Price</th>


              </tr>
          </thead>
          <tbody>
						<?php
						include('connection.php');
						if(!isset($_SESSION))
					    {

					session_start();
					$uid=$_SESSION["uid"];
					    }



						$query= "select   tbl_app.app_id,tbl_users.uname , tbl_app.app_date,tbl_items.item_name,
						tbl_collected_items.item_weight,tbl_collected_items.item_price

						 FROM tbl_app
						  INNER JOIN tbl_collected_items ON tbl_collected_items.app_id=tbl_app.app_id
							INNER JOIN tbl_items ON tbl_collected_items.item_id=tbl_items.item_id
              	INNER JOIN tbl_users ON tbl_app.collector_id=tbl_users.user_id
							 where   tbl_app.app_status in('Booked','collected','assigned')
							 ORDER BY tbl_app.app_date ASC

							 ";

					$fetch=mysqli_query($conn,$query);


						while($row=mysqli_fetch_array($fetch))
						{

																		echo'	<tr>';
																		echo'		<td  >'.$row[0].'</td>';
                                    	echo'		<td>'.$row[1].'</td>';
																		echo'		<td>'.$row[2].'</td>';
																		echo'		<td>'.$row[3].'</td>';
																		echo'		<td  >'.$row[4].'</td>';
																		echo'			<td>'.$row[5].'</td>';




						}


						?>



          </tbody>

      </table>

  <script>
  $(document).ready(function() {
      $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      } );
  } );
  </script>

										<!--//outer-wp-->
									</div>
<?PHP
include('footer.php');
?>
