<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sign up for our newsletter</title>
	</head>

	<body>
		<nav>
			<ul>
				<li><a href="emailForm.php">Form</a></li>
				<li><a href="results.php">Results</a></li>
			</ul>
		</nav>

		<?php
			require('database.php');
			require('provinces.php');


			function is_email_valid($email) {
				if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
					return true;
				}
			}

			function is_phone_valid($phone) {
				if(!empty($phone) && count_numbers($phone) == 10) {
					return true;
				}
			}

			function count_numbers($str) {
				return preg_match_all("/[0-9]/", $str);
			}

			$errors = [];

			if(!empty($_POST['name'])) {
				$name = $_POST['name'];
			} else {
				$name = NULL;
				$errors[] = "<p>We need your name if you want to get our newsletter.</p>";
			}

			if(isset($_POST['email']) && is_email_valid($_POST['email'])) {
				$email = $_POST['email'];
			} else {
				$email = NULL;
				$errors[] =  "<p>We need your email if you want to get our newsletter.</p>";
			}

			if(isset($_POST['phone']) && is_phone_valid($_POST['phone'])) {
				$phone = $_POST['phone'];
			} else {
				$phone = NULL;
				$errors[] =  "<p>We need your phone number if you want us to text you every five minutes.</p>";
			}

			if(isset($_POST['province'])) {
				$province = $_POST['province'];
			} else {
				$province = NULL;
				$errors[] =  "<p>We need to know whereabouts you live.</p>";
			}

			if(!empty($_POST['food'])) {
				$food = $_POST['food'];
			} else {
				$food = NULL;
				$errors[] = "<p>We need your favourite food for reasons.</p>";
			}

			if(count($errors) == 0) {

				$province_code = get_province_code($province);

				$name_clean = prepare_string($dbc, $name);
				$email_clean = prepare_string($dbc, $email);
				$phone_clean = prepare_string($dbc, $phone);
				$province_code_clean = prepare_string($dbc, $province_code);
				$food_clean = prepare_string($dbc, $food);

				$q = "INSERT INTO users(name, email, phone, province, food) VALUES(?, ?, ?, ?, ?)";

				$stmt = mysqli_prepare($dbc, $q);

				mysqli_stmt_bind_param(
					$stmt,
					'sssss',
					$name_clean,
					$email_clean,
					$phone_clean,
					$province_code_clean,
					$food_clean
				);

				$result = mysqli_stmt_execute($stmt);

				if($result) {

					$id = mysqli_insert_id($dbc);

					session_id($id);
					session_start();

					$_SESSION['u'] = u;

					$capital = get_capital($province);

					echo "<p>Thank you $name for your submission.</p>";
					echo "<p>We will send only the best things to your email: $email.</p>";
					echo "<p>We will send lots of texts to: $phone.</p>";
					echo "<p>Did you know that $capital is the capital of $province?</p>";
					echo "<p>We also love $food!</p>";
				} else {
					echo "Your data wasn't saved due to an internal error. Please try again later.";
				}
			} else {
				foreach($errors as $error) {
					echo $error;
				}
			}
		?>
	</body>
</html>