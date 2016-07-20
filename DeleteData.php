<?php
header('location: admin.php');
require('HandleDb.php');

$id = $_GET['id'];

$sth = prepare("DELETE FROM marphil_products WHERE product_id = :id");
$sth->bindParam(':id', $id);
$sth->execute();