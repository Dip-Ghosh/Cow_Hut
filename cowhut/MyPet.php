<?php session_start();?>
<?php require 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Responsive layout">
	<meta name="keyword" content="web design, Responsive layout">
	<meta name="author" content="mishal">
	<title>My Pet</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php 
		if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
			$session_id = $_SESSION['id'];
			$session_type = $_SESSION['type'];
			if ($session_type === "seller") {
				# code...
	?>
	<div class="container">
		<header>
				<div id="branding">
					<img src="./img/logo.png">
				</div>
				<nav>
					<ul>
						<li><a href="loggedinasseller.php">Home</a></li> 
						<li><a href="#">|</a></li>
						<li><a href="sellerProfile.php">Profile</a></li>
						<li><a href="#">|</a></li>
						<li><a href="index.php">Log Out</a></li>
					</ul>
				</nav>
			
		</header>
	</div>

	<div class="container">
		<section id="newsletter">
			<form>
				<div class="wrapper">
					<div >
						<p><a href="koshai.php">Koshai</a></p>
					</div>
					<div >
						<p><a href="transporter.php">Transporter</a></p>
					</div>
				</div>
			</form>
		</section>

	</div>
 	<div class="container">
 		<div class="cows">
			<?php 
				$query = "SELECT * FROM cow_info where seller_id='$session_id'";
				$db = connect();
				$output = mysqli_query($db, $query);

				while ($result = mysqli_fetch_array($output)){
					//$_SESSION['id'] = $result[0];
					echo "<a href= 'viewcow.php?id=$result[0]'><div id=\"eachCow\" >";
					echo '<img height="200" width="200" src="data:image;base64,'.$result[10].' "> ';
					echo "<hr>
							<p>ID: $result[0] </p>
	 					  	<p>Price: $result[6] tk</p>
	 					  	<p>Color: $result[2]</p>
	 					  	<p>Type: $result[7]</p>
	 					  	<p>Origin: $result[8]</p>";
					echo "</div></a>";
				}
			?>
	
		</div>
 		<!-- </div> -->
 	</div>

	<div class="container">
		<footer>
			<p>By registering on CowHut.com, you accept our <a href="#">Terms of Use</a></p>
		</footer>
	</div>
	<?php
			}else{
				header("Location: loggedinas$session_type.php");
			}
		}else{
			header("location: login.php");
			echo "Please Login!";
		}
	?>
</body>
</html>