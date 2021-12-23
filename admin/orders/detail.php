<?php require '../check_admin_login.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
$order_id = $_GET['id'];
require '../connect.php';
$sql = "select 
* 
from order_product
join products on products.id = order_product.product_id
where order_id = '$order_id'";
$result = mysqli_query($connect,$sql);
$sum = 0;
?>
<table border="1" width="100%"> 
	<tr>
		<th>Ảnh</th>
		<th>Tên sản phẩm</th>
		<th>Giá</th>
		<th>Số lượng</th>
		<th>Tổng tiền</th>
	</tr>
	<?php foreach ($result as $each): ?>
		<tr>
			<td><img height='100' src="../products/photos/<?php echo $each['photo'] ?>"></td>
			<td><?php echo $each['name'] ?></td>
			<td><?php echo $each['price'] ?></td>
			<td>
				<?php echo $each['quantity'] ?>
			</td>
			<td>
				<?php 
					$result = $each['price'] * $each['quantity'];
					echo $result;
					$sum += $result;
				?>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<h1>
	Tổng tiền đơn này là <?php echo $sum ?>
</h1>
</body>
</html>