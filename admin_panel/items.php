<?PHP
include('header.php');
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
 include('connection.php');


 	if(isset($_POST['btnitemupdate']))
{


	$id=$_POST['id'];
	$name=$_POST['name'];
	 $rate=$_POST['rate'];
	$img=$_FILES['editimageup']['name'];
	 $tempname=$_FILES['editimageup']['tmp_name'];
	if($img!=null)
	{

		$query="update tbl_items set item_name='$name',item_rate='$rate',item_image='$img' where item_id='$id'";
		}
		else{

		$query="update tbl_items set  item_name='$name',item_rate='$rate'  where item_id='$id'";
		}
        $insert=mysqli_query($conn,$query);
        if($insert)
        {
			 move_uploaded_file($tempname,"../uploads/".$img);

		//	header("Refresh:0; url=items.php");
        }
        else
        {
        	echo '<script type="text/javascript">';
			echo ' alert("Item Update Error!")';
			echo '</script>';


        }

}




 if(isset($_POST['btnadditem']))
{
	$name=$_POST['name'];
	 $rate=$_POST['rate'];
	 $img=$_FILES['addimageup']['name'];
	 $tempname=$_FILES['addimageup']['tmp_name'];
	if($img!=null)
	{
		 $query="INSERT INTO `tbl_items`(  `item_name`, `item_image`, `item_rate`) VALUES ('$name','$img','$rate')";


	}else{
		 $query="INSERT INTO `tbl_items`(  `item_name`, `item_image`, `item_rate`) VALUES ('$name','noimage.png','$rate')";


	}
        $insert=mysqli_query($conn,$query);
        if($insert)
        {
			 move_uploaded_file($tempname,"../uploads/".$img);

			//header("Refresh:0; url=items.php");
        }
        else
        {
        	echo '<script type="text/javascript">';
			echo ' alert("No Item  Add Error!")';
			echo '</script>';


        }

}



?>
<div class="outter-wp">
 <button class="btn btn-lg btn-success warning_1 " type="submit" data-toggle="modal" data-target="#myModal" name="btnprofileupdate"> <i class="fa	 fa-plus"></i>Add New Item</button>
 <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Item Name </th>
      <th class="th-sm">Rate </th>
      <th class="th-sm">Image </th>
	  <th class="th-sm">Actions </th>

    </tr>
  </thead>
  <tbody>
  <?php
  include('connection.php');




  $query= "SELECT item_id,item_name,item_rate,item_image FROM tbl_items";

$fetch=mysqli_query($conn,$query);


  while($row=mysqli_fetch_array($fetch))
  {
	  echo" <tr>";
      echo" <td> $row[1]</td>";
     echo"  <td>$row[2]</td>";
	  echo'<td><img src="../uploads/'.$row[3].'" alt="item picture" height="70" width="70"></td>';
	  echo'  <td>   <button class="btn btn-lg btn-success warning_1" id="btnedit" value="'.$row[0].'"  data-toggle="modal" data-target="#myEditModal"  type="button" name="btnprofileupdate"><i class="fa fa-edit"></i> Edit</button> </td>';
   echo"  </tr> ";
  }

  ?>


  </tbody>

</table>




   <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add new Item details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">









			   <form class="form" action="##" method="post" enctype="multipart/form-data"  >
                      <div class="form-group">


	                <div class=" ">
					   <img src="../uploads/<?php echo"$uimage" ?>" id="itemaddimage" class="avatar img-circle img-thumbnail" alt="item image" height="70px"width="70px">
						<input type="file" name="addimageup" id="itemaddsrc" class="text-center center-block file-upload"/>

                              <label for="name"><h4>Item Name</h4></label>
                              <input type="text" class="form-control"   name="name" required maxlength="100" pattern="[a-zA-z ]{1,100}">



                              <label for="rate"><h4>Rate</h4></label>
                              <input  type="text" class="form-control" name="rate" required maxlength="8" pattern="[0-9]{1,8}">


                      </div>







                      <div class="form-group">
                           <div  >
                                <br>
                              	<button class="btn btn-lg btn-success warning_1" type="submit" name="btnadditem"> Add</button>
									<button class="btn btn-lg btn-success warning_1" type="reset" id="btnaddreset" name="btnadditem"> Reset </button>

                            </div>
                      </div>
              	</form>

              <hr>

             </div><!--/tab-pane-->






                            <script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#itemaddimage').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#itemaddsrc").change(function(){
    readURL(this);
});


$("#btnaddreset").click(function(){
  $('#itemaddimage').attr('src', '');

});
</SCRIPT>






        <!-- Modal footer -->


      </div>
    </div>
  </div>

</div>







   <!-- The edit Modal -->
  <div class="modal fade" id="myEditModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Item details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">









			   <form class="form" action="items.php" method="post" enctype="multipart/form-data"  >
                      <div class="form-group">


	                <div class=" ">
					   <img src="../uploads/<?php echo"$uimage" ?>"  id="itemeditimage" class="avatar img-circle img-thumbnail" alt="item image" height="70px"width="70px">
						<input type="file" name="editimageup" id="itemeditsrc" class="text-center center-block file-upload"/>

                              <label for="name"><h4>Item Name</h4></label>
                              <input type="text" class="form-control" id="itemname"  name="name" required maxlength="100" pattern="[a-zA-z ]{1,100}">



                              <label for="rate"><h4>Rate</h4></label>
                              <input  type="text" class="form-control" id="itemrate" name="rate" required maxlength="8" pattern="[0-9]{1,8}">
							  <input type="hidden" id="itemid" name="id">


                      </div>
           <div class="form-group">
                           <div  >
                                <br>
                              	<button class="btn btn-lg btn-success warning_1" type="submit" name="btnitemupdate"> Update</button>

                            </div>
                      </div>
              	</form>

              <hr>

             </div><!--/tab-pane-->


      </div>
    </div>
  </div>

</div>

 <script>




var id=0; var  name="name";	var rate=0;	var image="image";
 $(document).ready(function(){

// updating the view with notifications using ajax
function load_unseen_notification(iid)
{
 $.ajax({
  url:"itemajax.php",
  method:"POST",
  data:{itemid:iid},
  dataType:"json",
  success:function(data){
	    id = data[0].id;
              name = data[0].name;

                 rate = data[0].rate;
                 image = data[0].image;
				 var path="../uploads/";
				 $("#itemid").val(id);
				 $("#itemname").val(name);
					$("#itemrate").val(rate);
					$('#itemeditimage').attr('src', path.concat(image));





  }

 });




}


$("button#btnedit").click(function(){

 load_unseen_notification(this.value);

});

 });

</script>



<!--//outer-wp-->
</div>
<?PHP
include('footer.php');
?>
