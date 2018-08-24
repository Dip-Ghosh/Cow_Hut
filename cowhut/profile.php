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
	<title>My Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<?php
	if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
		$session_id = $_SESSION['id'];
		$session_type = $_SESSION['type'];

		if (isset($_GET['id']) && isset($_GET['type'])) {
			$id = $_GET['id'];
			$table = $_GET['type'];
			//echo "$table $id";
			if ($table === "seller") {
				$query = "SELECT * FROM seller_info where seller_id=$id";
			}else{
				$query = "SELECT * FROM ".$table."_info where id=$id";	
			}
			//echo "$query";
			$db = connect();
			$output = mysqli_query($db, $query);
			if (mysqli_num_rows($output)==1){	
				while ($result = mysqli_fetch_array($output)){
					$name = $result[1];
					$date = $result[2];
					$location_id = $result[3];
					$location_name = "";
						$query1 = "SELECT * FROM location where location_id=$location_id";
						$output1 = mysqli_query($db, $query1);
						while ($result1 = mysqli_fetch_array($output1)) {
							if ($result1[0] == $location_id) {
								$location_name = $result1['1'];
							}
						}
					$email = $result[4];
					$phone_number = $result[5];
					$password = $result[6];
					$image = $result[7];
					//exit();
				}
			}
			else
				echo "Output undefined!";
			mysqli_close($db);
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
						<h2><a href="Transporter.php">Transporter</a></h2>
					</div>
				</div>
			
		</section>
	</div>

	<div class="container">
 		<div class="signUp">
 			<div id="signUpForm">
 				<h2 id="">Profile Details</h2>
				<table>
					<tr>
						<td><p>Name:</p></td>
						<td><div><?php echo "<p>$name</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>DOB:</p></td>
						<td><div><?php echo "<p>$date</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Location:</p></td>
						<td><div><?php echo "<p>$location_name</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Email:</p></td>
						<td><div><?php echo "<p>$email</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Phone:</p></td>
						<td><div><?php echo "<p>$phone_number</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Password:</p></td>
						<td><div><?php echo "<p>$password</p>"; ?></div></td>
					</tr>
					<tr>
						<td><p>Image:</p></td>
						<td><div><?php  echo '<img height="200" width="200" src="data:image;base64,'.$image.' ">'?></div></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo "<a href= 'update.php?id=$id&type=$table'><button>Update</button></a>" ?></td>
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


