<?php
session_start();
switch($_GET['type'])
{
case 'user':
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	header('location:index.php');
	break;

case 'doner':
	unset($_SESSION['doner_name']);
	unset($_SESSION['doner_email']);
	unset($_SESSION['doner_id']);
	header('location:index.php');
	break;

case 'admin':
	unset($_SESSION['name']);
	unset($_SESSION['img_url']);
	unset($_SESSION['admin_id']);
	unset($_SESSION['email']);
	header('location:index.php');
	break;
}
