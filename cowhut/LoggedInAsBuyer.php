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
	<title>Home (Buyer)</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php 
		if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
			$session_id = $_SESSION['id'];
			$session_type = $_SESSION['type'];
			if ($session_type === "buyer") {
	?>
	<div class="container">
		<header>
				<div id="branding">
					<img src="./img/logo.png">
				</div>
				<nav>
					<ul>
						<li><?php echo "<a href= 'profile.php?id=$session_id&type=$session_type'>Profile</a>" ?></li> 
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
 		<div class="browseCows">
	 		<div id="filter">
	 			<div id="filterElement">
	 				<p>Price Range</p>
	 				<input type="text" name="from_tk" value="from">
	 				<input type="text" name="to_tk" value="to">
	 			</div>
	 			<div id="filterElement">
	 				<p>Color</p>
	 				<select>
	 					<option>black</option>
	 					<option>brown</option>
	 					<option>grey</option>
	 					<option>white</option>
	 				</select>
	 			</div>
	 			<div id="filterElement">
	 				<p>Born</p>
	 				<input type="checkbox" name="deshi"> Deshi <br>
	 				<input type="checkbox" name="indian"> Indian <br>
	 				<input type="checkbox" name="australian"> Australian
	 			</div>
	 		</div>
	 		<div class="cows">
			<?php 
				//require 'database.php';
				$query = "SELECT * FROM cow_info";
				$db = connect();
				$output = mysqli_query($db, $query);

				if (isset($_POST["submit"])) {
					$from_tk= $_POST["from_tk"];
					$to_tk= $_POST["to_tk"];
					// echo "$from_tk";
				}
				else{
					$from_tk= 0;
					$to_tk= 10000000;
					
				}


				if (isset($_POST["color"]))
	 			{
	 				$color = $_POST["color"];
	 				while ($result = mysqli_fetch_array($output)){
						if ($color=="all_color" && $result[6] > $from_tk  && $result[6]< $to_tk) {
							echo "<a href= 'viewcow.php?id=$result[0]'><div id=\"eachCow\" >";
							echo '<img height="200" width="200" src="data:image;base64,'.$result[10].' "> ';
							echo "<hr>
	 							  <p>Price: $result[6] tk</p>
	 							  <p>Color: $result[2]</p><p>Type: $result[7]</p>
	 					  <p>Origin: $result[8]</p>";
							echo "</div></a>";					}
						else{
							if ($result[2]==$color && $result[6] > $from_tk  && $result[6]< $to_tk) {
							echo "<a href= 'viewcow.php?id=$result[0]'><div id=\"eachCow\" >";
							echo '<img height="200" width="200" src="data:image;base64,'.$result[10].' "> ';
							echo "<hr>
	 							  <p>Price: $result[6] tk</p>
	 							  <p>Color: $result[2]</p><p>Type: $result[7]</p>
	 					  <p>Origin: $result[8]</p>";
							echo "</div></a>";
							}
						}	
					}	
	 			}else{
					while ($result = mysqli_fetch_array($output)){
							echo "<a href= 'viewcow.php?id=$result[0]'><div id=\"eachCow\" >";
							echo '<img height="200" width="200" src="data:image;base64,'.$result[10].' "> ';
							echo "<hr>
		 						  <p>Price: $result[6] tk</p>
		 						  <p>Color: $result[2]</p><p>Type: $result[7]</p>
		 					  <p>Origin: $result[8]</p>";
							echo "</div></a>";					
					}
				}
			?>
	
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
				header("Location: loggedinas$session_type.php");
			}
		}else{
			header("location: login.php");
			echo "Please Login!";
		}
	?>
</body>
</html>