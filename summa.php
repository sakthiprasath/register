<?php

include "connect.php";
echo "sakthi";
session_start();
if(isset($_POST['submit']))
	{

		
		$email_id=$_POST['email_id'];
		$password=$_POST['password'];

		$q=mysqli_query($con,"select user_id from students where  email='$email_id'  and password='$password' ")or die(mysqli_error($con));
		//if($name==$row['name'] && $password=$row['password'])  	
	//	echo "sakthi in loginvalidation.php ....";		
		
		if($row= mysqli_fetch_assoc($q))
		{	
		
	//		echo "inside if";
		
			$user_id=$row['user_id'];		
			$_SESSION['user_id']=$user_id;
			header("location:../index2.php");
		}	
		else
		{
	//		echo "invalid credentials";
			header("location:login_failed.php");	
		}
		//echo $user_id;
		//	header("location:index.php");
		
}		
?>
