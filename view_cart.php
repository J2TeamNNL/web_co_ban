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
			<td><?php echo $each['price'] * $each['quantity'] ?></td>
			<td>
				<a href="delete_from_cart.php?id=<?php echo $id ?>">
					X
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html>