<?php 
session_start();
if(empty($_SESSION['id'])){
	header('location:sigin.php?error=Đăng nhập đi bạn');
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
Đây là trang người dùng. Xin chào bạn 
<?php 
echo $_SESSION['name'];
?>
	<a href="signout.php">
		Ơ đã đăng xuất rồi à, đừng bỏ rơi tôi
	</a>
</body>
</html>