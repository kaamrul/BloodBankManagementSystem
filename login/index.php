<?php
require("../db_connect/connection.php");
session_start();
if(isset($_POST['btn']))
{
	$login_type = $_POST['login_type'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($login_type == 'doner')
	{
		$sql = $conn->prepare("SELECT * FROM tbl_doner_info WHERE doner_email='$username'");
		$sql->execute();
		$value = $sql->fetch(PDO::FETCH_ASSOC);
		// echo "<pre>";print_r($value);exit;
		if($value['activation_status']==1)
		{
			if($value['password']==$password)
			{
				$_SESSION['doner_name']     = $value['doner_name'];
				$_SESSION['doner_id'] = $value['doner_id'];
				$_SESSION['doner_email']    = $value['doner_email'];
				header('location:../doner/');
			}
			else
			{
				echo "Sorry your password wrong ...";
			}
		}
		else
		{
		 	echo "Sorry ! account is temporarly disabled...";
		}
	}
	
	
	else if($login_type == 'admin')
	{
		$sql = $conn->prepare("SELECT * FROM tbl_admin_info WHERE email='$username'");
		$sql->execute();
		$value = $sql->fetch(PDO::FETCH_ASSOC);
		//echo "<pre>";print_r($value);exit;
		if($value['activation_status']==1)
		{
			if($value['password']==$password)
			{
				$_SESSION['name']     = $value['name'];
				$_SESSION['img_url']  = $value['img_url'];
				$_SESSION['admin_id'] = $value['admin_id'];
				$_SESSION['email']    = $value['email'];
				header('location:../admin/');
			}
				else
				{
					echo "Sorry your password wrong ...";
				}
		}else
		 {
		 	echo "Sorry ! account is temporarly disabled...";
		 }
	
	}
	
	
	else if($login_type == 'user')
	{
		$sql = $conn->prepare("SELECT * FROM tbl_user_info WHERE user_email='$username'");
		$sql->execute();
		$value = $sql->fetch(PDO::FETCH_ASSOC);
		// echo "<pre>";print_r($value);exit;
		
			if($value['password']==$password)
			{
				$_SESSION['user_name']     = $value['user_name'];
				$_SESSION['user_id'] = $value['user_id'];
				header('location:../');
			}
			else
			{
				echo "Sorry your password wrong ...";		
			}
	}
	
	
	else if($login_type == 'blood_bank')
	{
		$sql = $conn->prepare("SELECT * FROM tbl_blood_bank_info WHERE bank_email='$username'");
		$sql->execute();
		$value = $sql->fetch(PDO::FETCH_ASSOC);
		// echo "<pre>";print_r($value);exit;
		if($value['password']==$password)
			{
				$_SESSION['bank_name']     = $value['bank_name'];
				$_SESSION['bank_id'] = $value['bank_id'];
				$_SESSION['bank_email']    = $value['bank_email'];
				header('location:../blood_bank/');
			}
			else
			{
				echo "Sorry your password wrong ...";
			}
	}
	
	else
	{
		echo "Plz select login type";
	}
}
?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
<style type="text/css">
body {
	margin: 0px;
	background-repeat: no-repeat;
	background-image: url(../assets/images/login/logoo.jpg);
	background-color:#fff;
	
	
}
#container {
	background-repeat: no-repeat;
	margin-right: auto;
	margin-left: auto;
	text-align: center;
	background-attachment: fixed;
	margin-top: 100px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 30px;
	color: #186A3B;
	font-weight: 700;
}
#container a{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	text-decoration:none;
	color:#FFF;
}
#container a:hover{
	text-decoration:underline;
}
input:-moz-placeholder { color: #fff; }
input:-ms-input-placeholder { color: #fff; }
input::-webkit-input-placeholder { color: #fff; }
#container input[type="text"],
#container input[type="password"]{
	 border: 1px solid rgba(255,255,255,.15);
    -moz-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
    -webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
    box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	-o-transition: all 0.30s ease-in-out;
	outline: none;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	/* [disabled]-moz-box-sizing: border-box; */
	 background: #2d2d2d; /* browsers that don't support rgba */
    background: rgba(45,45,45,.15);
	color:#FFF;
	
	margin-bottom: 25px;
	width: 300px;
	height:40px;
	padding: 1%;
	font-family: Arial, Helvetica, sans-serif;
	border-radius:5px;
	font-size:14px;
}
#container input[type="text"]:focus,
#container input[type="password"]:focus{
	box-shadow: 0 0 10px #FF3300;
	padding: 1%;
	border: 1px solid #F60;
}
#container input[type="submit"]{
	cursor:pointer;
	width: 300px;
	height: 40px;
	background: #ef4300;
	color: #FFF;
	padding: 1%;
	border-bottom: none;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;
	font-family: Arial, Helvetica, sans-serif;
	border-radius:5px;
	moz-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.25) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    -webkit-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.25) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    box-shadow:
        0 15px 30px 0 rgba(255,255,255,.25) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
	font-size: 14px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 1px 2px rgba(0,0,0,.1);
    -o-transition: all .2s;
    -moz-transition: all .2s;
    -webkit-transition: all .2s;
    -ms-transition: all .2s;
}
#container input[type="submit"]:hover{
	-moz-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    -webkit-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
}
#copyright_text {
	position: fixed;
	left: 0px;
	bottom: 10px;
	height: auto;
	width: 100%;
	text-align: center;
	color: #186A3B;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: 500;
	font-size: 14px;
}
</style>
</head>

<body>
<div id="container">
<fieldset style="margin-left: 40%;   margin-right: 40%;">
Login to BBMS
  <form method="post" action="">
  	<br />
		<select name="login_type">
			<option>---- Select Login Type ----</option>
			<option value="admin">Admin</option>
			<option value="doner">Donor</option>			
			<option value="user">User</option>			
			<option value="blood_bank">Blood-Bank</option>			
		</select>
	<br />
  	<br />
	<input type="text" name="username" placeholder="Username" required="required" style="color: #000000"   /><br />
    <input type="password" name="password" placeholder="Password" required="required" style="color: #000000" /><br />
   <input type="submit" value="Login" name="btn" /><br /><br />
  </form>
  </fieldset>
</div>
<div id="copyright_text">&copy; J!N 2017, All rights reserved.</div>
</body>
</html>
