<?php 
include 'config.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$login = mysqli_query($con, "select * from users where email='$email' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	header("location:admin/index.php");
}else{
	header("location:admin/index.php");	
}
?>