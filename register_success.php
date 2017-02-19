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
        .sub{
      padding:10px;
    }
        .content{
       box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
       padding:20px;
       width:80%;
       margin:auto;
    }
  </style>
</head>
<body>


<header class="container-fluid bg-4 text-center"> 
              <div class="footer-content text-center">
                    <span class="logo">
                            <a href="../index.html"><img src="../logo.png"/></a><br \><br \>
                            <button class="col-2 btn home btn-info" onclick="location.href='../index.html'">Home</button>
                        </span>
            </div>

</header>
                        <hr class="primary header">

<div class="text-center content">
<br \><br \>

    <h3 style="color:green;">Registration Sucessfull...</h3><br \><br \>
<?php
session_start();
$id=$_SESSION['user_id'];
$to=$_SESSION['email_id'];
if(isset($_SESSION['mail_not']))
{
         echo "There was an error sending the email to $to  You have been successfully registered with us</br>
                Your civilisation Id is $id..</br> ";

}
else{
echo "Your civilisation Id is $id and this details has been send to ".$to;
                                        //echo  "</br><a href='loginform.php'>Login to continue </a> ";
}
unset($_SESSION['user_id']);

?>
    <br \> <br \>
    <button class="col-2 btn home btn-info reg sub"  onclick="location.href='loginform.php'">Click here to login...</button>
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
session_start();
$id=$_SESSION['user_id'];
$to=$_SESSION['email_id'];
if(isset($_SESSION['mail_not']))
{
	 echo "There was an error sending the email to $to  You have been successfully registered with us</br>
		Your civilisation Id is $id..</br> ";                                       

}
else{
echo "You have successfully registered...Your civilisation Id is $id and this details has been send to ".$to;
                                        //echo  "</br><a href='loginform.php'>Login to continue </a> ";
}
unset($_SESSION['user_id']);

?>
