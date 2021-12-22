<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
session_start();
$cart = $_SESSION['cart'];
$sum = 0;
?>
<table border="1" width="100%">
	<tr>
		<th>Ảnh</th>
		<th>Tên sản phẩm</th>
		<th>Giá</th>
		<th>Số lượng</th>
		<th>Tổng tiền</th>
		<th>Xoá</th>
	</tr>
	<?php foreach ($cart as $id => $each): ?>
		<tr>
			<td><img height='100' src="admin/products/photos/<?php echo $each['photo'] ?>"></td>
			<td><?php echo $each['name'] ?></td>
			<td><?php echo $each['price'] ?></td>
			<td>
				<a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=decre">
					-
				</a>
				<?php echo $each['quantity'] ?>
				<a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=incre">
					+
				</a>
			</td>
			<td>
				<?php 
					$result = $each['price'] * $each['quantity'];
					echo $result;
					$sum += $result;
				?>
			</td>
			<td>
				<a href="delete_from_cart.php?id=<?php echo $id ?>">
					X
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<h1>
	Tổng tiền hoá đơn:
	$<?php echo $sum ?>
</h1>
<?php 
$id = $_SESSION['id'];
require 'admin/connect.php';
$sql = "select * from customers where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<form method="post" action="process_checkout.php">
	Tên người nhận
	<input type="text" name="name_receiver" value='<?php echo $each['name'] ?>'>
	<br>
	Sđt người nhận
	<input type="text" name="phone_receiver" value='<?php echo $each['phone_number'] ?>'>
	<br>
	Địa chỉ người nhận
	<input type="text" name="address_receiver" value='<?php echo $each['address'] ?>'>
	<br>
	<button>Đặt hàng</button>
</form>
</body>
</html>