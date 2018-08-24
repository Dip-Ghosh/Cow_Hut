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
	<title>Pet Details</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<?php
	if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
		$session_id = $_SESSION['id'];
		$session_type = $_SESSION['type'];

		if (isset($_GET['id'])) {
			# code...
			$id = $_GET['id'];
			$query = "SELECT * FROM cow_info where cow_id=$id";
			//echo "$query";
			$db = connect();
			$output = mysqli_query($db, $query);
			while ($result = mysqli_fetch_array($output)){
				if ($result[0]==$id) {
					$type = $result[7];
					$origin = $result[8];
					$age = $result[1];
					$color = $result[2];
					$teeth = $result[3];
					$height = $result[4];
					$weight = $result[5];
					$price = $result[6];
					$image = $result[10];
				}
			}
		}else{
			header("Location: loggedinas$session_type.php");
		}
 ?>

<body>
	<div class="container">
		<header>
				<div id="branding">
					<img src="./img/logo.png">
				</div>
				<nav>
					<ul>
						<li><a href="index.php">Log out</a></li>
					</ul>
				</nav>
			
		</header>
	</div>

	<div class="container">
		<section id="newsletter1">
			
				<div class="wrapper">
					<div>
						<h2><?php echo '<a href="loggedinas'.$session_type.'.php">Home</a>'; ?></h2>
					</div>
					<div>
						<h2><a href="Koshai.php">Koshai</a></h2>
					</div>
					<div>
						<h2><a href="MyPet.php">My Pet</a></h2>
					</div>
				</div>
			
		</section>
	</div>

	<div class="container">
 		<div class="signUp">
 			<div id="signUpForm">
 				<h2 id="">Details</h2>
				<table>
					<tr>
						<td><p>Type:</p></td>
						<td><div><?php echo "<p>$type</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Age:</p></td>
						<td><div><?php echo "<p>$age years</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Color:</p></td>
						<!-- <td><input type="text" name="color" onblur="checkColor(this.value)"></td> -->
						<td><div><?php echo "<p>$color</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Origin:</p></td>
						<td><div><?php echo "<p>$origin</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Teeth:</p></td>
						<td><div><?php echo "<p>$teeth</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Height(cm):</p></td>
						<td><div><?php echo "<p>$height cm</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Weight(kg):</p></td>
						<td><div><?php echo "<p>$weight kg</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Price(tk):</p></td>
						<td><div><?php echo "<p>$price tk</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Image:</p></td>
						<td><div><?php  echo '<img height="150" width="150" src="data:image;base64,'.$image.' ">'?></div></td>
					</tr>
				</table>
 			</div>
 		</div>
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


