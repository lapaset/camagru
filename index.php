<?php
	$footer_left = "editor";
	$footer_mid = "profile";
	$footer_right = "login";
	$path_to_imgs = "";
	$path_to_srcs = "srcs/";
?>

<!DOCTYPE html>
<html>
<head>
	<title>camagru</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
</head>
<body>
	<?php require_once 'srcs/components/header.php'; ?>

	<div class="main-container">
		<h1>camagru</h1>
		<div class="img-container">
			<img id="img" src="imgs/loading.png" />
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo necessitatibus sequi rerum, architecto vero neque modi! Velit repellat repellendus necessitatibus beatae, maxime accusamus dicta recusandae tempore voluptatum, eum labore vero!</p>
		</div>
		<div class="img-container">
			<img id="img" src="imgs/loading.png" />
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo necessitatibus sequi rerum, architecto vero neque modi! Velit repellat repellendus necessitatibus beatae, maxime accusamus dicta recusandae tempore voluptatum, eum labore vero!</p>
		</div>
		<div style="text-align: right; padding: 1rem; border-top: 1px solid black" >
			Thank you for your visit!<br />
			Liisa Lahti 2020<br/>
		</div>
	</div>

	<div class="left-bottom-corner">
		<a href="srcs/editor.php" alt="add photo" title="add photo">
			<div class="circle-container">
				<img id="add" src="imgs/add.png" title="add photo" alt="add photo" />
			</div>
		</a>
	</div>

	<?php 
		require_once 'srcs/components/footer.php';
		require_once 'srcs/components/mobile_footer.php';
	?>



