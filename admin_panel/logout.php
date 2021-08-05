<?php
session_start();
 unset($_SESSION["uid"]);
  unset($_SESSION["uname"]);
   unset($_SESSION["role"]);
   
		header("Refresh:0; url=../login.php"); 
?>