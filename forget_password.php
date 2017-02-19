<!DOCTYPE html>
<html>
<head>
  <title>Civilisation'17 | CEG</title>
    <meta charset="utf-8">
  <link rel="shortcut icon" type="../image/x-icon" href="../tab-logo.png">
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
      width:50%;
      padding:10px;
      
      text-align: center;
      font-size:25px;
    }
    h3{
      font-family: verdana;
    }
    .sub{
      padding:10px;
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
  <h3>Enter your E-Mail </h3><br \>

<?php

include "connect.php";
//echo "sakthi";
session_start();
if(isset($_POST['submit']))
        {

                                //echo $_POST['email'];
                                $email_id=$_POST['email'];

                $q=mysqli_query($con,"select * from students where  email='$email_id'")or die(mysqli_error($con));
	//	{
	//		echo "You have not yet Registered</br> ";
	//		die("<button class='col-2 btn home btn-info sub' onclick='location.href="loginform.php"'>Click here to register</button>");
	//	}
		if($row=mysqli_fetch_assoc($q))
		{              	
		  		//echo "sakthi";
				$user_id;
                                $password;
                              
                                
                                        $user_id=$row['user_id'];
                                        $password=$row['password'];
                                
                                /* userid and password is sent to mail*/
                $to=$email_id;
                $subject='User id and password for civilisation..';
                //$rand_value=rand(500000,600000);
                //$_SESSION['rand_value']=$rand_value;
                $body='Your  user id : '.$user_id.'      Password : '.$password;
                $header='From: Civilisation <mail.civilisation17@example.com>'."\r\n";
                if(mail($to,$subject,$body,$header))
                {
                        echo "Email has been sent to  ",$to;
                }
                else
                {
                        echo "there was an error sending this message";
                }

		}
		else{
			
			 echo "You have not yet Registered</br> ";
                      //die("<button class='col-2 btn home btn-info sub' onclick='location.href="loginform.php"'>Click here to register</button>");
	
		}
        }
else
        {

?>

	

<form action="forget_password.php" method="POST">

    <input type="text" name="email"  class="field"><br \><br \>
    
<button class="col-2 btn home btn-info sub" name="submit" value="submit">Submit</button>
</form>
<?php

        }
?>
<br \><br \>
<button class="col-2 btn home btn-info sub" onclick="location.href='loginform.php'">login or register</button>


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
