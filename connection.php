<?php
$servername = "localhost";
$username = "id14634589_harix";
$password = "*456Mhtye#665u";
$database="id14634589_mydb";


// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
	echo '<script language="javascript">';
echo 'alert("Connection Failed!")';
echo '</script>';
    die("Connection failed: " . $conn->connect_error);
}
  
?>
