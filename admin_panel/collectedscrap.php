<?PHP
include('header.php');

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

?>

<div class="outter-wp">

  <table style="align:center">
    <form method="post" action="#">
    <tr><td><input type="datetime-local" value="2020-02-12T23:20:50.52" class="form-control"  required   name="startdate"/></td> <td><input class="form-control" value="2020-04-12T23:20:50.52" type="datetime-local"   name="enddate"/></td><td> <input type="submit" class="btn" name="range" value="Search Rnage" /></td> </tr>
      <tr><td>  <input type="submit" class="btn" value="Search Day" name="day">
        <input type="submit" class="btn" value="Search Month" name="month"></td>  </tr>
  </form></table>




	<table id="example" class="display nowrap table table-striped table-bordered table-sm" style="width:100%">
          <thead>
              <tr>



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

					    }

              $query= "select     tbl_app.app_date,tbl_items.item_name,
  						sum(tbl_collected_items.item_weight),sum(tbl_collected_items.item_price)

  						 FROM tbl_app
  						  INNER JOIN tbl_collected_items ON tbl_collected_items.app_id=tbl_app.app_id
  							INNER JOIN tbl_items ON tbl_collected_items.item_id=tbl_items.item_id

  							 where   tbl_app.app_status='collected'
                 group by tbl_app.app_date,tbl_items.item_name
  							 ORDER BY tbl_app.app_date ASC

  							 ";


if(isset($_POST['day']))
{


  $date = new DateTime($_POST['startdate']);
$day=$date->format('d');

  $query= "select     tbl_app.app_date,tbl_items.item_name,
  sum(tbl_collected_items.item_weight),sum(tbl_collected_items.item_price)

   FROM tbl_app
    INNER JOIN tbl_collected_items ON tbl_collected_items.app_id=tbl_app.app_id
    INNER JOIN tbl_items ON tbl_collected_items.item_id=tbl_items.item_id
    where   tbl_app.app_status='collected' and day(tbl_app.app_date) = '$day'
     group by tbl_app.app_date,tbl_items.item_name
     ORDER BY tbl_app.app_date ASC

     ";
}
  elseif(isset($_POST['month'])){
    $date = new DateTime($_POST['startdate']);
  $month=$date->format('m');

    $query= "select     tbl_app.app_date,tbl_items.item_name,
    sum(tbl_collected_items.item_weight),sum(tbl_collected_items.item_price)

     FROM tbl_app
      INNER JOIN tbl_collected_items ON tbl_collected_items.app_id=tbl_app.app_id
      INNER JOIN tbl_items ON tbl_collected_items.item_id=tbl_items.item_id
      where   tbl_app.app_status='collected' and month(tbl_app.app_date) = '$month'
       group by tbl_app.app_date,tbl_items.item_name
       ORDER BY tbl_app.app_date ASC

       ";
  }
    elseif(isset($_POST['range'])){
      $sdate = new DateTime($_POST['startdate']);
      $sdate=$sdate->format('Y-m-d');
        $ldate = new DateTime($_POST['enddate']);
$ldate=$ldate->format('Y-m-d');
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+1 day',strtotime($ldate)));
//echo $sdate;
//echo $ldate;
//echo"converted= $cenvertedTime";

      $query= "select     tbl_app.app_date,tbl_items.item_name,
      sum(tbl_collected_items.item_weight),sum(tbl_collected_items.item_price)

       FROM tbl_app
        INNER JOIN tbl_collected_items ON tbl_collected_items.app_id=tbl_app.app_id
        INNER JOIN tbl_items ON tbl_collected_items.item_id=tbl_items.item_id
        where   tbl_app.app_status='collected' and tbl_app.app_date between '$sdate' and '$cenvertedTime'
         group by tbl_app.app_date,tbl_items.item_name
         ORDER BY tbl_app.app_date ASC

         ";
    }



					$fetch=mysqli_query($conn,$query);


						while($row=mysqli_fetch_array($fetch))
						{

																		echo'	<tr>';
																		echo'		<td  >'.$row[0].'</td>';
                                    	echo'		<td>'.$row[1].'</td>';
																		echo'		<td>'.$row[2].'</td>';
																		echo'		<td>'.$row[3].'</td>';





						}


						?>



          </tbody>

      </table>


										<!--//outer-wp-->
									</div>
<?PHP
include('footer.php');
?>
