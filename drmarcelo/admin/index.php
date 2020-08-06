<?php
session_start();
/*
* 
*/
require("config.php");
if(isset($_REQUEST['sub']))
{
	//echo '<pre>';print_r($_REQUEST);echo '</pre>';
	 $ongoing_query = "SELECT * from dentalmarcelo_admin where username=:username and password=:password";


       $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array( "username" =>$_REQUEST['username'],"password" =>md5($_REQUEST['password'])
         
           
           
            ));
        
         $num_rows=$statement->rowCount();
         if($num_rows>0)
         {
         	$_SESSION['username']=$_REQUEST['username'];
         	?>
         	<script>window.location.href="home.php"</script>
         	<?php
         }
         else
         {
         	$msg="Wrong username or password";
         }
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<title>ADMIN</title>
<link href="style.css" rel="stylesheet" type="text/css">
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>-->
</head>

<body>
<div class="outer">
<div class="bodybg">

<!--<start header> -->


<div class="login-box">

<div class="login-bg">
    <div class="login-logo"><img src="./images/login_logo.png"  alt="" title=""/></div>
    <?php if(isset($msg))
    {
    	?>
    	 <p style="color:red; text-align:center;"><?php echo $msg;?></p>
    	<?php
    }
    	?>
   
<div class="login-form-bg">
<div class="form-login">
<form method="post" action="" name="login" >
<input type="hidden" name="mode" value="login"  />

<input type="text" name="username" class="name-input" placeholder="Username" autocomplete="off" />

<input type="password" name="password" class="name-input" placeholder="Password"  autocomplete="off" />
<div class="remember"><input name="remember_chck" type="checkbox" value=""><label> Remember me</label></div>
<div class="forget-password"><a href="">Forgot your password?</a></div>
<div class="height3"></div>
<input type="submit" name="sub" value="Submit" class="submit-bt"/>

</form>

<div class="error-msg"></div>
</div>

</div>
</div>


</div>



<!--<end header> -->


</div>


</div>

</body>
</html>

