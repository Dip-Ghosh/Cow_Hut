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
	<title>AddCow (Seller)</title>
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
						<li><a href="index.php">Log out</a></li>
					</ul>
				</nav>
			
		</header>
	</div>

	<div class="container">
		<section id="newsletter1">
			
				<div class="wrapper">
					<div>
						<h2><a href="loggedinasseller.php">Home</a></h2>
					</div>
					<div>
						<h2><a href="koshai.php">Koshai</a></h2>
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
 				<h2 id="">Add Pet Details</h2>

 				<form action="" method="post" name="myForm" onsubmit="validate()" enctype="multipart/form-data">
 					<table>
 						<tr>
 							<td>Type</td>
 							<td>
 								<select name="type">
 									<option value="cow" selected>Cow</option>
 									<option value="goat">Goat</option>
 									<option value="camel">Camel</option>
 								</select>
 							</td>
 						</tr>
 						<tr>
 							<td>Age</td>
 							<td><input type="number" name="age" onblur="checkAge(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Color</td>
 							<!-- <td><input type="text" name="color" onblur="checkColor(this.value)"></td> -->
 							<td>
 								<select name="color">
 								<option value="white">White</option>
 								<option value="black">Black</option>
 								<option value="brown" selected>Brown</option>
 								<option value="grey">Grey</option>
 								</select>
 							</td>
 						</tr>
 						<tr>
 							<td>Origin</td>
 							<td>
 								<select name="origin">
 								<option value="deshi" selected>Deshi</option>
 								<option value="indian">Indian</option>
 								<option value="australian">Australian</option>
 								</select>
 							</td>
 						</tr>
 						<tr>
 							<td>Teeth</td>
 							<td><input type="number" name="teeth" onblur="checkTeeth(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Height(cm)</td>
 							<td><input type="number" name="height" onblur="checkHeight(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Weight(kg)</td>
 							<td><input type="number" name="weight" onblur="checkWeight(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Price(tk)</td>
 							<td><input type="number" name="price" onblur="checkPrice(this.value)"></td>
 						</tr>
  						<tr>
 							<td>Upload Picture of cow</td>
 							<td><input type="file" name="image" id="fileToUpload"></td>
 						</tr>
 						<tr>
 							<td></td>
 							<td><input type="submit" name="submit" value="Add"></td>
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

<?php 
	//require 'database.php';
	if (isset($_POST['submit'])) {
		$type = $_POST["type"];
		$origin = $_POST["origin"];
		$age = $_POST["age"];
		$color = $_POST["color"];
		$teeth = $_POST["teeth"];
		$height = $_POST["height"];
		$weight = $_POST["weight"];
		$price = $_POST["price"];
		$seller_id = $_SESSION['id'];
		//$seller_id = $session_id;
		if(getimagesize($_FILES["image"]["tmp_name"]) !== false){
    		$image = addslashes($_FILES['image']['tmp_name']);
    		$image = file_get_contents($image);
    		$image = base64_encode($image);

			$query = "INSERT INTO cow_info (`age`, `color`, `teeth`, `height`, `weight`, `price`, `type`, `origin`, `seller_id`, `image`) VALUES ($age, \"$color\", $teeth, $height, $weight, $price, \"$type\", \"$origin\", $seller_id,\"$image\")";
			$db = connect();
			mysqli_query($db, $query);
			mysqli_close($db);
		}else{
    		echo "Please select an image!";
    	}
    	header("Location: MyPet.php");
	}
?>
<script type="text/javascript">
	function validate() {

		var age = document.myForm.age.value;
		if(age.length == 0 || age == 0){
			alert("Age can't be empty or Zero!");
		}

		var teeth = document.myForm.teeth.value;
		if(teeth.length == 0 || teeth == 0){
			alert("Teeth can't be empty or Zero!");
		}

		var height = document.myForm.height.value;
		if(height.length == 0 || height == 0){
			alert("Please enter a valid Height!");
		}

		var weight = document.myForm.weight.value;
		if(weight.length == 0 || weight == 0){
			alert("Please enter a valid Weight!");
		}

		var price = document.myForm.price.value;
		if(price.length == 0 || price == 0){
			alert("Please enter a valid Price!");
		}

	}
</script>
