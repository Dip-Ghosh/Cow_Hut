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
	<title>Profile Update</title>
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
						<h2><a href="transporter.php">Transporter</a></h2>
					</div>
				</div>
			
		</section>
	</div>

	<div class="container">
 		<div class="signUp">
 			<div id="signUpForm">
 				<h2 id="">Update</h2>
				<form name="myForm" onsubmit="validate()" action="" method="post" enctype="multipart/form-data">
 					<table>
 						<tr>
 							<td>Name</td>
 							<td><input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"></td>
 						</tr>
 						<tr>
 							<td>Date of Birth</td>
 							<td><input type="date" name="birth_date" value="<?php echo htmlspecialchars($date); ?>"></td>
 						</tr>
 						<tr>
 							<td>Location</td>
	 							<td><select name="location_id">
	    						<option value="1" <?php if($location_id == 1){ echo ' selected="selected"'; } ?>>Badda Thana</option>
	    						<option value="2" <?php if($location_id == 2){ echo ' selected="selected"'; } ?>>Uttara Thana</option>
								<option value="3" <?php if($location_id == 3){ echo ' selected="selected"'; } ?>>Cantonment Thana</option>
								<option value="4" <?php if($location_id == 4){ echo ' selected="selected"'; } ?>>Demra Thana</option>
								<option value="5" <?php if($location_id == 5){ echo ' selected="selected"'; } ?>>Dhamrai Upazila</option>
								<option value="6" <?php if($location_id == 6){ echo ' selected="selected"'; } ?>>Dhanmondi Thana</option>
								<option value="7" <?php if($location_id == 7){ echo ' selected="selected"'; } ?>>Dohar Upazila</option>
								<option value="8" <?php if($location_id == 8){ echo ' selected="selected"'; } ?>>Gulshan Thana</option>
								<option value="9" <?php if($location_id == 9){ echo ' selected="selected"'; } ?>>Kafrul Thana</option>
								<option value="10" <?php if($location_id == 10){ echo ' selected="selected"'; } ?>>Kamrangir Char Thana</option>
								<option value="11" <?php if($location_id == 11){ echo ' selected="selected"'; } ?>>Keraniganj Upazila</option>
								<option value="12" <?php if($location_id == 12){ echo ' selected="selected"'; } ?>>Khilgaon Thana</option>
								<option value="13" <?php if($location_id == 13){ echo ' selected="selected"'; } ?>>Kotwali Thana</option>
								<option value="14" <?php if($location_id == 14){ echo ' selected="selected"'; } ?>>Lalbagh Thana</option>
								<option value="15" <?php if($location_id == 15){ echo ' selected="selected"'; } ?>>Mirpur Thana</option>
								<option value="16" <?php if($location_id == 16){ echo ' selected="selected"'; } ?>>Mohammadpur Thana</option>
								<option value="17" <?php if($location_id == 17){ echo ' selected="selected"'; } ?>>Motijheel Thana</option>
								<option value="18" <?php if($location_id == 18){ echo ' selected="selected"'; } ?>>Nawabganj Upazila</option>
								<option value="19" <?php if($location_id == 19){ echo ' selected="selected"'; } ?>>Pallabi Thana</option>
								<option value="20" <?php if($location_id == 20){ echo ' selected="selected"'; } ?>>Ramna Thana</option>
								<option value="21" <?php if($location_id == 21){ echo ' selected="selected"'; } ?>>Sabujbagh Thana</option>
								<option value="22" <?php if($location_id == 22){ echo ' selected="selected"'; } ?>>Savar Upazila</option>
								<option value="23" <?php if($location_id == 23){ echo ' selected="selected"'; } ?>>Shyampur Thana</option>
								<option value="24" <?php if($location_id == 24){ echo ' selected="selected"'; } ?>>Sutrapur Thana</option>
								<option value="25" <?php if($location_id == 25){ echo ' selected="selected"'; } ?>>Tejgaon Thana</option>
	  						</select></td>
 						</tr>
 						<tr>
 							<td>Email</td>
 							<td><input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"></td>
 						</tr>
 						<tr>
 							<td>Phone</td>
 							<td><input type="number" name="phone_number" value="<?php echo htmlspecialchars($phone_number); ?>"></td>
 						</tr>
 						<tr>
 							<td>Password</td>
 							<td><input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>"></td>
 						</tr>
 						<tr>
 							<td>Confirm Password</td>
 							<td><input type="password" name="confirm_password"></td>
 						</tr>
 						<tr>
 							<td>Image</td>
 							<td><?php echo '<img height="200" width="200" src="data:image;base64,'.$image.'">';?></td>
 						</tr>
 						<tr>
 							<td>Upload Picture</td>
 							<td><input type="file" name="image" id="fileToUpload"></td>
 						</tr>
 						<tr>
 							<td></td>
 							<td><input type="submit" name="submit" value="Submit"></td>
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
			header("location: login.php");
			echo "Please Login!";
		}
	?>
</body>
</html>
<?php
	if (isset($_POST['submit'])) {
		//$type = $_POST["type"];
		$name = $_POST["name"];
		$birth_date = $_POST["birth_date"];
		$location_id = $_POST["location_id"];
		$email = $_POST["email"];
		$phone_number = $_POST["phone_number"];
		$password = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];
		
		
		/*if(getimagesize($_FILES["image"]["tmp_name"]) !== false){*/
		if (isset($_FILES["image"]["tmp_name"])) {
    		$image = addslashes($_FILES['image']['tmp_name']);
    		$image = file_get_contents($image);
    		$image = base64_encode($image);
			if ($table === "seller") {
				$query = "UPDATE ".$table."_info SET name = '$name', birth_date = '$birth_date' , location_id=$location_id , email='$email', phone_number= $phone_number, password=$password, image='$image' WHERE seller_id=$id";
			}else{
				$query = "UPDATE ".$table."_info SET name = '$name', birth_date = '$birth_date' , location_id=$location_id , email='$email', phone_number= $phone_number, password=$password, image='$image' WHERE id=$id";
			}
			$db = connect();
			mysqli_query($db, $query);
			mysqli_close($db);//closing the connection
			//header("Location:index.php");
		}else{
			if ($table === "seller") {
				$query = "UPDATE ".$table."_info SET name = '$name', birth_date = '$birth_date' , location_id=$location_id , email='$email', phone_number= $phone_number, password=$password WHERE seller_id=$id";
			}else{
				$query = "UPDATE ".$table."_info SET name = '$name', birth_date = '$birth_date' , location_id=$location_id , email='$email', phone_number= $phone_number, password=$password WHERE id=$id";	
			}
			$db = connect();
			mysqli_query($db, $query);
			mysqli_close($db);
		}
    	header("Location: profile.php?id=$id&type=$table");
	}
?>
<script type="text/javascript">
	function validate() {
		var radio = document.myForm.type;
		if (!(radio[0].checked) && !(radio[1].checked) && !(radio[2].checked) && !(radio[3].checked)) {
			alert("Please select the type of customer!");
		}

		var name = document.myForm.name.value;
		if(name.length == 0){
			alert("Name can't be empty!");
		}

		var email = document.myForm.email.value;
		if(email.length == 0){
			alert("Email can't be empty!");
		}

		var num = document.myForm.phone_number.value;
		if(num.length == 0 || num.length>11){
			alert("Phone number can't be empty or more than 11 digits!");
		}

		var no = document.myForm.password.value;
		if(!(no.length>3 && no.length<32)){
			alert("Password should be more than 3 and less than 30 characters!");
		}

		var confirmPass = document.myForm.confirm_password.value;
		if(!(confirmPass === no)){
			alert("Password doesn't match!");
		}

	}
</script>
