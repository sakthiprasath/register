<?php
include "connect.php";
$q=mysqli_query($con,"select user_count from user_count") or die("cannot create user id. Register again to continue<a href='registerform'>Register </a> ");

$row=mysqli_fetch_array($q);
$count=$row['user_count'];
echo $count;

	echo "sakthi";

while($row1=mysqli_fetch_assoc($q))
{
//	echo $row1['user_count'];  
	
}
?>