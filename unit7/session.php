<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Fun with sessions.</title>
	</head>

	<body>
		<?php

			if(!isset($_SESSION['count'])) {
				$_SESSION['count'] = 0;
			}

			$_SESSION['count']++;

			echo "You have visited this page {$_SESSION['count']} times.";
		?>
	</body>
</html>