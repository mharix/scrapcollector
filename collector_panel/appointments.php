<?PHP
include('header.php');
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
 include('connection.php');


 	if(isset($_POST['btnitemcollected']))
{


	$pid=$_POST['appidforstatus'];





		$query="update tbl_app set app_status='collected' where app_id='$pid' ";

        $insert=mysqli_query($conn,$query);
        if($insert)
        {

			header("Refresh:0; url=appointments.php");
        }
        else
        {
        	echo '<script type="text/javascript">';
			echo ' alert("appointment status Update Error!")';
			echo '</script>';


        }

}




?>
<div class="outter-wp">
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">User </th>
	   <th class="th-sm">Appointment Date</th>
      <th class="th-sm">Phone </th>
      <th class="th-sm">Address </th>
<th class="th-sm">Instructions </th>
	  <th class="th-sm">Actions </th>

    </tr>
  </thead>
  <tbody>
  <?php
  include('connection.php');


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
  $cid=$_SESSION["uid"];


  $query= "SELECT tbl_app.app_id, tbl_users.uname,tbl_app.app_date,tbl_users.phone,tbl_users.address,tbl_app.app_instructions
FROM tbl_app
INNER JOIN tbl_users
ON tbl_users.user_id=tbl_app.customer_id where tbl_app.app_status='assigned' and tbl_app.collector_id='$cid'  ORDER BY tbl_app.app_date ASC    ";

$fetch=mysqli_query($conn,$query);


  while($row=mysqli_fetch_array($fetch))
  {
	  echo" <tr>";
      echo" <td> $row[1]</td>";
     echo"  <td>$row[2]</td>";
	     echo" <td> $row[3]</td>";
     echo"  <td>$row[4]</td>";
 echo"  <td>$row[5]</td>";

	  echo'  <td>   <button class="btn btn-lg btn-success warning_1" id="btnEnter" value="'.$row[0].'"   data-toggle="modal" data-target="#myEditModal"  type="button" name="btnappdetails"><i class="fa fa-truck"></i> Collect</button> </td>';
   echo"  </tr> ";
  }

  ?>


  </tbody>

</table>












   <!-- The edit Modal -->
  <div class="modal fade" id="myEditModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Scrap details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

























  <?php
  include('connection.php');




  $query= "SELECT item_id,item_name,item_rate from tbl_items ";

$fetch=mysqli_query($conn,$query);
 echo'<table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"><tr><th>Item</th> <th>Weight</th> <th>Price</th><th>Action</th></tr>';
 echo' <tr><td><select id="itemlist" name="item">';
  while($row=mysqli_fetch_array($fetch))
  {
	  echo'<option value="'.$row[0].'" rate="'.$row[2].'">'.$row[1].'</option>';

   }
    echo' </select ></td>';

  echo'<td> <input class="form-control" type="text" required maxlength="11"   id="weight" name"weight" /></td>';
   echo'<td> <input class="form-control" type="text" id="price" disabled name"Price" /></td> ';
   echo'<td> <input class="form-control"   type="button"   value="Add" name"btnAddItem" id="btnAddItem"     ></td> </tr>';
   echo'</table>';

  ?>

  <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="insertedItems">

</table>



















						     <form class="form" action="#" method="post"   >




                                <br>
								<input type="hidden" id="appidforstatus" name="appidforstatus" value=""/>
                              	<button class="btn btn-lg btn-success warning_1" type="submit" name="btnitemcollected"> Collected</button>



              	</form>

              <hr>




      </div>
    </div>
  </div>

</div>

 <script>

var weight=0; var price=0; var itemid=-1;

 $(document).ready(function(){

 //clear appid on page load
 localStorage.setItem("app_id",'-1');



 function insertItem(aid,iid,w,p)
{


 $.ajax({
  url:"insertapp.php",
  method:"POST",
  data:{iweight:w,
		iprice:p,
		itemid:iid,
		appid:aid

  },
  dataType:"html",
  success:function(html){


               $("#insertedItems").empty().append(html);





  },
  error: function (jqXHR, status, err) {
    alert("Local error callback.");
  }


 });




}










      //to get appointment id
  $( "button#btnEnter" ).click(function() {

	localStorage.setItem("app_id",this.value);
  $("#insertedItems").empty();
$("#appidforstatus").val(localStorage.getItem("app_id"));
   //alert(localStorage.getItem("app_id") );
});

//here we update price as per selection

 $('#weight').on('input',function() {
     weight = parseFloat($('#weight').val());//final

	var element = $('#itemlist').find('option:selected');

    price =   element.attr("rate");
	 itemid=   element.attr("value");
	$('#price').val(parseFloat(weight)*parseFloat(price));
	  price = $('#price').val();

});




  $("#itemlist").change(function(){
         weight = parseFloat($('#weight').val());//final

	var element = $('#itemlist').find('option:selected');

    price =   element.attr("rate");
	 itemid=   element.attr("value");
	$('#price').val(parseFloat(weight)*parseFloat(price));
	  price = $('#price').val();


    });

//here call func to add item to table on add click
  $( "#btnAddItem" ).click(function() {

if(!$.isNumeric(weight))
{
	   $('#weight').val('');
   $('#weight').focus();
}
else{
  if(weight>0)
  {
    insertItem(localStorage.getItem("app_id"),itemid,weight,price);
 	  alert("Item INserted");
 $('#weight').val('');
 $('#appidforstatus').val(localStorage.getItem("app_id"));
  }
  else {
    alert("weight cannot be negative value !");
 $('#weight').val('');
  }

}
});


 });

</script>



<!--//outer-wp-->
</div>
<?PHP
include('footer.php');
?>
