<?php
header('Location: admin.php');
require("HandleDb.php");

//Handle Image
$p_image = basename($_FILES['product_img']['name']);
$allowed_image = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');

if (in_array($_FILES['product_img']['type'], $allowed_image)) {
	$image_path = 'product_image/' . $p_image;
	move_uploaded_file($_FILES['product_img']['tmp_name'], $image_path);
}

//Insert
$sth = prepare("INSERT INTO marphil_products (product_name, product_price,
				product_description, product_category, product_image)
				VALUES (?, ?, ?, ?, ?)");

$products = $_POST['prod'];
array_push($products, $image_path);
foreach ($products as &$product) {
	htmlspecialchars($product);
}
print_r($products);
$sth->execute($products);