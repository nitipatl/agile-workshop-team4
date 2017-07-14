<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('profile.php');
}

if(isset($_POST['btn-login']))
{
	echo $_POST['txt_password'];
	$uname = strip_tags($_POST['txt_uname']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->check_user($uname,$upass))
	{
		$login->redirect('profile.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage : Login</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div style="height:80px;width:100%;font-family:myFirstFont;text-align:center;font-size:80px;color:black"><img src="img/sanjayfinal-casewrap.png" width="100" height="100" alt=""/>สีดาราม</div>
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading"> <font style="font-family:myFirstFont;font-size:72px">login </font></h2>
        <hr />
        
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" style="font-size:25px;" class="form-control" name="txt_uname" placeholder="Username " required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" style="font-size:25px;" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button>
        </div>  
      	
      </form>

    </div>
    
</div>

</body>
</html>