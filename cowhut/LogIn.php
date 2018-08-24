<?php 
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['type'])){
		$type = $_SESSION['type'];
		if ($type === "seller") {
			header("Location: LoggedInAsSeller.php");
		}elseif ($type === "buyer") {
			header("Location: LoggedInAsBuyer.php");
		}elseif ($type === "koshai") {
			header("Location: loggedinaskoshai.php");
		}else {
			header("Location: loggedinastransporter.php");
		}
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Responsive layout">
	<meta name="keyword" content="web design, Responsive layout">
	<meta name="author" content="mishal">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<?php 
	require 'database.php';
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$type = $_POST['type'];

		$query2 = "SELECT * FROM ".$type."_info WHERE email='$email' AND password='$password'";
		$db = connect();

		$output = mysqli_query($db, $query2);

		if (mysqli_num_rows($output)==1) {
			while ($result = mysqli_fetch_array($output)) {
				echo "Logged in as ".$result[1];
				//$id = $result[0];
				//session_start();
				$_SESSION['id'] = $result[0];
				$_SESSION['type'] = $type;
				if ($type === "seller") {
					header("Location: LoggedInAsSeller.php");
				}elseif ($type === "buyer") {
					header("Location: LoggedInAsBuyer.php");
				}elseif ($type === "koshai") {
					header("Location: loggedinaskoshai.php");
				}else{
					header("Location: loggedinastransporter.php");
				}
				exit;
			}
		}else
			echo "Not matched!";
		mysqli_close($db);
		 
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
						<li><a href="signup.php">Sign Up</a></li>
					</ul>
				</nav>
			
		</header>
	</div>

	<div class="container">
		<section id="newsletter1">
			
				<div class="wrapper">
					<div>
						<h2><a href="index.php">Home</a></h2>
					</div>
					<div>
						<h2><a href="koshai.php">Koshai</a></h2>
					</div>
					<div>
						<h2><a href="transporter.php">Transporter</a></h2>
					</div>
				</div>
			
		</section>
	</div>

	<div class="container">
 		<div class="signUp">
 			<div id="signInF">
 				<h2 id="">Sign In:</h2>
 				<form action="" method="post" enctype="multipart/form-data">
 					<input type="radio" name="type" value="buyer"> Buyer <br>
 					<input type="radio" name="type" value="seller"> Seller <br>
 					<input type="radio" name="type" value="koshai"> Koshai <br>
 					<input type="radio" name="type" value="transporter"> Transporter<br>
 					<table>
 						<tr>
 							<td>Email Adress</td>
 							<td><input type="email" name="email"></td>
 						</tr>
 						<tr>
 							<td>Password</td>
 							<td><input type="password" name="password"></td>
 						</tr>
 						<tr>
 							<td></td>
 							<td><input type="submit" name="submit" value="Login"></td>
 						</tr>
 					</table>
 				</form>
 			</div>
 		</div>
 	</div>


	<div class="container">
		<footer>
			<p>By registering on CowHut.com, you accept our <a href="#">Terms of Use</a></p>
		</footer>
	</div>
</body>
</html>

<?php 
	//echo "string";
	
?>