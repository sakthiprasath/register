
<?php
include "connect.php";
//echo "hahaha";
session_start();
if(isset($_POST['submit']))
{
	//	echo"sakthi";
		$name=$_POST['name'];
		$password=$_POST['password'];
		$email_id=$_POST['email'];
	    	$ph_no=$_POST['phone'];
		$college=$_POST['college'];

	
		$_SESSION['name']=$name;
		$_SESSION['password']=$password;
		$_SESSION['ph_no']=$ph_no;
		$_SESSION['college']=$college;
		$_SESSION['email_id']=$email_id;

		$_SESSION['gender']=$_POST['gender'];
		$_SESSION['course']=$_POST['course'];
		$_SESSION['year']=$_POST['year'];
		$_SESSION['district']=$_POST['district'];
		$_SESSION['state']=$_POST['state'];
		
		/*whether the email is already is in the db*/
			
//		echo " </br>email checking if already registered ";
		$q=mysqli_query($con,"select email from students")or die(mysqli_error($con));
//		echo "</br>$email_id";
			while($row =mysqli_fetch_assoc($q))
			{	
				//echo "</br>email_checking";
				$table_email_id=$row['email'];
				//echo "</br>$table_email_id";	
				if($table_email_id==$email_id)	
				{
					//echo "</br>inside if ";
					$_SESSION['already_registered']="you have already residtered";
					header ("location:already_registered.php");
				}
			}
		
		
		
		
		/* valide the email    */
	
		$to=$email_id;
		$subject='Confirmation Code for Civilisation';
		$rand_value=rand(500000,600000);
		$_SESSION['rand_value']=$rand_value;
		$_SESSION['time']=3;
		$body='Your confirmation code for Civilisation registration is '.$rand_value;
		$header='From: Civilisation <mail.civilisation17@gmail.com>'."\r\n";
		
        	if(mail($to,$subject,$body,$header))
		{
			
			//echo "email has been sent to",$to;
		}
		else
		{
			echo "there was an error sending this message";
		}
		unset($_POST['submit']);	
//the below form is only given when server is able to send the mail to the specified email else redirect to reg_fom.php  	
	?>
<!DOCTYPE html>
<html>
<head>
  <title>Civilisation'17 | CEG</title>
    <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="../tab-logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../style.css">

  <style type="text/css">
  *{
    box-sizing: border-box;
  }
      .content{
       box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
       padding:20px;
       width:80%;
       margin:auto;
    }
    .field{
      width:30%;
      padding:10px;
      border:none;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      text-align: center;
      font-size:25px;
    }
    h3{
      font-family: verdana;
    }
    .sub{
      padding:10px;
      width:25%;
    }
    @media screen and (max-width: 600px){
      .field{
        width:100%;
      }
    }
  </style>
</head>
<body style="height:1vh;">


<header class="container-fluid bg-4 text-center">
              <div class="footer-content text-center">
                    <span class="logo">
                            <a href="../index.html"><img src="../logo.png"/></a><br \><br \>
                            <button class="col-2 btn home btn-info" onclick="location.href='../index.html'">Home</button>
                        </span>
            </div>

</header>
                        <hr class="primary header">

<div class="text-center content"><br \><br \>
  <h3>Enter your confirmation code</h3><br \>

  <!--form action="register_process.php" method='POST'>
        <input type="text" name="confirm_code"  class="field"><br \><br \>
        <button class="col-2 btn home btn-info sub"  name="confirm" value="confirm`" >Confirm</button>
  </form-->
  <form action="register_process.php" method='POST'>

                <input class="field" name="confirm_code" type="text"> <br \><br \>
        <input class="sub" type="submit" name="confirm" value="confirm">
        </form>

    </div><br \><br \>
                        <hr class="primary bottom">
<footer class="container-fluid bg-4 text-center">
              <div class="footer-content">
                    <p>Privacy Policy | Contact <b>reversetechies@gmail.com</b></p>
                    <p>Copyright © Civilisation 2017. All rights are reserved.</p>
                    <small><p>designed by <i><b>Reverse Techies Team</b></i></p></small>

            </div>

</footer>

</body>
</html>
		
	<!--form action="register_process.php" method='POST'>
		
		Enter the code :<input name="confirm_code" type="text" >
	<input type="submit" name="confirm" value="confirm`">
	</form-->


<?php
		
		
}
	
	elseif(isset($_POST['confirm']) && $_SESSION['time']>0 )
	{
		$time=$_SESSION['time'];
		if($_POST['confirm_code']==$_SESSION['rand_value'])
		{
			//echo "</br>inside if ";	
				$name=$_SESSION['name'];	
				$email_id=$_SESSION['email_id'];
				$ph_no=$_SESSION['ph_no'];
				$college=$_SESSION['college'];
				$password=$_SESSION['password'];
				
				$gender=$_SESSION['gender'];//=$_POST['gender'];
  		        	$course=$_SESSION['course'];//=$_POST['course'];
                		$year=$_SESSION['year'];//=$_POST['year'];
		                $district=$_SESSION['district'];//=$_POST['district'];
                		$state=$_SESSION['state'];//=$_POST['state'];

						
				
				$passmd5=($password);
				$rand=rand(1001,9999);
				/* creating a unique id */		
				$q=mysqli_query($con,"select user_count from user_count") or die("cannot create user id. Register again to continue<a href='registerform'>				Register </a> ");
				$row=mysqli_fetch_array($q);
				$count=$row['user_count'];				
				$count=$count+1;	
				$id="C17_".$count;
				//echo "after c 17 creation";
				$_SESSION['user_id']= $id;
				$q=mysqli_query($con,"update user_count set user_count=user_count+1") or die("cannot create user id. Register again to continue<a href='registerform'>Register </a> "); 
				//echo "after updation of count";
				mysqli_query($con,"insert into students values ('$id','$name','$passmd5','$email_id','$ph_no','$college','no')")
				or die("Your resistration is unsuccessful please retry<a href='loginform.php'>Register </a>");
			        mysqli_query($con,"insert into year_and_location values('$email_id','$course','$year','$district','$state')");
					
				
					
				$to=$_SESSION['email_id'];
				$subject='Registration for Civilisation ';
			//	$body="You have successfully registered...Your civilisation Id is $id For further details contact email id .visit civilisation.org.in";
				$body="
Dear  $name,

        Thank you for registering for the 34th edition of “Civilisation”. This email is to notify you that your registration for participation in Civilisation 17 has been received successfully. 

 C’17 ID : $id 

'Civilisation' is the inter-college technical symposium conducted by the Society of Civil Engineers (SCE), College of Engineering Guindy, Anna University which has the distinction of being India’s largest technical symposium. This year we have 

20+ Events
2 Workshops
2 Guest lectures

The registration number is unique and cannot be exchanged or altered with any other participant. Kindly make a note of your C’17 ID and quote this ID for further registration purposes in events and accommodation.
If you have any queries regarding your participation or about the program, please mail us at info@civilisation.org.in
For more updates on C’17, follow us at www.facebook.com/Civilisation.AU
Contact:
Selvakumar N 9543213434
We look forward to seeing you at Civilisation 17.

Thank You.

With regards,
Society of Civil Engineers
Anna University, Chennai.
";	
			
				$header='From: Civilisation <mail.civilisation17@gmail.com>'."\r\n";
				mysqli_query($con,"update count set count=count+1 ");// or die(mysqli_error($con);
				if(mail($to,$subject,$body,$header))
				{
					//echo "You have successfully registered...Your civilisation Id is $id and this details has been send to ".$to;	
					//echo  "</br><a href='loginform.php'>Login to continue </a> ";
					header("location:register_success.php");
				}
				else
				{
					$_SESSION['mail_not']=1;
					//echo "There was an error sending the email to $to  You have been successfully registered with us</br>
					//<a href='loginform.php'>Login to continue </a> " ;
					header("location:register_success.php");
				}
			
		}
		else if($time > 1 )
		{
			$time=$time-1;
			$_SESSION['time']=$time;
			
			if($time<3 )
			{
				//echo "You have entered worng confirmation code.<br> still $time attempts left ";
			}	
			?>
			<!--form action="register_process.php" method='POST'>
		
				Enter the code :<input name="confirm_code" type="text" >
				<input type="submit" name="confirm" value="confirm`">
			</form-->
<!DOCTYPE html>
<html>
<head>
  <title>Civilisation'17 | CEG</title>
    <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="../tab-logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../style.css">

  <style type="text/css">
  *{
    box-sizing: border-box;
  }
      .content{
       box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
       padding:20px;
       width:80%;
       margin:auto;
    }
    .field{
      width:30%;
      padding:10px;
      border:none;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      text-align: center;
      font-size:25px;
    }
    h3{
      font-family: verdana;
    }
    .sub{
      padding:10px;
      width:25%;
    }
    @media screen and (max-width: 600px){
      .field{
        width:100%;
      }
    }
  </style>
</head>
<body style="height:1vh;">


<header class="container-fluid bg-4 text-center">
              <div class="footer-content text-center">
                    <span class="logo">
                            <a href="../index.html"><img src="../logo.png"/></a><br \><br \>
                            <button class="col-2 btn home btn-info" onclick="location.href='../index.html'">Home</button>
                        </span>
            </div>

</header>
                        <hr class="primary header">

<div class="text-center content"><br \><br \>
  <h3>Enter your confirmation code</h3><br \>

  <!--form action="register_process.php" method='POST'>
        <input type="text" name="confirm_code"  class="field"><br \><br \>
        <button class="col-2 btn home btn-info sub"  name="confirm" value="confirm`" >Confirm</button>
  </form-->
    <form action="register_process.php" method='POST'>

                                <input class="field" name="confirm_code" type="text" ><br \><br \>
                                <input class="sub" type="submit" name="confirm" value="confirm">
                        </form>

    </div><br \><br \>
                        <hr class="primary bottom">
<footer class="container-fluid bg-4 text-center">
              <div class="footer-content">
                    <p>Privacy Policy | Contact <b>reversetechies@gmail.com</b></p>
                    <p>Copyright © Civilisation 2017. All rights are reserved.</p>
                    <small><p>designed by <i><b>Reverse Techies Team</b></i></p></small>

            </div>

</footer>

</body>
</html>

<?php
		}
		else 
		{	
	//		echo "sakthi";
			unset($_SESSION['rand_value']);
			unset($_SESSION['name']);
			unset($_SESSION['ph_no']);
			unset($_SESSION['college']);
			unset($_SESSION['email_id']);
			
			header("location:register_failed.php" );
		}
	}
	
	else 
	{	
	//		echo "prasath";
			unset($_SESSION['rand_value']);
			unset($_SESSION['name']);
			unset($_SESSION['ph_no']);
			unset($_SESSION['college']);
			unset($_SESSION['email_id']);
			
			header("location :register_failed.php" );
	}
	
?>
 
