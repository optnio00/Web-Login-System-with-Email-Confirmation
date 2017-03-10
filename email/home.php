<?php
session_start();
include_once 'database_connection.php';

if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
$res=mysqli_query($dbc,"SELECT * FROM users WHERE userid=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
	<div id="left">
    <label></label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Log Out</a>
        </div>
    </div>
</div>

<div id="body">
	<a>login and registration system</a><br /><br />
    <p>thank you to use this login system</p>
</div>

</body>
</html>