<?php

	if(isset($_SESSION['u'])) {
		header('Location: success.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sign up for our newsletter</title>
	</head>

	<body>
		<h1 id="header">Sign up for our newsletter!</h1>
		<nav>
			<ul>
				<li><a href="emailForm.php">Form</a></li>
				<li><a href="results.php">Results</a></li>
			</ul>
		</nav>

		<form action="register.php" method="post" id="registrationForm">
			<div>
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" />
			</div>
			<div>
				<label for="email">Email:</label>
				<input type="text" id="email" name="email" />
			</div>
			<div>
				<label for="phone">Phone:</label>
				<input type="text" id="phone" name="phone" />
			</div>
			<div>
				<label for="province">Province/Territory:</label>
				<select name="province">

					<?php
						require('provinces.php');

						$provinces = get_provinces();

						foreach($provinces as $province) {
							echo "<option value=\"$province\">$province</option>";
						}
					?>

				</select>
			</div>
			<div>
				<label for="food">Favourite Food:</label>
				<input type="text" id="food" name="food" />
			</div>

			<button type="submit">Submit</button>
		</form>
	</body>
</html>