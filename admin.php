<?php require('HandleDb.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="shortcut icon" type="icon/png" href="assets/logo.png">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<nav class="brand-container">
		<div class="brand">
			<h3>
				<i class="material-icons">build</i>
				Marphil Hardware
			</h3>
		</div>
	</nav>
	<div class="container">
		<div class="leftSide">
			<form action="InsertData.php" method="POST">
			  <input name="prod[]" type="text" placeholder="Name"><br>
	  	  <input name="prod[]" type="text" placeholder="Price"><br>
	  		<label>Image: </label><input type="file" name="product_img" accept="image/*" onchange="imgPreview(event)"><br><br>
	  		<input name="prod[]" type="text" placeholder="Description"><br>
	  		<input name="prod[]" type="text" placeholder="Category"><br>
	  		<input id="add" type="submit" value="Add">
			</form>
			<img class="preview">
		</div>
		<div class="rightSide">
			<div class="products">
				<?php
				$sth = prepare("SELECT * FROM marphil_products");
				$sth->execute();

				foreach($sth->fetchAll(PDO::FETCH_OBJ) as $db):
				?>
				<div class="item">
					<div class="view-img"><img width="200" height="200" src="<?= $db->product_image ?>"><br></div>
					ID: <?= $db->product_id ?> <br>
					Name: <?= $db->product_name ?><br>
					Price: <?= $db->product_price ?><br>
					Description: <?= $db->product_description ?><br>
					Category: <?= $db->product_category ?><br>
					<a href="DeleteData.php" onclick="return confirm('Are you sure you want to delete this product?')">DELETE</a>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function imgPreview(e) {
			var img = document.querySelector('.preview');
			img.src = URL.createObjectURL(e.target.files[0]);
			console.log(img);
		}
	</script>
</body>
</html>