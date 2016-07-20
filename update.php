<?php require('HandleDb.php');


$id = $_GET['id'];
$p_name = $_POST['product_name'];
$p_price = $_POST['product_price'];
$p_desc = $_POST['product_description'];
$p_category = $_POST['product_category'];

$sql = "UPDATE product SET(product_name, product_price, product_description, product_category) WHERE product_id = '$id'";
//$result = mysqli_query($mysqli, $sql);
if (mysqli_query($connect, $sql)) {
    header('location: AdminDashboard.php');
} else {
    die("Updating error: ".mysqli_connect_error());   
}
    
mysqli_close($connect);
    

?>