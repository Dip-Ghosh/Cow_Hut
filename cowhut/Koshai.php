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
	<title>Koshai List</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php 
		if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
			$session_id = $_SESSION['id'];
			$session_type = $_SESSION['type'];
	?>
	<div class="container">
		<header>
				<div id="branding">
					<img src="./img/logo.png">
				</div>
				<nav>
					<ul>
						<li><?php echo "<a href='profile.php?id=$session_id&type=$session_type'>Profile</a>"; ?></li>
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
					<div id="wrapperHighligter">
						<p><?php echo '<a href="loggedinas'.$session_type.'.php">Home</a>'; ?></p>
					</div>
					<div>
						<p><a href="transporter.php">Transporter</a></p>
					</div>
				</div>
			</form>
		</section>

	</div>
	<div class="cows">
		<?php 
		//require 'database.php';
			$query = "SELECT * FROM koshai_info";
			$db = connect();
			$output = mysqli_query($db, $query);

			while ($result = mysqli_fetch_array($output)){
				echo "<a href=\"profile.php?id=$result[0]&type=koshai\"><div id=\"eachCow\" >";
				echo '<img height="200" width="200" src="data:image;base64,'.$result[7].' "> ';
				echo "<hr>
						  <p>Name: $result[1] </p>
						  <p>Phone: 0$result[5]</p>";
				echo "</div></a>";
			}

		?>
	</div>

	<div class="container">
		<footer>
			<p>By registering on CowHut.com, you accept our <a href="#">Terms of Use</a></p>
		</footer>
	</div>
	<?php
		}else{
			header("location: login.php");
			echo "Please Login!";
		}
	?>
</body>
</html>