<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>

</head>
<style>
	body{
			margin: 0;
			padding: 0;
			font-family: "montserrat", sans-serif;
			min-height: 100vh;
			background: url(assets/assets/images/bg-1.png) no-repeat;
			background-size:  150%;
		}
	.container {
		width: 100%;
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
		text-align: center;
		color: #343434;
	}

	.container h1{
		font-size: 160px;
		margin: 0;
		font-weight: 900;
		letter-spacing: 20px;
		background: url(assets/assets/images/bg.png) center no-repeat;
		-webkit-text-fill-color: transparent;
		-webkit-background-clip: text;
	}

	.container a{
		text-decoration: none;
		color: #fff;
		padding: 12px 24px;
		display: inline-block;
		border-radius: 25px;
		font-size: 14px;
		text-transform: uppercase;
		transition: 0.4s;
		background-image: linear-gradient(to right, #133589 0%, #1FA2FF  90%, #1FA2FF  100%);
		border: none;
		border-radius: 50px;
		cursor: pointer;
		transition: all 0.3s ease 0s;
	}

	.container a:hover{
		background-color: #133589;
		color: #fff;
		text-decoration: none;
	}

</style>

<body>
	<div class="container">
		<h2>Oops! Page Not Found</h2>
		<h1>404</h1>
		<p>We Can't find the page you're looking for in SESKOAL.</p>
		<a href="">Go Back Home</a>
	</div>
	<!-- <div id="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div> -->
</body>
</html>