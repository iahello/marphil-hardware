<?php require('HandleDb.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title>Gallery</title>
	<link rel="stylesheet" href="css/style.css">
 	<link rel="shortcut icon" type="icon/png" href="assets/logo.png">
</head>
<body>
	<!--header-->
	<div id="gallery-head">
		<h2>Gallery</h2>
	</div> 
	<!--items-->
	<div id="gallery-table">
		<?php
			$sth = prepare("SELECT * FROM marphil_products");
			$sth->execute();

			foreach($sth->fetchAll(PDO::FETCH_OBJ) as $db):
			?>
		<div class="imgs">
			<img height="300" width="280" src="<?= $db->product_image ?>">
		</div>
		<?php endforeach; ?>
	</div>
	<div id="signature">
		<p>All rights reserved 2016 © By: Vince Aldrin Cabrera, Iah Buenacosa and Jonahs Torres of WD-201</p>
	</div>
</body>
</html>