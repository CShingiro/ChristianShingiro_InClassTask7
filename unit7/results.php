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

		<table width="80%">
			<thead>
				<tr align="left">
					<th>name</th>
					<th>email</th>
					<th>phone</th>
					<th>province</th>
					<th>food</th>
				</tr>
			</thead>
			<tbody>

				<?php
					require('database.php');

					$q = 'SELECT user_id, name, email, phone, province, food FROM users LIMIT 10;';
					$results = @mysqli_query($dbc, $q);

					while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {

						$str = "<tr><td>{$row['name']}</td>";
						$str .= "<td>{$row['email']}</td>";
						$str .= "<td>{$row['phone']}</td>";
						$str .= "<td>{$row['province']}</td>";
						$str .= "<td>{$row['food']}</td></tr>";

						echo $str;
					}
				?>
			</tbody>
		</table>

		<table width="80%">
			<thead>
				<tr align="left">
					<th>food</th>
					<th>count</th>
				</tr>
			</thead>
			<tbody>

				<?php
					$q = 'SELECT food, count(food) AS count FROM users GROUP BY food;';
					$results = @mysqli_query($dbc, $q);

					while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
						$str = "<tr><td>{$row['food']}</td>";
						$str .= "<td>{$row['count']}</td></tr>";

						echo $str;
					}

					setcookie('hello', 'world');
				?>
			</tbody>
		</table>
	</body>
</html>