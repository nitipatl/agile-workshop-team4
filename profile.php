<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	if($_SESSION['user_session']=="")
	{
	$login->redirect('index.php');
	}
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT `user_id`, `name`, `surname`, `address`, `tel`, `occupation`, `img_name` FROM `p_info`   WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>welcome - <?php print($userRow['name']); ?></title>
</head>

<body>


<div style="height:80px;width:100%;font-family:myFirstFont;text-align:center;font-size:80px;color:black"><img src="img/sanjayfinal-casewrap.png" width="100" height="100" alt=""/>สีดาราม</div>

<div class="clearfix"></div>
	
    <div class="container-fluid" style="margin-top:80px;">
	
    <div class="container" >
   
   	  <label style="text-align:center;width:100%;font-family:myFirstFont;font-size:72px;color:black" class="h1">WELCOME<br />
<?php print($userRow['name']); ?></label>
        <hr />
      <div id="pro" style="background-color:#E5E1E1;">
       <table id="profile" align="center" width="60%" border="0" cellpadding="0" cellspacing="0" style="font-size:24px;color:#000000;">
  <tbody>
    <tr>
      <td width="63%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ : <?php print($userRow['name']); ?></td>
      <td width="37%" rowspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;นามสกุล : <?php print($userRow['surname']); ?></td>
      </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ : <?php print($userRow['address'] ); ?></td>
      </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เบอร์ติดต่<img src="img/<?php print($userRow['img_name']); ?>" width="135" height="123" alt=""/>อ : <?php print($userRow['tel']); ?></td>
      </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาชีพ : <?php print($userRow['occupation']); ?></td>
      </tr>
  </tbody>
</table>
</div>

      
        <hr />
        

        
   
    
    </div>

</div>




<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>