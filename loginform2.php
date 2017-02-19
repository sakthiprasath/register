
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Civilisation'17 | CEG</title>
    <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="../tab-logo.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="assets/signup-form.css" type="text/css" />
  <link rel="stylesheet" href="../style.css"> 
  <link rel="stylesheet" href="style.css"> 
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

	<div class="container">
        <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
          <div class="panel-heading">
            <h3 class="">CIVILISATION'17</h3>
            <hr>
            </div>
            <div class="row">
              <div class="col-xs-6">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div>
              <div class="col-xs-6">
                <a href="#" id="register-form-link">Register</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="summa.php" method="post" role="form" style="display: block;">
                  <div class="form-group">
                  
				  <input type="text" name="email_id" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  <?php 
				  if(isset($_SESSION['already_registered']))
				  echo $_SESSION['already_registered']
					?>
				  </div>
                  <div class="form-group">

						<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
	
                  </div>
                  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="text-center">
                          <a href="forget_password.php" tabindex="5" class="forgot-password">Forgot Password?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <form id="register-form" action="register_process.php" method="post" role="form" style="display: none;">
                  <div class="form-group">
                    <input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Full Name" value="">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <input  type ="text" name="phone" id="phone"  class="form-control" placeholder="Phone Number" value="">
                  </div>
				  <div class="form-group">
                    <input type="text" name="college" id="college"  class="form-control" placeholder="College" value="" required>
                  </div>
				  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<hr class="primary bottom">
<footer class="container-fluid bg-4 text-center"> 
              <div class="footer-content">
                    <p>Privacy Policy | Contact <b>reversetechies@gmail.com</b></p>
                    <p>Copyright © Civilisation 2017. All rights are reserved.</p>
                    <small><p>designed by <i><b>Reverse Techies Team</b></i></p></small>

            </div>

</footer>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jquery-1.11.2.min.js"></script>
    <script src="assets/jquery.validate.min.js"></script>
    <script src="assets/register.js"></script>
    <script type="text/javascript">
      $(function() {

    $('#login-form-link').click(function(e) {
      $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});

    </script>

</body>
</html>
