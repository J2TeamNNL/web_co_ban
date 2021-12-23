<?php 
require '../check_admin_login.php'; 

$name = addslashes($_POST['name']);
$photo = $_FILES['photo'];
$price = addslashes($_POST['price']);
$description = addslashes($_POST['description']);
$manufacturer_id = addslashes($_POST['manufacturer_id']);

$folder = 'photos/';
$file_extension = explode('.', $photo['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;

move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';
$sql = "insert into products(name,photo,price,description,manufacturer_id)
values('$name','$file_name','$price','$description','$manufacturer_id')";

mysqli_query($connect,$sql);
mysqli_close($connect);