<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Responsive layout">
	<meta name="keyword" content="web design, Responsive layout">
	<meta name="author" content="mishal">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>


<body>
	<div class="container">
		<header>
				<div id="branding">
					<img src="./img/logo.png">
				</div>
				<nav>
					<ul>
						<li><a href="signup.php">Sign Up</a></li> 
						<li><a href="#">|</a></li>
						<li><a href="login.php">Log In</a></li>
					</ul>
				</nav>
			
		</header>
	</div>
	<div class="container">
		<section id="newsletter">
			<form>
				<div class="wrapper">
					<div >
						<p>Select your City</p>
						<select name="city_name">
    						<option value="Badda_Thana">Badda Thana</option>
							<option value="Cantonment_Thana">Cantonment Thana</option>
							<option value="Demra_Thana">Demra Thana</option>
							<option value="Dhamrai_Upazila">Dhamrai Upazila</option>
							<option value="Dhanmondi_Thana">Dhanmondi Thana</option>
							<option value="Dohar_Upazila">Dohar Upazila</option>
							<option value="Gulshan_Thana">Gulshan Thana</option>
							<option value="Kafrul_Thana">Kafrul Thana</option>
							<option value="Kamrangir_Char_Thana">Kamrangir Char Thana</option>
							<option value="Keraniganj_Upazila">Keraniganj Upazila</option>
							<option value="Khilgaon_Thana">Khilgaon Thana</option>
							<option value="Kotwali_Thana">Kotwali Thana</option>
							<option value="Lalbagh_Thana">Lalbagh Thana</option>
							<option value="Mirpur_Thana">Mirpur Thana</option>
							<option value="Mohammadpur_Thana">Mohammadpur Thana</option>
							<option value="Motijheel_Thana">Motijheel Thana</option>
							<option value="Nawabganj_Upazila">Nawabganj Upazila</option>
							<option value="Pallabi_Thana">Pallabi Thana</option>
							<option value="Ramna_Thana">Ramna Thana</option>
							<option value="Sabujbagh_Thana">Sabujbagh Thana</option>
							<option value="Savar_Upazila">Savar Upazila</option>
							<option value="Shyampur_Thana">Shyampur Thana</option>
							<option value="Sutrapur_Thana">Sutrapur Thana</option>
							<option value="Tejgaon_Thana">Tejgaon Thana</option>
							<option value="Uttara_Thana">Uttara Thana</option>
  						</select>
					</div>
					<div >
						<p>Browse Catagories(cow/goat/camel)</p>
						<!-- <input type="text" name="catagory_name" value="Select Catagory"> -->
						<select name="type">
    						<option value="cow">Cow</option>
    						<option value="goat">Goat</option>
    						<option value="camel">Camel</option>
  						</select>
					</div>
				</div>
			</form>
		</section>

	</div>
 	<div class="container">
 		<div class="browseCows">
	 		<div id="filter">
	 			<form method="POST" id="filterform">
	 				<div id="filterElement">
	 					<p>Price Range</p>
	 					<input type="number" name="from_tk" value="0">
	 					<input type="number" name="to_tk" value="1000000">
	 				</div>
	 				<div id="filterElement">
	 					<p>Color</p>
	 					<select name="color">
	 						<option value="all_color">All</option>
	 						<option value="black">black</option>
	 						<option value="brown">brown</option>
	 						<option value="grey">grey</option>
	 						<option value="white">white</option>
	 					</select>
	 				</div>
	 				<div id="filterElement">
	 					<p>Born</p>
	 					<input type="checkbox" name="all_jaat"> All <br>
	 					<input type="checkbox" name="deshi"> Deshi <br>
	 					<input type="checkbox" name="indian"> Indian <br>
	 					<input type="checkbox" name="australian"> Australian
	 				</div>
	 				<div id="filterElement">
	 					<input type="submit" name="submit" value="Filter">
	 				</div>
	 			</form>
	 		</div>

	 		
	 		<div class="cows">
			<?php 
				require 'database.php';
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
							echo "<div id=\"eachCow\" >";
							echo '<img height="200" width="200" src="data:image;base64,'.$result[10].' "> ';
							echo "<hr>
	 							  <p>Price: $result[6] tk</p>
	 							  <p>Color: $result[2]</p><p>Type: $result[7]</p>
	 					  <p>Origin: $result[8]</p>";
							echo "</div>";					}
						else{
							if ($result[2]==$color && $result[6] > $from_tk  && $result[6]< $to_tk) {
							echo "<div id=\"eachCow\" >";
							echo '<img height="200" width="200" src="data:image;base64,'.$result[10].' "> ';
							echo "<hr>
	 							  <p>Price: $result[6] tk</p>
	 							  <p>Color: $result[2]</p><p>Type: $result[7]</p>
	 					  <p>Origin: $result[8]</p>";
							echo "</div>";
							}
						}	
					}	
	 			}else{
				while ($result = mysqli_fetch_array($output)){
						echo "<div id=\"eachCow\" >";
						echo '<img height="200" width="200" src="data:image;base64,'.$result[10].' "> ';
						echo "<hr>
	 						  <p>Price: $result[6] tk</p>
	 						  <p>Color: $result[2]</p><p>Type: $result[7]</p>
	 					  <p>Origin: $result[8]</p>";
						echo "</div>";					
					
						
				}
			}
			?>
	
			</div>

 		</div>
 	</div>

	<div class="container">
		<footer>
			<p>Sign Up as: <a href="signup.php" style="text-decoration: none; color: white;">Koshai</a>  |  <a href="signup.php" style="text-decoration: none; color: white;">Transport</a></p>
		</footer>
	</div>
</body>
</html>


