<?php
require_once("./class/User.php");
session_start();
$log=$_POST['login'];
$use=new User();
$i=$use->details($log);
if(isset($_SESSION['session_user']))header("Location: home.php");
if($_POST['login'] == $i->_login && $_POST['password'] == $i->_pw) {
	$_SESSION['session_user'] = 'user_connecter';
	$_SESSION['type']= $i->_type;
	$_SESSION['id']=$i->_login;
	header("Location: home.php");

}
else
{header("Location: index.php");}?>
