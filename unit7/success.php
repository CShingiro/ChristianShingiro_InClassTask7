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

			if(isset($_SESSION['u'])) {
				$user_id = $_SESSION['u'];

				$q = 'SELECT name, email, phone, province, food FROM users WHERE user_id = ?;';
				$stmt = mysqli_prepare($dbc, $q);

				mysqli_stmt_bind_param(
					$stmt,
					'i',
					$user_id
				);

				$results = mysqli_stmt_execute($stmt);

				mysqli_stmt_bind_result($stmt, $name, $email, $phone, $province, $food);
				mysqli_stmt_fetch($stmt);

				#printf ("%s (%s) %s %s %s", $name, $email, $phone, $province, $food);

				echo 'You are already registered, we don\'t need your information twice!';
			}
		?>
	</body>
</html>