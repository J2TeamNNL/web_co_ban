<?php 
session_start();
if(isset($_COOKIE['remember'])){
	$token = $_COOKIE['remember'];
	require 'admin/connect.php';
	$sql = "select * from customers
	where token = '$token'
	limit 1";
	$result = mysqli_query($connect,$sql);
	$number_rows = mysqli_num_rows($result);
	if($number_rows == 1){
		$each = mysqli_fetch_array($result);
		$_SESSION['id'] = $each['id'];
		$_SESSION['name'] = $each['name'];
	}
}
if(isset($_SESSION['id'])){
	header('location:user.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="post" action="process_signin.php">
	Email
	<input type="email" name="email" autocomplete="false">
	<br>
	Mật khẩu
	<input type="text" name="password" autocomplete="false" >
	<br>
	Ghi nhớ đăng nhập
	<input type="checkbox" name="remember">
	<br>
	<button>Đăng nhập</button>
</form>
</body>
</html>