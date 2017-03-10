<?php
session_start();
include_once 'database_connection.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['login']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$email = trim($email);
	$password = trim($password);
	
	$res=mysqli_query($dbc,"SELECT userid, username, password, activation FROM users WHERE email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	if($count == 1 && $row['password']== $password && $row['activation']=="yes")
	{
		$_SESSION['user'] = $row['userid'];
		header("Location: home.php");
	}
	else
	{
		echo 'Username / Password Seems Wrong !';
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="login">Login</button></td>
</tr>
<tr>
<td><a href="signup.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>