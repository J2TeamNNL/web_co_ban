<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

require 'admin/connect.php';
$sql = "select count(*) from customers
where email = '$email'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if($number_rows == 1){
	session_start();
	$_SESSION['error'] = 'Trùng email rồi. Bạn chắc chứ, are you sủe?';
	header('location:signup.php');
	exit;
}

$sql = "insert into customers(name,email,password)
value ('$name','$email','$password')";
mysqli_query($connect,$sql);

$sql = "select id from customers
where email = '$email'";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;

mysqli_close($connect);