<?php
	include_once 'config.php';
 ?>
 

<?php 
     $name = $_POST["signup_username"];
	 $mail =  $_POST["signup_email"];
	 $phone =  $_POST["phone"];
	 $Age =  $_POST["Age"];
	 $pwd  = $_POST["signup_password"];
	 
	  
	   $sql = "INSERT INTO new_register(id,signup_username,signup_email,phone,Age,signup_password )VALUES ('','$name','$mail','$phone','$Age','$pwd')";
	
	  
	  //$sql = insert into item(Item_name,Item_description,Price,Quantity,Item_code('$name','$des','$price','$qty','$code')
	  
	  if(mysqli_query($conn,$sql)) {
		  echo "<script> alert('Record inserted successfully!!!')</script>";
		  header("Location:home.html");
	  }
	  else{
		  echo"<script>alert('Error in ')</script>";
	  }
	  
	  mysqli_close($conn);
  ?>
